<?php

use think\testing\TestCase;
use app\home\model\WorkLoadModel;
use app\home\domain\TimePeriod;

class WorkLoadModelTest extends TestCase
{
    protected  $model;
    protected function setup(): void
    {
        $this->model = new WorkLoadModel();
    }

    public function testEntriesManDuring()
    {

    }

    public function testEntriesZhiduiDuring()
    {

    }

    public function testEntriesDaduiDuring()
    {
        $timePeriod = new TimePeriod('2019-08-14 00:05:00', '2019-08-14 18:05:00');

        $entries = $this->model->entriesManDuring($timePeriod, '171376');

        $this->assertGreaterThan(5, count($entries));

    }
}
