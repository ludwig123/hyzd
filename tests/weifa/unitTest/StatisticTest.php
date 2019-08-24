<?php


use app\home\domain\Statistic;
use PHPUnit\Framework\TestCase;

class StatisticTest extends TestCase
{

    public function testCountByDay()
    {
        $timePeriod = new \app\home\domain\TimePeriod('2019-7-1', '2019-8-1');
        $sta = new Statistic();
        $result = $sta->countByDayMan($timePeriod, '172579', [13527,46100]);
        $this->assertGreaterThan(4, count($result));

    }

    public function testCountByDadui()
    {
        $timePeriod = new \app\home\domain\TimePeriod('2019-7-1', '2019-8-1');
        $sta = new Statistic();
        $result = $sta->countByDayDaidui($timePeriod, '435401000010', [13527,46100]);
        $this->assertGreaterThan(4, count($result));
    }

    public function testCountByDadui_zhidui()
    {
        $timePeriod = new \app\home\domain\TimePeriod('2019-7-1', '2019-8-1');
        $sta = new Statistic();
        $result = $sta->countByDayDaidui($timePeriod, '', [13527,46100]);
        $this->assertGreaterThan(4, count($result));
    }
}
