<?php
namespace app\home\controller;


use app\home\domain\TimePeriod;
use app\home\model\WorkLoadModel;
use think\Controller;

class Workload extends Controller
{
    public function zhidui($startTime, $endTime, $zhidui)
    {

    }

    public function dadui($startTime, $endTime, $dadui)
    {

    }

    public function man($startTime, $endTime, $jinghao)
    {
        $timePeriod = new TimePeriod($startTime, $endTime);
        $model = new WorkLoadModel();
        $entries = $model->entriesManDuring($timePeriod, $jinghao);
        return json($entries);

    }
}