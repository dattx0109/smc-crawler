<?php


namespace App\Http\Controllers\Job;


use App\Http\Controllers\Controller;
use App\Service\JobCrawService\JobCrawDetailService;

class JobCrawDetailController extends Controller
{
    private $jobCrawDetailService;
    public function __construct(JobCrawDetailService $jobCrawDetailService)
    {
        $this->jobCrawDetailService = $jobCrawDetailService;
    }

    public function getDetailJobById($jobId)
    {
        $detailJob = $this->jobCrawDetailService->getJobByJobId($jobId);
//        dd($detailJob);
        return view('jobs.jobs', [
            'listJob' => $detailJob
        ]);
    }
}
