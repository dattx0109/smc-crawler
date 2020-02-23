<?php


namespace App\Http\Controllers\JobConfig;


use App\Http\Controllers\Controller;
use App\Http\Requests\AddConfigRequest;
use App\Http\Requests\ConfigCrawlerJobRequest;
use App\Service\ConfigDomainService\ConfigDomainService;
use App\Service\JobConfigDetail\JobConfigDetailService;
use App\Service\Job\JobConfigDetail;
use App\Service\JobConfigService\JobConfigService;
use App\Service\JobCrawService\StatusCrawService;
use Illuminate\Routing\Redirector as RedirectorAlias;
use mysql_xdevapi\Exception;

class JobConfigController extends Controller
{
    private $configService;
    private $configDomain;
    private $jobConfigDetailService;
    private $configDetail;
    private $statusCrawService;

    /**
     * JobConfigController constructor.
     * @param JobConfigDetailService $jobConfigDetailService
     * @param JobConfigService $configService
     * @param ConfigDomainService $configDomainService
     * @param JobConfigDetail $configDetail
     * @param StatusCrawService $statusCrawService
     */
    public function __construct(
        JobConfigDetailService $jobConfigDetailService,
        JobConfigService $configService,
        ConfigDomainService $configDomainService,
        JobConfigDetail $configDetail,
        StatusCrawService $statusCrawService
    )
    {
        $this->jobConfigDetailService = $jobConfigDetailService;
        $this->configService  = $configService;
        $this->configDomain   = $configDomainService;
        $this->configDetail = $configDetail;
        $this->statusCrawService = $statusCrawService;
    }


    public function viewJobConfig($domainId)
    {
        $jobConfig = $this->configService->getConfigByDomainId($domainId);
        return view('jobConfig.jobConfig', ['jobConfig' => $jobConfig]);
    }

    /**
     * @param AddConfigRequest $request
     * @param $domainId
     * @return \Illuminate\Http\RedirectResponse|RedirectorAlias
     */
    public function updateConfig(AddConfigRequest $request, $domainId)
    {
        $rawData = $this->configService->buildDataInsertConfigJobFromRequest($request, $domainId);
        $isStatusCrawl = $this->statusCrawService->getStatusCraw();
        $indexStatus = 2;

        if ($isStatusCrawl->status !== $indexStatus){
            dd('System is running , not update config');
        }

        $this->configService->updateConfig($rawData);
        return redirect('/job-config/'.$domainId)->with('message', 'Update thành công');

    }

    public function viewListUrlLink($domainId)
    {
        $isStatusCrawl = $this->statusCrawService->getStatusCraw();
        $jobConfigDetail = $this->jobConfigDetailService->findDetailJobAndTag($domainId);
        $rawDataListUrl = $this->configService->listUrlLink($domainId);
        $jobConfig      = $this->configService->getConfigByDomainId($domainId);
        $domainName     = $this->configDomain->getNameDomain($domainId);

        $configJobCrawler     = $this->configDetail->getConfig($domainId);
        if (empty($domainName)) {
            return view('error.404');
        }
        $isSysRunning = 1;
        return view('jobConfig.jobConfig', [
            'rawDataListUrl' => $rawDataListUrl,
            'jobConfig' => $jobConfig,
            'domainName' => $domainName,
            'jobConfigDetailService' => $jobConfigDetail,
            'configJobCrawler' => $configJobCrawler,
            'isStatusCrawlerRunning' => $isStatusCrawl->status === $isSysRunning
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function addUrl()
    {
        $rawData = request()->input();
//        dd($rawData);
        if (!isset($rawData['url'])) {
            return response()->json([
                    'message' => 'Url không được để trống',
                    'code' => 1
                ], 200);
        }
        if (!isset($rawData['format_url'])) {
            return response()->json([
                    'messageFormatUrl' => 'Format url không được để trống',
                    'code' => 5
                ], 200);
        }

        $isUrlValidateFromUrlOrigin = $this->configService->checkValidateUrlFromUrlOrigin($rawData['url'], $rawData['domain_id']);

        if ($this->configService->validateUrl($rawData['url']) || ! $isUrlValidateFromUrlOrigin) {
            return response()->json([
                'message' => 'Url không đúng định dạng so với định dạng gốc',
                'code'    => 2
            ], 200);
        }



        $isUrlExit = $this->configService->findUrlByUrlAndDomainId($rawData['url'], $rawData['domain_id']);

        if ($isUrlExit) {
            return response()->json([
                'message' => 'Url đã tồn tại',
                'code'    => 3
            ], 200);
        }

        $rawDataInsert = [
            'url'        => $rawData['url'],
            'div'        => $rawData['div'],
            'type'       => $rawData['type'],
            'domain_id'  => $rawData['domain_id'],
            'format_url' => $rawData['format_url'],
            'created_at' => date("Y/m/d H:i:s"),
            'updated_at' => date("Y/m/d H:i:s"),

        ];

        $this->configService->insertUrl($rawDataInsert);
        return response()->json([
           'message' => 'Thêm mới URL thành công',
            'code'   => 4
        ]);
    }
    public function configCrawlerJob(ConfigCrawlerJobRequest $request, $domainId)
    {
        $isStatusCrawl = $this->statusCrawService->getStatusCraw();
        $indexStatus = 2;

        if ($isStatusCrawl->status !== $indexStatus){
            dd('System is running , not update config');
        }

        $this->configDetail->config($request->all(), $domainId);
        return ;
    }
}
