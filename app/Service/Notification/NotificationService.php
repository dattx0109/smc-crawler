<?php


namespace App\Service\Notification;


use App\Http\Controllers\TimeService;
use App\Repository\Notification\NotificationRepository;

class NotificationService
{
    private $notificationRepository;
    private $timeService;

    public function __construct(NotificationRepository $notificationRepository, TimeService $timeService)
    {
        $this->notificationRepository = $notificationRepository;
        $this->timeService = $timeService;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getAllNotification()
    {
        $rawDataNotification = $this->notificationRepository->getAllNotification();
        return $this->refactorDataUpdateTimeElapsedString($rawDataNotification);

    }

    /**
     * @param $rawData
     * @return mixed
     * @throws \Exception
     */
    public function refactorDataUpdateTimeElapsedString($rawData)
    {
        foreach ($rawData as &$item){
            $item->timeConvert = $this->timeService->timeElapsedString($item->created_at,false, true);
        }
        return $rawData;
    }

}