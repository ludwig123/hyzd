<?php


namespace app\home\model;


use app\home\domain\TimePeriod;

class WorkLoadModel
{

    public function entriesZhiduiDuring($timePeriod, $zhidui){

    }

    public function entriesDaduiDuring($timePeriod, $dadui){
        $entries = db('xianchang')
            ->where('weifashijian','BETWEEN', $timePeriod->getStartTime().','.$timePeriod->getEndTime())
            ->where('faxianjiguan','=',$dadui)->select();

        return $entries;
    }


    public function entriesManDuring(TimePeriod $timePeriod, $man){
        $entries = db('xianchang')
            ->where('weifashijian','BETWEEN', $timePeriod->getStartTime().','.$timePeriod->getEndTime())
            ->where('zhiqinminjing','=',$man)
            ->select();

        return $entries;
    }

    public function manWorkLoadCount(TimePeriod $timePeriod, $man)
    {
        $sum = db('xianchang')
            ->field('zhiqinminjing, count(*) as count')
            ->group('zhiqinminjing')
            ->where('weifashijian','BETWEEN', $timePeriod->getStartTime().','.$timePeriod->getEndTime())
            ->where('zhiqinminjing','=',$man)->select();

        return $sum;
    }

    public function daduiWorkLoadCount(TimePeriod $timePeriod, $dadui)
    {
        $sum = db('xianchang')
            ->field('zhiqinminjing, count(*) as count')
            ->group('zhiqinminjing')
            ->where('weifashijian','BETWEEN', $timePeriod->getStartTime().','.$timePeriod->getEndTime())
            ->where('faxianjiguan','=',$dadui)
            ->select();

        return $sum;
    }

    public function zhiduiWorkLoadCount(TimePeriod $timePeriod)
    {
        $sum = db('xianchang')
            ->field('faxianjiguan, count(*) as count')
            ->group('faxianjiguan')
            ->where('weifashijian','BETWEEN', $timePeriod->getStartTime().','.$timePeriod->getEndTime())
            ->order('faxianjiguan','asc')
            ->select();

        return $sum;
    }

    public function recent30day($dadui)
    {
        $aMonthAgo = $this->aMonthAgo();
        $today = date("Y-m-d",time());
        $timePeriod = new TimePeriod($aMonthAgo, $today);
        if (empty($dadui))
        {
            $query = "";
            $workload = $this->zhiduiWorkLoadCount($timePeriod);

        }
        else
        {
            $workload = $this->daduiWorkLoadCount($timePeriod);
        }
    }

    public function aMonthAgo(){
        $aMonthAgo = date("Y-m-d",strtotime("last month"));
        return $aMonthAgo;

    }
}