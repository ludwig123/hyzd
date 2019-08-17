<?php
namespace app\weifa\common;

class NetSpider{
    //启动蜘蛛
    public function run($startTime = null, $endTime = null){
        
    }
    
    //抓取指定时间段
    public function getData($startTime, $endTime){
        
    }
    
    //获取非现场
    public function getFeixianchang($startTime, $endTime){
        
    }
    
    //获取现场
    public function getXianchang($startTime, $endTime){
        $worker = new NetWorker();
        $header =$this->getHeader($this->getCookie());
        $url = $this->getUrlForFeixianchang($startTime, $endTime);
        $response = $worker->sentGet($header, $url);
        
        return $response;
    }
    
    
    //存入非现场
    public function saveFeixianchang($startTime, $endTime){
        
    }
    
    
    //存入现场
    public function saveXianchang($startTime, $endTime){
        
    }
    
    public function getUrlForXianchang(){
        return "";
    }
    
    /**
     * 2019-07-20
     */
    public function getUrlForFeixianchang($startTime, $endTime){
        return 'http://65.29.99.22/sjtj/fpact.do?method=10001&cdbh=40210&cssl=3&dbid=156&fields=WFBH,JDSLB,JSZH,HPZL,HPHM,JDCSYR,SYXZ,JTFS,WFSJ,WFDD,WFDZ,WFXW,WFJFS,FKJE,ZQMJ,FXJG,XXLY,JSJG,&lgh_1=(&lgh_2=(&zdm_1=WFSJ&zdm_2=WFSJ&ysf_1=utf8%25EF%25BC%259E&ysf_2=utf8%25EF%25BC%259C&csq_1=utf8'.$startTime.'&csq_2=utf8'.$endTime.'&rgh_1=)%20and%20&rgh_2=)&yhbh=10030&czlx=4';
    }
    
    private function getHeader($cookie){
        return array(
            'Accept:application/json, text/javascript, */*; q=0.01',
            'Accept-Encoding:gzip, deflate',
            'Accept-Language:zh-CN,zh;q=0.9',
            'Connection:keep-alive',
            'Content-Type:application/x-www-form-urlencoded',
            'Cookie:'.$cookie ,
            'Host:65.29.99.22',
            'Upgrade-Insecure-Requests: 1',
            'User-Agent:Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36',
            'X-Requested-With:XMLHttpRequest'
        );
    }
    
    public function responseToArr($getResponse){
        $pattern = '/get_rowdata.+JSJG=(.+?), JDSLB=(.+?), JDCSYR=(.+?), SYXZ=(.+?), HPZL=(.+?), WFDD=(.+?), FXJG=(.+?), JTFS=(.+?), ZQMJ=(.+?), FKJE=(.+?), WFSJ=(.+?), WFDZ=(.+?), WFBH=(.+?), JSZH=(.+?), WFXW=(.+?), HPHM=(.+?), XXLY=(.+?), WFJFS=(.+?), NUM=/';
        var_dump($getResponse);
        $matchs = array();
        $records = preg_match_all($pattern, $getResponse, $matchs, PREG_SET_ORDER);
        var_dump($matchs);
        if ($records != 0){
            return $matchs;
        }
    }
    
    public function getCookie(){
        return 'liger-home-tab=%5B%7B%22tabid%22%3A1563700542911%2C%22text%22%3A%22%E8%87%AA%E5%AE%9A%E4%B9%89%E6%9F%A5%E8%AF%A2%22%2C%22url%22%3A%22fpact.do%3Fmethod%3D10001%26cdbh%3D40210%26yhbh%3D10030%22%7D%5D; JSESSIONID=C3075D037048A13C363108C26D4972CB';
    }
}