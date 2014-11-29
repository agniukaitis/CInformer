<?php

namespace Olive\CInformer;
/**
 * A testclass
 * 
 */
class CInformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test class
     *
     * @return void
     *
     */
    public function testClass()
    {
        $informer = new \Olive\cinformer\CInformer();

        // check if the $informer is an object
        $res = is_object($informer);
        $exp = true;
        $this->assertEquals($res, $exp, "The class was not initiated correctly");

        // check if the $informer is instance of CInformer class
        $res = $informer instanceof CInformer;
        $exp = true;
        $this->assertEquals($res, $exp, "Informer is of incorrect class");
    }

    /**
     * Test __construct
     *
     * @return void
     *
     */
    public function testConstruct()
    {
        $informer = new \Olive\cinformer\CInformer();
        
        // check if $valid array is correct length
        $res = count($informer->valid);
        $exp = 4;
        $this->assertEquals($res, $exp, "Valid array does not contain expected number of indexes");

        // check if $valid array contains correct values
        $res = $informer->valid;
        $exp = ['info', 'error', 'success', 'warning'];
        $this->assertEquals($res, $exp, "Valid array does not contain correct values");
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

        // check if the method is executed correctly
        $res = $informer->setMessage(['type' => 'default', 'message' => 'myMessage']);
        $exp = true;
        $this->assertEquals($res, $exp, "The message was not set properly");

        // check if the flash session variable is set
        $res = isset($_SESSION['flash']);
        $exp = true;
        $this->assertEquals($res, $exp, "The session variable was not set");

        // check if the flash session variable is an array
        $res = is_array($_SESSION['flash']);
        $exp = true;
        $this->assertEquals($res, $exp, "The session variable is an array");

        // check if the flash session variable contains correct type value
        $res = $_SESSION['flash']['type'];
        $exp = 'info';
        $this->assertEquals($res, $exp, "The session variable contains incorrect type");

        // check if the flash session variable contains correct message value
        $res = $_SESSION['flash']['message'];
        $exp = 'myMessage';
        $this->assertEquals($res, $exp, "The session variable contain incorrect message");
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

        // checks if the return arrau is correct length
        $res = count($informer->getMessage());
        $exp = 2;
        $this->assertEquals($res, $exp, "The flash variable is incorrect length");

        // check if the array was set correctly when retrieving from session variable
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

        // check if the method executed correctly
        $informer->setMessage(['type' => 'default', 'message' => 'myMessage']);
        $res = $informer->clear();
        $exp = true;
        $this->assertEquals($res, $exp, "The clear function did not return true");

        // check if the flash session variable was set to null
        $informer->setMessage(['type' => 'default', 'message' => 'myMessage']);
        $informer->clear();
        $res = is_array($_SESSION['flash']);
        $exp = true;
        $this->assertEquals($res, $exp, "The flash session is not an array");

        //check if the flash session variable is empty
        $informer->setMessage(['type' => 'default', 'message' => 'myMessage']);
        $informer->clear();
        $res = $_SESSION['flash'];
        $exp = null;
        $this->assertEquals($res, $exp, "The flash session was not properly resetted");
    }
}