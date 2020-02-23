<?php

namespace App\Service;

use App\Repository\NotificationRepository;

class ListNotificationService
{
    private $notificationRepository;

    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    public function getList($dataSearch)
    {
        return $this->notificationRepository->getList($dataSearch);
    }
}
