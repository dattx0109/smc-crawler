<?php


namespace Tests\Unit\TimeService;


use App\Http\Controllers\TimeService;
use Tests\TestCase;

class TimeServiceTest extends TestCase
{

    /**
     * @dataProvider additionProviderWithCaseDateFull
     */
    public function testTimeElapsedStringWithCaseFull($time, $timeNow, $expected)
    {
        $timeService = new TimeService();
        $result = $timeService->timeElapsedString($time, $timeNow, true);
        $this->assertSame($result, $expected);
    }

    public function additionProviderWithCaseDateFull()
    {
        return [
            "TEST YEAR WITH TIME FULL FORMAT"    => ["2019-08-04 23:04:21", date_create("2020-09-20 23:10:25", timezone_open("Asia/Ho_Chi_Minh")), '1 Năm, 1 Tháng, 2 Tuần, 2 Ngày, 6 Phút, 4 Giây Trước'],
            "TEST MONTH WITH TIME FULL FORMAT"   => ["2019-08-04 23:04:21", date_create("2019-09-20 23:10:25", timezone_open("Asia/Ho_Chi_Minh")), '1 Tháng, 2 Tuần, 2 Ngày, 6 Phút, 4 Giây Trước'],
            "TEST WEEK WITH TIME FULL FORMAT"    => ["2019-08-04 23:04:21", date_create("2019-08-20 23:10:25", timezone_open("Asia/Ho_Chi_Minh")), '2 Tuần, 2 Ngày, 6 Phút, 4 Giây Trước'],
            "TEST DAY WITH TIME FULL FORMAT"     => ["2019-08-04 23:04:21", date_create("2019-08-05 23:10:25", timezone_open("Asia/Ho_Chi_Minh")), '1 Ngày, 6 Phút, 4 Giây Trước'],
            "TEST MINUTE WITH TIME FULL FORMAT"  => ["2019-08-04 23:04:21", date_create("2019-08-04 23:10:25", timezone_open("Asia/Ho_Chi_Minh")), '6 Phút, 4 Giây Trước'],
            "TEST SECONDS WITH TIME FULL FORMAT" => ["2019-08-04 23:04:21", date_create("2019-08-04 23:04:25", timezone_open("Asia/Ho_Chi_Minh")), '4 Giây Trước'],
        ];
    }

    public function testTimeWithTimeAgoLargerTimeNow()
    {
        $this->expectException(\Exception::class);

        $time = [
            'ago' => '2022-08-04 23:04:21',
            'now' => date_create("2020-09-20 23:10:25", timezone_open("Asia/Ho_Chi_Minh"))
        ];
        $timeService = new TimeService();
        $timeService->timeElapsedString($time['ago'], $time['now'], true);

    }
}