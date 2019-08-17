<?php
use app\weifa\common\NetSpider;
use PHPUnit\Framework\TestCase;

require_once 'application/weifa/common/NetSpider.php';

/**
 * NetSpider test case.
 */
class NetSpiderTest extends TestCase
{

    /**
     *
     * @var NetSpider
     */
    private $netSpider;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp():void
    {
        parent::setUp();
        
        // TODO Auto-generated NetSpiderTest::setUp()
        
        $this->netSpider = new NetSpider(/* parameters */);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown():void
    {
        // TODO Auto-generated NetSpiderTest::tearDown()
        $this->netSpider = null;
        
        parent::tearDown();
    }
    
    public function testGetFeixianchangResponse(){
        $startTime = '2019-07-19';
        $endTime = '2019-07-21';
        $response = $this->netSpider->getXianchang($startTime, $endTime);
        $this->assertNotNull($response);
        
    }
    
    public function testRawGetMethodResponseStringToArray(){
        $startTime = '2019-07-19';
        $endTime = '2019-07-21';
        $response = $this->netSpider->getXianchang($startTime, $endTime);
        $records = $this->netSpider->responseToArr($response);
        $this->assertGreaterThan(10, count($records));
    
    }
    
    
    
    
    
    


   
}

