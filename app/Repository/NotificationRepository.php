<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class NotificationRepository
{
    const TABLE_NAME = 'notifications';
    const USER_TABLE = 'users';
    const DOMAIN_TABLE = 'domains';
    const NOT_READ = 1;
    const IS_READ = 2;

    public function getList($dataSarch)
    {
        return DB::table(self::TABLE_NAME)
            ->leftJoin(self::DOMAIN_TABLE, self::DOMAIN_TABLE . '.id', '=', self::TABLE_NAME . '.domain_id')
            ->leftJoin(self::USER_TABLE, self::USER_TABLE . '.id', '=', self::TABLE_NAME . '.user_id')
            ->where(self::TABLE_NAME . '.is_read', self::NOT_READ)
            ->select(
                self::USER_TABLE . '.name as user_name',
                self::DOMAIN_TABLE . '.name as domain_name',
                self::TABLE_NAME . '.*'
            )
            ->paginate(10);
    }
}
