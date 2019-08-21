<?php


namespace app\home\model;


class ManModel
{
    public function manList(){
       $men =  db('man')->select();
       return $this->sortManByJinghao($men);
    }

    private function sortManByJinghao($man){
        $list = array();
        foreach ($man as $k=>$v)
        {
            $list[$v['jinghao']] = $v['name'];
        }

        return $list;
    }

}