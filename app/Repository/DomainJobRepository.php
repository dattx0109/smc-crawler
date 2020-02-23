<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class DomainJobRepository
{
    const JOB_TABLE = 'jobs';
    const DOMAIN_TABLE = 'domains';

    public function listDomainJob($dataSearch)
    {
        $domainJob = DB::table(self::JOB_TABLE)
            ->join(self::DOMAIN_TABLE, self::JOB_TABLE . '.domain_id', self::DOMAIN_TABLE . '.id');
        if (!empty($dataSearch['domain_id'])) {
            $domainJob = $domainJob->where(self::DOMAIN_TABLE . '.id', $dataSearch['domain_id']);
        }
        if (!empty($dataSearch['status'])) {
            $domainJob = $domainJob->where(self::JOB_TABLE . '.status', $dataSearch['status']);
        }
        if (!empty($dataSearch['convert_status'])) {
            $domainJob = $domainJob->where(self::JOB_TABLE . '.status_convert', $dataSearch['convert_status']);
        }
        if (!empty($dataSearch['time_interval'])) {
            $timeInterval = (int)$dataSearch['time_interval'];
            $dateInterval = Date('Y-m-d', strtotime("-$timeInterval days"));

            $domainJob = $domainJob->whereDate(self::JOB_TABLE . '.created_at', '<=', $dateInterval);
        }
        $domainJob = $domainJob
            ->select(
                self::DOMAIN_TABLE . '.name',
                self::JOB_TABLE . '.id as jobId',
                self::JOB_TABLE . '.status',
                self::JOB_TABLE . '.id as id_job',
                self::JOB_TABLE . '.status_convert',
                self::JOB_TABLE . '.job_name',
                self::JOB_TABLE . '.created_at',
                self::JOB_TABLE . '.report_total'
            )
            ->orderBy(self::JOB_TABLE . '.created_at', 'DESC')
            ->paginate(20);

        return $domainJob;
    }
}
