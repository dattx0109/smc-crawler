<?php


namespace App\Service\Job;


use App\Repository\JobRepository;

class JobService
{
    private $JobRepository;

    public function __construct(JobRepository $jobRepository)
    {
        $this->JobRepository = $jobRepository;
    }

    public function insert($dataInsert)
    {
        $this->JobRepository->insert($dataInsert);
    }
}
