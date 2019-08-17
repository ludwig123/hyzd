<?php


namespace app\home\model;


use app\home\domain\TimePeriod;

class WorkLoadModel
{

    public function entriesZhiduiDuring($timePeriod, $zhidui){

    }

    public function entriesDaduiDuring($timePeriod, $dadui){

    }


    public function entriesManDuring(TimePeriod $timePeriod, $man){
        $entries = db('xianchang')->where('weifashijian','BETWEEN', $timePeriod->getStartTime().','.$timePeriod->getEndTime())->where('zhiqinminjing','=',$man)->select();

        return $entries;
    }
}