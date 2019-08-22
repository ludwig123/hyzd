<?php


namespace app\home\domain;


use app\home\model\WeifaPackageModel;

class WeifaPackage
{
    public function all()
    {
        return ((new WeifaPackageModel())->all());
    }

    public function getById($id)
    {
        return ((new WeifaPackageModel())->getById($id));
    }

}