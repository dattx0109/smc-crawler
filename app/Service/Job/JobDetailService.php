<?php


namespace App\Service\Job;


use App\Repository\JobDetailRepository;

class JobDetailService
{
    private $JobDetailRepository;

    public function __construct(JobDetailRepository $detailRepository)
    {
        $this->JobDetailRepository = $detailRepository;
    }

    public function insert($dataInsert)
    {
        $this->JobDetailRepository->insert($dataInsert);
    }
}
