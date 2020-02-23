<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequset;
use App\Service\ListNotificationService;

class NotificationController extends Controller
{
    private $listNotificationService;

    public function __construct(ListNotificationService $listNotificationService)
    {
        $this->listNotificationService = $listNotificationService;
    }

    public function index()
    {

    }

    public function getNotification(NotificationRequset $requset)
    {
        return response()->json($this->listNotificationService->getList($requset->all())) ;
    }
}
