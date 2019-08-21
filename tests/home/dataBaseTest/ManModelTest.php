<?php

namespace app\home\model;

use PHPUnit\Framework\TestCase;

class ManModelTest extends TestCase
{

    public function testManList()
    {
        $model = new ManModel();
        $list = $model->manList();
        $this->assertEquals(188, count($list));
    }
}
