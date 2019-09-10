<?php


namespace app\admin\domian;


class Alias
{
    private $daimas, $night, $shiyongxingzhi, $jiaotongfangshi, $weifajifenshu;

    function __construct($data)
    {
        $this->daimas = $data['daima'];
        $this->night = $data['night'];
        $this->shiyongxingzhi = $data['shiyongxingzhi'];
        $this->jiaotongfangshi = $data['jiaotongfangshi'];
        $this->weifajifenshu = $data['weifajifenshu'];
    }

    /**
     * @return mixed
     */
    public function getShiyongxingzhi()
    {
        return $this->shiyongxingzhi;
    }

    /**
     * @param mixed $shiyongxingzhi
     */
    public function setShiyongxingzhi($shiyongxingzhi): void
    {
        $this->shiyongxingzhi = $shiyongxingzhi;
    }

    /**
     * @return mixed
     */
    public function getNight()
    {
        return $this->night == 0? false : true;
    }




}