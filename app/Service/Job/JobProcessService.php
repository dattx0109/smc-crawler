<?php

namespace App\Service\Job;

use App\Repository\JobProcessRepository;
use App\Service\ProcessConvertDataService\ProcessConvertSalaryService;
use App\Service\Province\ProvinceService;

class JobProcessService
{
    private $jobProcessRepository;
    private $provinceService;

    public function __construct(JobProcessRepository $jobProcessRepository, ProvinceService $provinceService)
    {
        $this->jobProcessRepository = $jobProcessRepository;
        $this->provinceService = $provinceService;
    }

    public function convertJob($dataSearch)
    {
        $domainId = 1;
        $rawDataJob              = $this->jobProcessRepository->getAllJobFromCrawlerAppByDomainId($domainId);
        $rawDataJobAfterRefactor = $this->refactorDataPushSamacom($rawDataJob, $domainId);

        dd($rawDataJobAfterRefactor);

//        $jobs =  $this->getJobConverts($dataSearch);
//        $rawData = $this->convertProcess($jobs);
//        $rawData = json_encode($rawData);
//
//        return \Amqp::publish('routing-key', $rawData, ['queue' => 'queue-name']);
    }

    public function getJobConverts($dataSearch)
    {
        return $this->jobProcessRepository->getJobConvert($dataSearch);
    }

    public function updateStatusJob($dataSearch)
    {
        return $this->jobProcessRepository->updateJobStatus($dataSearch);
    }
    public function convertProcess($jobs)
    {
        $province =  $this->provinceService->getList();
        $genders = config('convert_data_process.gender');
        foreach ($jobs as $item) {
            $item->workplace =  convertProvince($item->workplace, $province);
            $item->sex =  convertSex('MALE', $genders);
            //convert income

            $data = '10-12 triệu';
            $param1 = 'triệu';
            $param2 = ' ';
            $item->salary_origin = convertIncome($param1,$param2,$data);
        }
        return $jobs;
    }

    public function refactorDataPushSamacom($rawData, $domainId)
    {
        $rawDataNew = [];
        foreach ($rawData as $item){
            $job = [
                'companies' => [
                    'name' => $item->company_name,
                    'logo' => $item->company_logo,
                    'company_description' => [
                        'about_us' => $item->company_description
                    ],
                    'address' => $item->company_address,
                    'size_min' => null,
                    'size_max' => null,
                    'email' => $item->company_email,
                    'hotline' => $item->company_hotline,
                    'website' => $item->company_website,
                    'company_benefit' => [
                        [
                            'name' => 'Option 1',
                            'description' => $item->benefits
                        ]
                    ]
                ],
                'job' => [
                    'id' => $item->id,
                    'title' => $item->job_name,

                    // Tinh toan service luong
                    'income_min'      => ProcessConvertSalaryService::convertSalary($domainId, $item->salary_kpi)['min'],
                    'income_max'      => ProcessConvertSalaryService::convertSalary($domainId, $item->salary_kpi)['max'],
                    'base_salary_min' => ProcessConvertSalaryService::convertSalary($domainId, $item->salary_origin)['min'],
                    'base_salary_max' => ProcessConvertSalaryService::convertSalary($domainId, $item->salary_origin)['min'],

                    'workplace' => $item->working_form,
                    'sex' => $item->sex
                ],
                'employ_description' => [
                    'charecter' => '',
                    'skills' => $item->other_requirements,
                    'degree' => $item->degree,
                    'experience' => $item->experience,
                    'appearence' => null,
                    'voice' => null
                ],
                'job_description' => [
                    [
                        'name' => $item->job_description
                    ]
                ],
                'contact' => [
                    'user_name' => $item->job_contact_name,
                    'phone' => $item->job_contact_phone,
                    'email' => $item->job_contact_email,
                ]
            ];
            $rawDataNew[] = $job;
        }
        return $rawDataNew;
    }
}
