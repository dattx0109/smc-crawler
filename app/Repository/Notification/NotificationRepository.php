<?php


namespace App\Repository\Notification;


use Illuminate\Support\Facades\DB;

class NotificationRepository
{
    const TABLE_NAME = 'notifications';

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAllNotification()
    {
        return DB::table(self::TABLE_NAME)->get();
    }
}