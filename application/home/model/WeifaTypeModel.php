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

}