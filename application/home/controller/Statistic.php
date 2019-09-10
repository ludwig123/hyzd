<?php


namespace app\home\controller;


use app\home\domain\LayuiSupport;
use app\home\domain\TimePeriod;
use think\helper\Time;

class Statistic
{
    public function dayDadui($page = '', $limit = '', $startDay, $endDay)
    {
        
    }
    
    public function monthDadui()
    {
        $startTime=date('Y-m-d', strtotime("last month"));
        $endTime= date('Y-m-d', strtotime("-1 day"));

        $timePeriod = new TimePeriod($startTime, $endTime);
        $data = (new \app\home\domain\Statistic())->countByDayDaidui($timePeriod);

        return json($this->dataForCharts($data));

    }

    public function yearDadui()
    {
        
    }


    public function dayZhidui($page = '', $limit = '', $startDay, $endDay)
    {

    }

    public function monthZhidui()
    {

    }

    public function yearZhidui()
    {

    }


    public function dayMan($page = '', $limit = '', $startDay, $endDay)
    {

    }

    public function monthMan()
    {

    }

    public function yearMan()
    {

    }

    private function dataForCharts($data)
    {
        $result = array();
        foreach ($data as $k => $v)
        {
            $result[0][] = $k;
            $result[1][] = $v;
        }
        return $result;
    }
    

    
    

}