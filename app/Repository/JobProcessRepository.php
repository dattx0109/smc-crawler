<?php

namespace App\Repository;

use Exception;
use Illuminate\Support\Facades\DB;

class JobProcessRepository
{
    const JOB_TABLE = 'jobs';
    const JOB_CONTACT_TABLE = 'job_contact';
    const JOB_DETAIL_TABLE = 'job_detail';
    const JOB_TAG_TABLE = 'job_tag';
    const TAG_TABLE = 'tags';
    const COMPANIES_TABLE = 'companies';

    public function getAllJobFromCrawlerAppByDomainId($domainId)
    {
        return DB::table('jobs')
            ->leftJoin('job_detail', 'jobs.id', '=', 'job_detail.job_id')
            ->leftJoin('job_contact', 'jobs.id', '=', 'job_contact.job_id')
            ->leftJoin('companies', 'companies.id', '=', 'jobs.company_id')
            ->where('jobs.domain_id', $domainId)
            ->get()
        ;
    }

    public function getJobConvert($dataSearch)
    {
        $jobs = DB::table(self::JOB_TABLE)
            ->leftJoin(self::JOB_CONTACT_TABLE, self::JOB_TABLE . '.id', '=', self::JOB_CONTACT_TABLE . '.job_id')
            ->leftJoin(self::JOB_DETAIL_TABLE, self::JOB_TABLE . '.id', '=', self::JOB_DETAIL_TABLE . '.job_id')
            ->leftJoin(self::COMPANIES_TABLE, self::COMPANIES_TABLE . '.id', '=', self::JOB_TABLE . '.company_id');
        if (!empty($dataSearch['domain_id'])) {
            $jobs = $jobs->where(self::JOB_TABLE . '.domain_id', $dataSearch['domain_id']);
        }
        if (!empty($dataSearch['time_interval'])) {
            $timeInterval = (int)$dataSearch['time_interval'];
            $dateInterval = Date('Y-m-d', strtotime("-$timeInterval days"));
            $jobs = $jobs->whereDate(self::JOB_TABLE . '.created_at', '<=', $dateInterval);
        }
        if (!empty($dataSearch['status'])) {
            $jobs = $jobs->where(self::JOB_TABLE . '.status', $dataSearch['status']);
        }
        if (!empty($dataSearch['convert_status'])) {
            $jobs = $jobs->where(self::JOB_TABLE . '.status_convert', $dataSearch['convert_status']);
        }

        $jobs = $jobs->select(
            self::JOB_TABLE . '.id',
            self::JOB_TABLE . '.company_id',
            self::JOB_TABLE . '.domain_id',
            self::JOB_TABLE . '.job_name',
            self::JOB_TABLE . '.workplace',
            self::JOB_TABLE . '.salary_origin',
            self::JOB_TABLE . '.salary_kpi',
            self::JOB_TABLE . '.date_expired',
            self::JOB_TABLE . '.date_publish',
            self::JOB_TABLE . '.date_period',
            self::JOB_TABLE . '.link_crawler',
            self::JOB_TABLE . '.status_convert',
            self::JOB_CONTACT_TABLE . '.job_contact_name',
            self::JOB_CONTACT_TABLE . '.job_contact_phone',
            self::JOB_CONTACT_TABLE . '.job_contact_email',
            self::JOB_CONTACT_TABLE . '.job_contact_description',
            self::JOB_DETAIL_TABLE . '.experience',
            self::JOB_DETAIL_TABLE . '.degree',
            self::JOB_DETAIL_TABLE . '.employee_quantity',
            self::JOB_DETAIL_TABLE . '.sex',
            self::JOB_DETAIL_TABLE . '.age',
            self::JOB_DETAIL_TABLE . '.job_description',
            self::JOB_DETAIL_TABLE . '.working_form',
            self::JOB_DETAIL_TABLE . '.role',
            self::JOB_DETAIL_TABLE . '.probationary_period',
            self::JOB_DETAIL_TABLE . '.benefits',
            self::JOB_DETAIL_TABLE . '.other_requirements',
            self::JOB_DETAIL_TABLE . '.application_type',
            self::COMPANIES_TABLE . '.company_name',
            self::COMPANIES_TABLE . '.company_address',
            self::COMPANIES_TABLE . '.company_size',
            self::COMPANIES_TABLE . '.company_description',
            self::COMPANIES_TABLE . '.company_hotline',
            self::COMPANIES_TABLE . '.company_website',
            self::COMPANIES_TABLE . '.company_email',
            self::COMPANIES_TABLE . '.company_logo',
            self::COMPANIES_TABLE . '.company_image'
        )
            ->get();
        $tag = DB::table(self::JOB_TABLE)
            ->leftJoin(self::JOB_TAG_TABLE, self::JOB_TABLE . '.id', '=', self::JOB_TAG_TABLE . '.jobs_id')
            ->leftJoin(self::TAG_TABLE, self::TAG_TABLE . '.id', '=', self::JOB_TAG_TABLE . '.tag_id')
            ->select(
                self::TAG_TABLE . '.tag_name',
                self::TAG_TABLE . '.domain_id',
                self::JOB_TAG_TABLE . '.tag_id',
                self::JOB_TAG_TABLE . '.jobs_id'
            )
            ->get();
        $tag = $tag->groupBy('jobs_id')->toArray();
        foreach ($jobs as $job) {
            if (array_key_exists($job->id, $tag)) {
                $job->tag = $tag[$job->id];
            }
        }
        $dataJob = $jobs->toArray();
        $arrJobs = array();
        foreach ($dataJob as $job) {
            $arrJobs[$job->id] = $job;
        }

        return $arrJobs;
    }

    public function updateJobStatus($dataSearch)
    {
        $dataSearch = json_decode($dataSearch);
        DB::beginTransaction();
        try {
            $update = DB::table(self::JOB_TABLE)
                ->whereIn('id', $dataSearch)
                ->update(['status_convert' => 1]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
