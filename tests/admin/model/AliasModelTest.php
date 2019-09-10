<?php


use app\admin\model\AliasModel;
use PHPUnit\Framework\TestCase;

class AliasModelTest extends TestCase
{

    public function testGetAliasByName_chaosu_default()
    {
        $model = new AliasModel();
        $result = $model->getAliasByName('超速');
        $this->assertArrayHasKey(10, $result);
    }

    public function testGetAliasByName_notExist()
    {
        $model = new AliasModel();
        $result = $model->getAliasByName('杀人');
        $this->assertEquals(true, empty($result));

    }
}
