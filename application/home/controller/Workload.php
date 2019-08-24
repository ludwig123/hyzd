<?php

namespace app\home\controller;


use app\home\domain\LayuiSupport;
use app\home\domain\TimePeriod;
use app\home\domain\TranslatorForDadui;
use app\home\model\ManModel;
use app\home\model\WorkLoadModel;
use think\Controller;

class Workload extends Controller
{
    public function zhidui($page = '', $limit = '', $startTime, $endTime)
    {
        $timePeriod = new TimePeriod($startTime, $endTime);
        $model = new WorkLoadModel();
        $entries = $model->zhiduiWorkLoadCount($timePeriod);

        $entries = $this->replaceFaxianjiguanWithDadui($entries);
        $entries = $this->sortCount($entries);
        $entries = $this->addRank($entries);

        return LayuiSupport::replyForTable($page, $limit,$entries);

    }

    public function dadui($page = '', $limit = '', $startTime = '', $endTime = '', $dadui = '')
    {
        if (empty($startTime)) $startTime = '2019-8-1 0:0:';
        if (empty($endTime)) $endTime = '2019-8-20 0:0';
        if (empty($dadui)) $dadui = '435401000010';

        $timePeriod = new TimePeriod($startTime, $endTime);
        $model = new WorkLoadModel();
        $entries = $model->daduiWorkLoadCount($timePeriod, $dadui);


        $entries = $this->sortCount($entries);
        $entries = $this->addRank($entries);
        $entries = $this->addNameWithJinghao($entries);


        return LayuiSupport::replyForTable($page, $limit,$entries);

    }

    public function man($startTime, $endTime, $jinghao)
    {
        $timePeriod = new TimePeriod($startTime, $endTime);
        $model = new WorkLoadModel();
        $entries = $model->manWorkLoadCount($timePeriod, $jinghao);
        return LayuiSupport::replyForTable($entries);

    }

    private function replaceFaxianjiguanWithDadui($entries)
    {
        $result = array();
        foreach ($entries as $k => $v) {

            $v['dadui'] = TranslatorForDadui::codeToDadui($v['faxianjiguan']);
            $result[] = $v;
        }
        return $result;
    }

    private function addRank($entries)
    {
        $result = array();
        $rank = 0;
        $previous = 9999999999;
        foreach ($entries as $k => $v) {
            if ($previous > $v['count']) {
                $rank++;
                $previous = $v['count'];
            }
            $v['rank'] = $rank;
            $result[] = $v;
        }
        return $result;
    }

    public function sortCount($entries)
    {
        $len = count($entries);
        if ($len < 2)
            return $entries;
        for ($i = 0; $i < $len - 1; $i++) {
            if ($entries[$i]['count'] < $entries[$i + 1]['count']) {
                $temp = $entries[$i];
                $entries[$i] = $entries[$i + 1];
                $entries[$i + 1] = $temp;
            }
        }
        $min = $entries[$len - 1];
        $reduce = array_slice($entries, 0, -1);
        $result = $this->sortCount($reduce);
        $result[] = $min;
        return $result;
    }

    private function addNameWithJinghao($entries)
    {
        $result = array();

        $manList = (new ManModel())->manList();
        if (empty($manList)) {
            foreach ($entries as $k => $v) {
                $v['name'] = '';
                $result[] = $v['name'];
            }
        }

        foreach ($entries as $k => $v) {
            $v['name'] = array_key_exists($v['zhiqinminjing'], $manList) ? $manList[$v['zhiqinminjing']] : '未识别民警';
            $result[] = $v;
        }

        return $result;
    }



}