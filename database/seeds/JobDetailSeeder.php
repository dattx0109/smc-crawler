<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class JobDetailSeeder extends Seeder
{
    public function run()
    {
        $listRawDataInsert = [];
        for ($i = 0; $i < 500; $i++) {
            $rawData = [
                'job_id'                => $i + 1,
                'experience'            => '3 Năm',
                'degree'                => 'Đại học',
                'employee_quantity'     => '5',
                'sex'                   => random_int(1, 3),
                'age'                   => '23',
                'job_description'       => 'Quảng bá và kinh doanh các sản phẩm Bất Động Sản do công ty phân phối.',
                'working_form'          => random_int(1, 2),
                'role'                  => '- Chủ động tìm kiếm mở rộng thị trường và khách hàng tiềm năng. Khảo sát thị trường nhằm thu thập, cập nhật thông tin cần thiết.',
                'probationary_period'   => '3 tháng',
                'benefits'              => '- Được tham gia các khóa đào tạo với các chuyên gia hàng đầu tại Việt Nam trong lĩnh vực Bất động sản.',
                'other_requirements'    => '- Có kỹ năng làm việc độc lập và làm việc nhóm
- Có khả năng giao tiếp ',
                'application_type'      => 'Bấm vào nút NỘP HỒ SƠ để ứng tuyển',
            ];
            $listRawDataInsert[] = $rawData;
        }
        \DB::table('job_detail')->insert($listRawDataInsert);
    }
}
