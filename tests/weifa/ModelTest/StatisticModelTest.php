<?php


use app\home\model\StatisticModel;
use PHPUnit\Framework\TestCase;

class StatisticModelTest extends TestCase
{
    private $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new StatisticModel();
    }

    public function testDayDadui()
    {
        $timePeriod = new \app\home\domain\TimePeriod('2019-8-1', '2019-9-1');
        $result = $this->model->dayDadui($timePeriod, '435401000010', [13527,46100]);
        $this->assertGreaterThan(10, count($result));

    }


    public function testDayManDefault()
    {
        $timePeriod = new \app\home\domain\TimePeriod('2019-8-1', '2019-9-1');
        $result = $this->model->dayMan($timePeriod, '172579', [13527,46100]);
        $this->assertGreaterThan(10, count($result));
    }
}
