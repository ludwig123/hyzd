<?php
use PHPUnit\Framework\TestCase;
use app\weifa\common\NetWorker;


/**
 * NetWorker test case.
 */
class NetWorkerTest extends TestCase
{

    /**
     *
     * @var NetWorker
     */
    private $netWorker;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp() :void
    {
        parent::setUp();
        
        // TODO Auto-generated NetWorkerTest::setUp()
        
        $this->netWorker = new NetWorker();
    }


    /**
     * Tests NetWorker->sentGet()
     */
    public function testSentGet()
    {
        $url = 'http://65.29.99.22/sjtj/fpact.do?method=10001&cdbh=40210&cssl=3&dbid=156&fields=HPHM,JDCSYR,SYXZ,WFSJ,WFDD,WFDZ,WFXW,FXJG,XXLY,&lgh_1=(&lgh_2=(&zdm_1=FXJG&zdm_2=WFSJ&ysf_1=utf8like&ysf_2=utf8%25EF%25BC%259E&csq_1=utf843540%2525&csq_2=utf82019-05-25&rgh_1=)%20and%20&rgh_2=)&yhbh=10030&czlx=4';
        $cookie = 'JSESSIONID=7EAC521E71BC95FB76F5E2E2EBB5A507; liger-home-tab=%5B%7B%22tabid%22%3A1562145542777%2C%22text%22%3A%22%E8%87%AA%E5%AE%9A%E4%B9%89%E6%9F%A5%E8%AF%A2%22%2C%22url%22%3A%22fpact.do%3Fmethod%3D10001%26cdbh%3D40210%26yhbh%3D10030%22%7D%5D';
            $header =  array(
                'Accept:application/json, text/javascript, */*; q=0.01',
                'Accept-Encoding:gzip, deflate',
                'Accept-Language:zh-CN,zh;q=0.9',
                'Connection:keep-alive',
                'Content-Type:application/x-www-form-urlencoded',
                'Cookie:JSESSIONID=' ,
                'Host:65.29.99.22',
                'Upgrade-Insecure-Requests: 1',
                'User-Agent:Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36',
                'X-Requested-With:XMLHttpRequest'
            );
            
            
           $result = $this->netWorker->sentGet($header, $url);
           
           $this->assertNotEmpty($result, 'nothing response with get method!');
    }




}

