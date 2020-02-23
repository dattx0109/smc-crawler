<?php


namespace App\Service\JobCrawService;


use App\Repository\StatusCrawRepository\StatusCrawRepository;

class StatusCrawService
{
    private $statusCrawRepository;
    public function __construct(StatusCrawRepository $statusCrawRepository)
    {
        $this->statusCrawRepository = $statusCrawRepository;
    }

    public function getStatusCraw()
    {
        return $this->statusCrawRepository->getStatusCraw();
    }
}
