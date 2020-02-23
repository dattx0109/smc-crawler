<?php
namespace App\Http\Controllers\Province;

use App\Service\Province\ProvinceService;
use App\Service\ProcessConvertDataService\ProcessConvertProvinceService;
use test\Mockery\ProxyMockingTest;

class ProvinceController
{
    private $processConvertProvinceService;
    public function __construct(ProcessConvertProvinceService $processConvertProvinceService)
    {
        $this->processConvertProvinceService = $processConvertProvinceService;
    }

    public function getList()
    {
        $domainId = 1;
        $province = 'Hà nam';
        $province = trim(strtoupper(convertStringUtf8Unmarked($province)));
        dd(ProcessConvertProvinceService::convertProvince(1, $province));
        return   $this->processConvertProvinceService->convertProvince($domainId, $province);
    }
}
