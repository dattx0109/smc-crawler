<?php


namespace App\Service\Job;


use App\Repository\JobContactRepository;

class JobContactService
{
    private $JobContactRepository;

    public function __construct(JobContactRepository $JobContactRepository)
    {
        $this->JobContactRepository = $JobContactRepository;
    }

    public function insert($dataInsert)
    {
        $this->JobContactRepository->insert($dataInsert);
    }
}
