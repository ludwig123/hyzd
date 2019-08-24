<?php


namespace app\home\domain;


use app\home\model\WeifaPackageModel;
use traits\controller\Jump;

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

    public function remove($id)
    {
        $count = (new WeifaPackageModel())->remove($id);
        if ($count == 1)
        {
            return true;
        }
        return false;
    }

    public function add($package)
    {

    }

    public function refresh($package)
    {

    }

}