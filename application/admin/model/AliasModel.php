<?php


namespace app\admin\model;


use think\Model;

class AliasModel extends Model
{
    public function getAliasByName($name)
    {
        return db('weifa_alias')->where('alias', '=', $name)->select();
    }

    public function removeById($id)
    {

    }

    public function add($Aalias)
    {

    }

}