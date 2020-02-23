<?php


namespace App\Repository;

use Exception;
use Illuminate\Support\Facades\DB;

class JobConfigDetailStatusRepository
{
    const TABLE_NAME = 'domains';
    const TURN_ON = 1;
    const TURN_OFF = 2;
    public function config($dataRaw, $domainId)
    {

        DB::beginTransaction();
        try {
            $dataRaw['status'] === 'true' ? $status = self::TURN_ON : $status = self::TURN_OFF;
            DB::table(self::TABLE_NAME)->where('id', $domainId)
                ->update(['status' => $status, 'updated_at' => date('Y-m-d H:i:s')]);
            DB::commit();
            return;
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function getConfig($domainId)
    {
        $config = DB::table(self::TABLE_NAME)->where('id', $domainId)
            ->first();
        if (empty($config)) {
            return false;
        } else {
            if ($config->status == self::TURN_ON) {
                return true;
            }
            if ($config->status == self::TURN_OFF) {
                return false;
            }
        }
    }
}
