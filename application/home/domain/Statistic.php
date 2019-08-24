<?php


namespace app\home\domain;


use app\home\model\StatisticModel;

/**
 * Class Statistic 实现为repository
 * @package app\home\domain
 */
class Statistic
{
    public function countByDayMan($timeperiod, $jinghao,$alias)
    {
        $model = new StatisticModel();
        $result = $model->dayMan($timeperiod, $jinghao, $alias);

        $result = $this->countByDay($result);
        $result['name'] = $jinghao;

        return $result;
    }

    public function countByDayDaidui($timeperiod, $dadui,$alias)
    {
        $model = new StatisticModel();
        $result = $model->dayDadui($timeperiod, $dadui, $alias);

        $result = $this->countByDay($result);
        $result['name'] = $dadui;

        return $result;
    }

    public function countByDay($raw)
    {
        $real = array();
        $maxDay = date("t", strtotime($raw[0]["weifashijian"]));

        for ($i = 1; $i <= $maxDay; $i++)
        {
            $real[$i] = 0;
        }

        foreach ($raw as $k => $v)
        {
            $day = date("j", strtotime($v['weifashijian']));
            $real[$day] += 1;

        }

        return $real;
    }

}