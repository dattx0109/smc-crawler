<?php


namespace App\Service\ConfigDomainService;

use App\Repository\DomainRepository;

class ConfigDomainService
{
    private $domainRepository;

    public function __construct(DomainRepository $domainRepository)
    {
        return $this->domainRepository = $domainRepository;
    }

    public function addNewDomain($rawData)
    {
        return $this->domainRepository->insertDataDomain($rawData);
    }

    public function findDomainByName($name)
    {
        return $this->domainRepository->findDomainByName($name);
    }

    public function validateDomainName($domainName)
    {
        return false;
    }

    public function getListDomain()
    {
        return $this->domainRepository->getListDomain();
    }

    public function getNameDomain($domainId)
    {
        return $this->domainRepository->getNameDomain($domainId);
    }
}
