<?php


namespace app\home\controller;


use app\home\domain\WeifaPackage;
use app\home\domain\WeifaType;
use app\home\model\WeifaTypeModel;
use think\Controller;
use app\home\domain\LayuiSupport;

/**
 * Class Weifa
 * plan -> package ->  type ->item 三级
 * @package app\home\controller
 */
class Weifa extends Controller
{
    public function itemAll($page=1, $limit=10)
    {
        return LayuiSupport::replyForTable($page, $limit,(new WeifaType())->all());
    }

    public function typeAll($page=1, $limit=10)
    {
        return LayuiSupport::replyForTable($page, $limit,(new WeifaTypeModel())->allType());
    }

    public function type($id)
    {

    }

    public function packageAll($page=1, $limit=10)
    {
       return LayuiSupport::replyForTable($page, $limit,(new WeifaPackage())->all());

    }

    public function package($page=1, $limit=10,$id)
    {
        return LayuiSupport::replyForTable($page, $limit,(new WeifaPackage())->getById($id));
    }
}