<?php


namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use App\Http\Requests\DomainJobProcessRequest;
use App\Http\Requests\DomainJobRequest;
use App\Service\Domain\DomainService;
use App\Service\DomainJob\DomainJobService;
use App\Service\Job\JobProcessService;
use App\Service\ProcessConvertDataService\ProcessConvertSalaryService;
use App\Service\ProcessConvertDataService\ProcessConvertSexService;


class DomainJobController extends Controller
{
    private $domainJobService;
    private $domainService;
    private $jobProcessService;

    public function __construct(
        DomainJobService $domainJobService,
        DomainService $domainService,
        JobProcessService $jobProcessService
    ) {
        $this->domainJobService = $domainJobService;
        $this->domainService = $domainService;
        $this->jobProcessService = $jobProcessService;
    }

    public function index(DomainJobRequest $request)
    {
        $domainJobs = $this->domainJobService->listDomainJob($request->all());
        $domainJobs->appends($request->except(['user']));
        $domains = $this->domainService->getAll();
        return view('domainJob.domain_job', ['domains' => $domains, 'domainJobs' => $domainJobs]);
    }

    public function convertJobProcess(DomainJobProcessRequest $request)
    {
        $data = $this->jobProcessService->convertJob($request->all());
        return $data;
    }
}
