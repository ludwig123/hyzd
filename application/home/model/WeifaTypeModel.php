<?php


namespace app\home\model;


class WeifaTypeModel
{
    public function all()
    {
       return db('weifa_alias')->select();
    }

    public function getByAlias($alias)
    {
        return db('weifa_alias')->where('alias','=',$alias)->select();
    }

    public function allType()
    {
        return db('weifa_alias')->field('alias, count(Id)')->group('alias')->select();
    }

    public function removeItem()
    {

    }

}