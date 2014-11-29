<?php

namespace Olive\CInformer;
/**
 * A testclass
 * 
 */
class CInformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test
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
