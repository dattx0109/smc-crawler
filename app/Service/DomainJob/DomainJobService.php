<?php

namespace App\Service\DomainJob;

use App\Repository\DomainJobRepository;

class DomainJobService
{
    private $domainJobRepository;

    public function __construct(DomainJobRepository $domainJobRepository)
    {
        $this->domainJobRepository = $domainJobRepository;
    }

    public function listDomainJob($dateSearch)
    {
        return $this->domainJobRepository->listDomainJob($dateSearch);
    }
}
