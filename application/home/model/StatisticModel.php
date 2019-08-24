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
        //因为是两种形式的where 条件形式，必须分开，否则报错
        $mapForDaima = ['weifaxingwei' => $daimaArr];
        $mapForDadui[] =  ['faxianjiguan','like', $dadui.'%'];

        //此段代码不要修改
        //模板代码，仅修改上面即可
        return Db::view('wp_xianchang', 'weifashijian, weifaxingwei, jiaotongfangshi, shiyongxingzhi, faxianjiguan, zhiqinminjing ')
            ->view('wp_weifa_alias','alias', 'wp_xianchang.weifaxingwei = wp_weifa_alias.daima')
            ->where('weifashijian', 'BETWEEN', $timePeriod->getStartTime() . ',' . $timePeriod->getEndTime())
            ->where($mapForDaima)  //匹配违法代码数组 [13527,46100]
            ->where($mapForDadui)
            ->select();

    }

    public function dayMan($timePeriod, $jinghao, $daimaArr)
    {
        $mapForDaima = ['weifaxingwei' => $daimaArr];
        $mapForMan[] =  ['zhiqinminjing','=', $jinghao];


        return Db::view('wp_xianchang', 'weifashijian, weifaxingwei, jiaotongfangshi, shiyongxingzhi, faxianjiguan, zhiqinminjing ')
            ->view('wp_weifa_alias','alias', 'wp_xianchang.weifaxingwei = wp_weifa_alias.daima')
            ->where('weifashijian', 'BETWEEN', $timePeriod->getStartTime() . ',' . $timePeriod->getEndTime())
            ->where($mapForDaima)  //匹配违法代码数组 [13527,46100]
            ->where($mapForMan)
            ->select();

    }

}