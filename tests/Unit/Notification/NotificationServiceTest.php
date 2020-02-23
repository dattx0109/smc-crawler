<?php


namespace Tests\Unit\Notification;


use App\Http\Controllers\TimeService;
use App\Repository\Notification\NotificationRepository;
use App\Service\Notification\NotificationService;
use Tests\TestCase;

class NotificationServiceTest extends TestCase
{
    public function testActionGetAllNotification()
    {
        $notificaiton = [
            (object) [
                'id'          => 1,
                'name'        => 'Hệ thống config crawler cảnh báo',
                'description' => 'Trường tên job hệ thống đang craw về length = 500 kí tự => quá dài',
                'type'        => 1,
                'created_at'  => '2019-08-04 23:05:21',
                'updated_at'  => '2019-08-04 23:05:21',
            ],
            (object) [
                'id'          => 2,
                'name'        => 'Hệ thống config crawler cảnh báo',
                'description' => 'Trường tên job hệ thống đang craw về length = 500 kí tự => quá dài',
                'type'        => 1,
                'created_at'  => '2019-08-04 23:05:21',
                'updated_at'  => '2019-08-04 23:05:21',
            ]
        ];

        $notificationExpected = [
            (object) [
                'id'          => 1,
                'name'        => 'Hệ thống config crawler cảnh báo',
                'description' => 'Trường tên job hệ thống đang craw về length = 500 kí tự => quá dài',
                'type'        => 1,
                'created_at'  => '2019-08-04 23:05:21',
                'updated_at'  => '2019-08-04 23:05:21',
                'timeConvert' => '4 Giây Trước'
            ],
            (object) [
                'id'          => 2,
                'name'        => 'Hệ thống config crawler cảnh báo',
                'description' => 'Trường tên job hệ thống đang craw về length = 500 kí tự => quá dài',
                'type'        => 1,
                'created_at'  => '2019-08-04 23:05:21',
                'updated_at'  => '2019-08-04 23:05:21',
                'timeConvert' => '4 Giây Trước'
            ]
        ];

        $notificationRepositoryMock = $this->createMock(NotificationRepository::class);
        $notificationRepositoryMock->method('getAllNotification')
            ->willReturn($notificaiton)
        ;

        $timeServiceMock = $this->createMock(TimeService::class);
        $timeServiceMock->method('timeElapsedString')
            ->willReturn('4 Giây Trước')
        ;

        $notificationService = new NotificationService($notificationRepositoryMock, $timeServiceMock);
        $result = $notificationService->getAllNotification();
        $this->assertEquals($result, $notificationExpected);
    }
}