<?php


namespace App\Service\Job;


use App\Repository\JobConfigDetailStatusRepository;


class JobConfigDetail
{
    private $jobConfigDetailStatusRepository;

    public function __construct(JobConfigDetailStatusRepository $jobConfigDetailStatusRepository)
    {
        $this->jobConfigDetailStatusRepository = $jobConfigDetailStatusRepository;
    }

    public function config($dataConfig, $domainId)
    {
        $this->jobConfigDetailStatusRepository->config($dataConfig, $domainId);
    }

    public function getConfig($domainId)
    {
        return $this->jobConfigDetailStatusRepository->getConfig($domainId);
    }
}
