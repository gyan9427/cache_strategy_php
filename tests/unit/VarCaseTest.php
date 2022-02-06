<?php

use PHPUnit\Framework\TestCase;
use App\Utilities\VarCache;

class VarCaseTest extends TestCase{

    protected function setUp():void{
        @unlink('cache/foo.php');
    }

    public function testUnsetValueIsInvalid(){
        $cache = new VarCache('foo');
        $this->assertFalse($cache->isValid());
    }

    public function testValidTrureAfterSet(){
        $cache = new VarCache('foo');
        $cache->set('bar');
        $this->assertTrue($cache->isValid());
    }

    public function testCacheRetainsValue(){
        $test_val = "test".rand(1,100);
        $cache = new VarCache('foo');
        $cache->set($test_val);
        $this->assertEquals($test_val,$cache->get());
    }

    public function testStringFailsForArray(){
        $test_val = array('one','two');
        $cache = new VarCache('foo');
        $cache->set($test_val);
        $this->assertError('Array to string conversion');
        $this->assertNotEqual($test_val,$cache->get());
        $this->assertEquals('array',strtolower($cache->get()));
    }
}