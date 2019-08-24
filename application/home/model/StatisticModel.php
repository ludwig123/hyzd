<?php


namespace app\home\model;


use think\Db;

class StatisticModel
{
    /**
     * @param $timePeriod
     * @param $dadui 允许大队为空
     * @param $daimaArr 违法代码数组 [13527,46100]
     * @return array|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function dayDadui($timePeriod, $dadui, $daimaArr)
    {

        $map = ['weifaxingwei' => $daimaArr];


        return Db::view('wp_xianchang', 'weifashijian, weifaxingwei, jiaotongfangshi, shiyongxingzhi, faxianjiguan, zhiqinminjing ')
            ->view('wp_weifa_alias','alias', 'wp_xianchang.weifaxingwei = wp_weifa_alias.daima')
            ->where('weifashijian', 'BETWEEN', $timePeriod->getStartTime() . ',' . $timePeriod->getEndTime())
            ->where($map)  //匹配违法代码数组 [13527,46100]
            ->where('faxianjiguan','like', $dadui.'%')
            ->select();

    }

    public function dayZhidui()
    {

    }

}