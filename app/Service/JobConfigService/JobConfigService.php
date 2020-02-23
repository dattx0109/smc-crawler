<?php


namespace App\Service\JobConfigService;


use App\Repository\DomainRepository;
use App\Repository\JobConfigRepository;

class JobConfigService
{
    private $jobConfigRepository;
    private $domainRepository;

    /**
     * JobConfigService constructor.
     * @param JobConfigRepository $jobConfigRepository
     */
    public function __construct(JobConfigRepository $jobConfigRepository, DomainRepository $domainRepository)
    {
        $this->domainRepository    = $domainRepository;
        $this->jobConfigRepository = $jobConfigRepository;
    }

    /**
     * @param $rawData
     * @return bool
     */
    public function updateConfig($rawData)
    {
        $isConfigJob = $this->jobConfigRepository->findConfigByDomainId($rawData['domain_id']);
        if ($isConfigJob) {
            $rawDataAfterUpdate = $rawData;
            unset($rawDataAfterUpdate['domain_id']);
            return $this->jobConfigRepository
                ->updateConfigByRawDataAndDomainId($rawDataAfterUpdate, $rawData['domain_id']);
        }
        return $this->jobConfigRepository->insertNewConfig($rawData);
    }

    public function getConfigByDomainId($domainId)
    {
        return $this->jobConfigRepository->findConfigByDomainId($domainId);
    }

    public function buildDataInsertConfigJobFromRequest($request, $domainId)
    {
        $rawData = [];
        $rawData['domain_id']               = $domainId;
        $rawData['job_name']                = $request->input('job_name');
        $rawData['workplace']               = $request->input('workplace');
        $rawData['salary_origin']           = $request->input('salary_origin');
        $rawData['salary_kpi']              = $request->input('salary_kpi');
        $rawData['date_expired']            = $request->input('date_expired');
        $rawData['date_publish']            = $request->input('date_publish');
        $rawData['date_period']             = $request->input('date_period');
        $rawData['experience']              = $request->input('experience');
        $rawData['degree']                  = $request->input('degree');
        $rawData['employee_quantity']       = $request->input('employee_quantity');
        $rawData['sex']                     = $request->input('sex');
        $rawData['age']                     = $request->input('age');
        $rawData['job_description']         = $request->input('job_description');
        $rawData['working_form']            = $request->input('working_form');
        $rawData['role']                    = $request->input('role');
        $rawData['probationary_period']     = $request->input('probationary_period');
        $rawData['benefits']                = $request->input('benefits');
        $rawData['other_requirements']      = $request->input('other_requirements');
        $rawData['application_type']        = $request->input('application_type');
        $rawData['job_contact_name']        = $request->input('job_contact_name');
        $rawData['job_contact_phone']       = $request->input('job_contact_phone');
        $rawData['job_contact_email']       = $request->input('job_contact_email');
        $rawData['job_contact_description'] = $request->input('job_contact_description');
        $rawData['company_name']            = $request->input('company_name');
        $rawData['company_address']         = $request->input('company_address');
        $rawData['company_size']            = $request->input('company_size');
        $rawData['company_description']     = $request->input('company_description');
        $rawData['company_hotline']         = $request->input('company_hotline');
        $rawData['company_website']         = $request->input('company_website');
        $rawData['company_email']           = $request->input('company_email');
        $rawData['company_logo']            = $request->input('company_logo');
        $rawData['company_image']           = $request->input('company_image');
        $rawData['tag_name']                = $request->input('tag_name');
        $rawData['created_at']              = date("Y/m/d H:i:s");
        $rawData['updated_at']              = date("Y/m/d H:i:s");
        $rawData['link_url_test']           = $request->input('link_url_test');

        return $rawData;
    }

    public function listUrlLink($domainId)
    {
        return $this->jobConfigRepository->getListUrl($domainId);
    }

    public function insertUrl($rawData)
    {
        return $this->jobConfigRepository->insertUrl($rawData);
    }

    public function findUrlByUrlAndDomainId($url, $domainId)
    {
        return $this->jobConfigRepository->findUrlByUrlAndDomainId($url, $domainId);
    }

    public function checkValidateUrlFromUrlOrigin($domainUrl, $domainId)
    {
        $domainName = $this->domainRepository->getDomainByDomainId((int)$domainId);
        return strpos($domainUrl, $domainName->name) !== false;
    }

    public function validateUrl($url)
    {
        $result = strpos($url, "https://") !== false
            || strpos($url, "http://") !== false
        ;
        return !$result;
    }

}
