<?php

namespace App\Service\Domain;

use App\Repository\DomainRepository;

class DomainService
{
    private $domainRepository;

    public function __construct(DomainRepository $domainRepository)
    {
        $this->domainRepository = $domainRepository;
    }

    public function getAll()
    {
        return $this->domainRepository->getListAll();
    }
}
