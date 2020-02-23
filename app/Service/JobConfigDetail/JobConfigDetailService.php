<?php


namespace App\Service\JobConfigDetail;


use App\Repository\JobConfigDetailRepository;
use App\Repository\TagConfigRepository;
use mysql_xdevapi\Exception;

class JobConfigDetailService
{

    private $configRepository;
    private $jobConfigDetailRepository;

    public function __construct(TagConfigRepository $configRepository, JobConfigDetailRepository $jobConfigDetailRepository)
    {
        $this->configRepository          = $configRepository;
        $this->jobConfigDetailRepository = $jobConfigDetailRepository;
    }

    public function findTagByDomainId($domainId)
    {
        $jobConfigDetail = $this->jobConfigDetailRepository->findJobConfigByDomainId($domainId);
    }

    public function findDetailJobAndTag($domainId)
    {
        $jobConfigDetail = $this->jobConfigDetailRepository->findJobDetailAndTag($domainId);
        $jobConfigDetail = $this->refactorDataTag($jobConfigDetail);
        return $jobConfigDetail;
    }

    public function refactorDataTag($rawData)
    {
        $rawDataNew = [];
        $tag = '';
        $maxLenght = count($rawData);

        $i = 0;
        foreach ($rawData as $item){
            $rawDataNew['date_start'] = $item->date_start;
            $rawDataNew['period'] = $item->period;
            $rawDataNew['date_end'] = $item->date_end;
            $rawDataNew['status'] = $item->status;
            $i++;
            if($i === $maxLenght){
                $tag = $tag.$item->name;
            }else{
                $tag = $tag.$item->name.',';

            }
        }
        $rawDataNew['list_tag'] = $tag;
        return $rawDataNew;
    }

    /**
     * @param $rawData
     * @param $domainId
     * @throws \Exception
     */
    public function saveConfig($rawData, $domainId)
    {
        // save tag
        $this->configRepository->removeTagConfigByDomainId($domainId);
        $this->saveTagByDomainId($rawData['list_tag'], $domainId);
        $jobConfigDetail = $this->jobConfigDetailRepository->findJobConfigByDomainId($domainId);

        if($jobConfigDetail){
            $rawDataNewUpdate = [
                'updated_at' => date("Y/m/d H:i:s"),
                'domain_id'  => $domainId,
            ];

            if(isset($rawData['date_start'])){
                $rawDataNewUpdate['date_start'] = $rawData['date_start'];
            }

            if(isset($rawData['date_end'])){
                $rawDataNewUpdate['date_end'] = $rawData['date_end'];
            }

            if(isset($rawData['period'])){
                $rawDataNewUpdate['period'] = $rawData['period'];
            }

            $this->jobConfigDetailRepository->updateJobConfigByRawDataById($rawDataNewUpdate, $jobConfigDetail->id);
        }else{
            $disableCrawler = 2;
            $rawDataNewInsert = [
                'created_at' => date("Y/m/d H:i:s"),
                'updated_at' => date("Y/m/d H:i:s"),
                'domain_id'  => $domainId,
                'status'     => $disableCrawler
            ];

            if(isset($rawData['date_start'])){
                $rawDataNewInsert['date_start'] = $rawData['date_start'];
            }

            if(isset($rawData['date_end'])){
                $rawDataNewInsert['date_end'] = $rawData['date_end'];
            }

            if(isset($rawData['period'])){
                $rawDataNewInsert['period'] = $rawData['period'];
            }
            $this->jobConfigDetailRepository->insertJobConfigByRawData($rawDataNewInsert);
        }
    }


    /**
     * @param $listTag
     * @param $domainId
     * @throws \Exception
     */
    public function saveTagByDomainId($listTag, $domainId)
    {
        if(count($listTag) === 0){
            throw new \Exception('list data config not null');
        }

        $rawDataInsert = $this->buildRawDataSaveTagByDomainId($listTag, $domainId);
        $this->configRepository->insertTagByRawData($rawDataInsert);
    }

    public function buildRawDataSaveTagByDomainId($listTab, $domainId)
    {
        $rawDataInsert = [];
        foreach ($listTab as $tag){
            $rawDataInsert[] = [
                'name'      => $tag,
                'domain_id' => $domainId,
                'created_at' => date("Y/m/d H:i:s"),
                'updated_at' => date("Y/m/d H:i:s")
            ];
        }
        return $rawDataInsert;
    }
}