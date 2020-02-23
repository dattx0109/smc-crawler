<?php


namespace App\Http\Controllers;

class TimeService
{

    /**
     * @param $time
     * @param bool $dateNow
     * @param bool $full
     * @return string
     * @throws \Exception
     */
    public function timeElapsedString($time, $dateNow = false, $full = false)
    {
        $now = new \DateTime();
        $ago = new \DateTime($time);
        if($ago->getTimestamp() > $now->getTimestamp()){
            throw new \Exception('Time Ago larger Time Now');
        }

        if($dateNow){
            $now = $dateNow;
        }

        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'Năm',
            'm' => 'Tháng',
            'w' => 'Tuần',
            'd' => 'Ngày',
            'h' => 'Giờ',
            'i' => 'Phút',
            's' => 'Giây',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' Trước' : 'Bây giờ';
    }
}