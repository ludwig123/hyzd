<?php


namespace app\admin\domian;


class Alias
{
    private $daimas, $night, $shiyongxingzhi, $jiaotongfangshi, $weifajifengshu;


    public function getDaimas()
    {
        return $this->daimas;
    }

    public function getJiaotongfangshi()
    {
        return $this->jiaotongfangshi== '0'? false :$this->jiaotongfangshi;
    }


    public function getWeifajifengshu()
    {
        return $this->weifajifengshu;
    }

    function __construct($data)
    {
        $this->daimas = $data['daima'];
        $this->night = $data['night'];
        $this->shiyongxingzhi = $data['shiyongxingzhi'];
        $this->jiaotongfangshi = $data['jiaotongfangshi'];
        $this->weifajifengshu = $data['weifajifengshu'];
    }

    public function getShiyongxingzhi()
    {
        return $this->shiyongxingzhi== '0'? false : $this->shiyongxingzhi;
    }

    public function getNight()
    {
        return $this->night == 0? false : true;
    }




}