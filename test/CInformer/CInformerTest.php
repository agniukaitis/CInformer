<?php

namespace Olive\CInformer;
/**
 * A testclass
 * 
 */
class CInformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test __construct
     *
     * @return void
     *
     */
    public function testConstruct()
    {
        $informer = new \Olive\cinformer\CInformer();
        
        $res = count($informer->valid);
        $exp = 4;
        $this->assertEquals($res, $exp, "Valid array does not contain expected number of indexes");
    }

    /**
     * Test setMessage
     *
     * @return void
     *
     */
    public function testSetMessage()
    {
        $informer = new \Olive\cinformer\CInformer();

        $res = $informer->setMessage(['type' => 'default', 'message' => 'myMessage']);

        $exp = true;
        $this->assertEquals($res, $exp, "The message was not set properly");
    }

    /**
     * Test getMessage
     *
     * @return void
     *
     */
    public function testGetMessage()
    {
        $informer = new \Olive\cinformer\CInformer();

        $informer->setMessage(['type' => 'default', 'message' => 'myMessage']);

        $res = $informer->getMessage();
        $exp = array('type' => 'info', 'message' => 'myMessage');
        $this->assertEquals($res, $exp, "The message was not retrieved properly");
    }

    /**
     * Test Clear
     *
     * @return void
     *
     */
    public function testClear()
    {
        $informer = new \Olive\cinformer\CInformer();
        $res = $informer->clear();
        $exp = true;
        $this->assertEquals($res, $exp, "The clear function did not return true");
    }
}