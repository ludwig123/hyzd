<?php


namespace app\home\controller;


use app\home\domain\WeifaType;
use think\Controller;

class Weifa extends Controller
{
    public function itemAll()
    {
        return json((new WeifaType())->all());
    }

    public function typeAll()
    {

    }

    public function packageAll()
    {

    }
}