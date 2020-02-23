<?php


namespace App\Repository;

use Illuminate\Support\Facades\DB;


class JobCrawDetailRepository
{
    const TABLE_JOBS = 'jobs';
    const TABLE_DETAIL_JOB = 'job_detail';
    const TABLE_JOB_CONTACT = 'job_contact';
    const TABLE_COMPANIES = 'companies';
    const TABLE_JOB_TAG = 'job_tag';

    public function getDetailJob($JobId)
    {
        $detailJob = DB::table(self::TABLE_JOBS)
            ->leftJoin(self::TABLE_DETAIL_JOB, 'jobs.id', '=', 'job_detail.job_id')
            ->leftJoin(self::TABLE_JOB_CONTACT, 'jobs.id', '=', 'job_contact.job_id')
            ->leftJoin(self::TABLE_COMPANIES, 'jobs.company_id', '=', 'companies.id')
            ->where(self::TABLE_JOBS . '.id', $JobId)
            ->first();
        return $detailJob;
    }
}
