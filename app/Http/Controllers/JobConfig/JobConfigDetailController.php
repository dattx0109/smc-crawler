<?php


namespace App\Http\Controllers\JobConfig;


use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigDetailJobRequest;
use App\Service\ConfigDomainService\ConfigDomainService;
use App\Service\JobConfigDetail\JobConfigDetailService;
use App\Service\JobConfigService\JobConfigService;

class JobConfigDetailController extends Controller
{
    private $jobConfigDetailService;
    private $configDomain;
    private $configService;

    public function __construct(JobConfigDetailService $jobConfigDetailService, ConfigDomainService $configDomainService, JobConfigService $jobConfigService)
    {
        $this->jobConfigDetailService = $jobConfigDetailService;
        $this->configDomain   = $configDomainService;
        $this->configService  = $jobConfigService;
    }

    /**
     * @param ConfigDetailJobRequest $request
     * @param $domainId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function saveJobConfigDetail(ConfigDetailJobRequest $request, $domainId)
    {

        $rawData = request()->input();
        $rawData['list_tag'] = explode(',', $rawData['list_tag']);
        $this->jobConfigDetailService->saveConfig($rawData, $domainId);

        return redirect('/job-config/'.$domainId)->with('message_config_detail', 'Update config detail success');

    }
}