<?php


namespace app\home\domain;


use app\home\model\WeifaTypeModel;

class WeifaType
{
    /**
     * 查询所以的违法类别
     */
    public function all()
    {
        $model = new WeifaTypeModel();
        $result = $model->all();
        return $result;
    }

    public function getByAlias($alias)
    {
        $model = new WeifaTypeModel();
        $result = $model->getByAlias($alias);
        return $result;
    }

    public function getAllType()
    {
        return ((new WeifaTypeModel())->allType());
    }

}