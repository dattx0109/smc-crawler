<?php


namespace App\Service\JobCrawService;


use App\Repository\JobCrawDetailRepository;

class JobCrawDetailService
{
    private $jobCrawDetailRepository;
    public function __construct(JobCrawDetailRepository $jobCrawDetailRepository)
    {
        $this->jobCrawDetailRepository = $jobCrawDetailRepository;
    }

    public function getJobByJobId($JobId)
    {
        return $this->jobCrawDetailRepository->getDetailJob($JobId);
    }

}
