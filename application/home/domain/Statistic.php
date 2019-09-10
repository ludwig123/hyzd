<?php


namespace app\home\domain;


use app\home\model\StatisticModel;

/**
 * Class Statistic 实现为repository
 * @package app\home\domain
 */
class Statistic
{
    /** 按月统计单个民警的工作量
     * @param $timeperiod
     * @param $jinghao
     * @param $alias
     * @return array|\PDOStatement|string|\think\Collection
     */
    public function countByDayMan($timeperiod, $jinghao, $alias)
    {
        $model = new StatisticModel();
        $result = $model->dayMan($timeperiod, $jinghao, $alias);

        $result = $this->countByDay($result);
        $result['name'] = $jinghao;

        return $result;
    }

    public function countByDayDaidui($timeperiod, $dadui='',$alias = '')
    {
//        if (empty($dadui))
//        {
//           return $this->countByDayZhidui($timeperiod, $zhidui = '衡阳支队', $alias);
//        }


        $model = new StatisticModel();
        $result = $model->dayDadui($timeperiod, $dadui, $alias);

        $result = $this->countByDay($result);
        $result['name'] = $dadui;

        return $result;
    }

    public function countByDay($raw)
    {
        $real = array();

        //TO-DO 必须先按日期顺序，初始化数据表，否则图表会缺失无数据的那一天
//        $maxDay = date("t", strtotime($raw[0]["weifashijian"]));
//
//        //将日期置零
//        for ($i = 1; $i <= $maxDay; $i++)
//        {
//            $real[$i] = 0;
//        }

        foreach ($raw as $k => $v)
        {
            $day = date("m-d", strtotime($v['weifashijian']));
            if(!array_key_exists($day,$real)){
                $real[$day] = 0;
            }
                $real[$day] += 1;

        }

        ksort($real);

        return $real;
    }

    public function countByDayZhidui($timeperiod, $zhidui='衡阳支队',$alias = '')
    {
        $model = new StatisticModel();
        $result = $model->dayDadui($timeperiod, '', $alias);

        $result = $this->countByDay($result);
        $result['name'] = $zhidui;

        return $result;
    }

}