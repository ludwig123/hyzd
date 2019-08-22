<?php


namespace app\home\model;


use think\Db;

class WeifaPackageModel
{
    public function all()
    {
        return db('weifa_package')->select();
    }

    public function getById($id)
    {
        return Db::view('weifa_package', 'name')
            ->view('weifa_package_detail','packageId','weifa_package.Id=weifa_package_detail.packageId')
            ->view('weifa_alias','daima,alias,night,jiaotongfangshi,weifajifengshu','weifa_alias.Id=weifa_package_detail.aliasId')
            ->select();
    }

    public function addPackage()
    {

    }

    public function removePackage()
    {

    }

    public function addPackageDetail()
    {

    }

    public function removePackageDetail()
    {

    }
}