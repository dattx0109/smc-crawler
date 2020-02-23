<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 7/12/19
 * Time: 3:15 PM
 */

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use App\Service\ConfigDomainService\ConfigDomainService;

class DomainController extends Controller
{
    private $domainService;

    public function __construct(ConfigDomainService $configDomainService)
    {
        $this->domainService = $configDomainService;
    }

    public function addNewDomain()
    {
        $userId = request()->user->id;
        $rawData = request()->input();

        if (!isset($rawData['domain'])) {
            return response()->json([
                'message' => 'Domain không được để trống',
                'code' => 1
            ], 200);
        }
        if ($this->domainService->validateDomainName($rawData['domain'])) {
            return response()->json([
                'message' => 'Domain không đúng định dạng',
                'code'    => 2
            ], 200);
        }

        $isDomainNameExist = $this->domainService->findDomainByName($rawData['domain']);

        if ($isDomainNameExist) {
            return response()->json([
                'message' => 'Domain đã tồn tại',
                'code'    => 3
            ], 200);
        }

        $rawDataInsert = [
            'name'       => $rawData['domain'],
            'status'     => 2,
            'user_id'    => $userId,
            'created_at' => date("Y/m/d H:i:s"),
            'updated_at' => date("Y/m/d H:i:s"),

        ];
        $domainId = $this->domainService->addNewDomain($rawDataInsert);
        return response()->json([
            'message'   => 'Thêm mới domain thành công',
            'data'      => $rawData['domain'],
            'domain_id' => $domainId,
            'code'      => 4
        ]);
    }

    public function listDomain()
    {
        $listDomain = $this->domainService->getListDomain();
        return view('home.home', ['listUser' => $listDomain]);
    }
}
