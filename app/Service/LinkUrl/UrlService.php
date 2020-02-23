<?php


namespace App\Service\LinkUrl;


use App\Repository\UrlRepository;

class UrlService
{
    private $urlRepository;

    public function __construct(UrlRepository $urlRepository)
    {
        $this->urlRepository = $urlRepository;
    }

    public function insert($dataInsert)
    {
        $this->urlRepository->insert($dataInsert);

    }

    public function findUrlByUrlAndDomainId($dataCheck)
    {
        return $this->urlRepository->findUrlByUrlAndDomainId($dataCheck);
    }
    public function getList($domainId){

        return $this->urlRepository->getList($domainId);
    }

}
