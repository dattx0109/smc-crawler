<?php


namespace App\Service\Company;


use App\Repository\CompaniesRepository;


class CompaniesService
{
    private $companiesRepository;

    public function __construct(CompaniesRepository $companiesRepository)
    {
        $this->companiesRepository = $companiesRepository;
    }

    public function insert($dataInsert)
    {
        $this->companiesRepository->insert($dataInsert);
    }

}
