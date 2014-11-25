<?php

namespace Sokil\DataType;

class PriorityListTest extends \PHPUnit_Framework_TestCase
{
    public function testToArrayDesc()
    {
        $list = new PriorityList();
        
        $this->assertEquals(['a' => 'a', 'b' => 'b'], ['b' => 'b', 'a' => 'a']);
        
        $list->set('k1', 'v1', 2);
        $list->set('k2', 'v2', 8);
        $list->set('k3', 'v3', 16);
        $list->set('k4', 'v4', 1);
        $list->set('k5', 'v5', 4);
        
        $expectedArray = array(
            'k3' => 'v3', 
            'k2' => 'v2',
            'k5' => 'v5',
            'k1' => 'v1',
            'k4' => 'v4',
        );
        
        foreach($list as $key => $value) {
            $this->assertEquals(key($expectedArray), $key);
            $this->assertEquals(current($expectedArray), $value);
            
            next($expectedArray);
        }
        
        if(key($expectedArray)) {
            $this->fail('Actual list less than expected');
        }
    }
    
    public function testToArrayAsc()
    {
        $list = new PriorityList();
        
        $list->setAscOrder();
        
        $list->set('k1', 'v1', 2);
        $list->set('k2', 'v2', 8);
        $list->set('k3', 'v3', 16);
        $list->set('k4', 'v4', 1);
        $list->set('k5', 'v5', 4);
        
        $expectedArray = array(
            'k4' => 'v4',
            'k1' => 'v1',
            'k5' => 'v5',
            'k2' => 'v2',
            'k3' => 'v3',
        );
        
        foreach($list as $key => $value) {
            $this->assertEquals(key($expectedArray), $key);
            $this->assertEquals(current($expectedArray), $value);
            
            next($expectedArray);
        }
        
        if(key($expectedArray)) {
            $this->fail('Actual list less than expected');
        }
    }
    
    public function testGet()
    {
        $list = new PriorityList();
        
        $list->set('k1', 'v1', 2);
        $list->set('k2', 'v2', 8);
        $list->set('k3', 'v3', 16);
        $list->set('k4', 'v4', 1);
        $list->set('k5', 'v5', 4);
        
        $this->assertEquals('v5', $list->get('k5'));
    }
    
    public function testGet_KeyNotExists()
    {
        $list = new PriorityList();
        
        $list->set('k1', 'v1', 2);
        $list->set('k2', 'v2', 8);
        $list->set('k3', 'v3', 16);
        $list->set('k4', 'v4', 1);
        $list->set('k5', 'v5', 4);
        
        $this->assertEquals(null, $list->get('KEY_NOT_EXISTS'));
    }
    
    public function testToArray()
    {
        $list = new PriorityList();
        
        $list->set('k1', 'v1', 2);
        $list->set('k2', 'v2', 8);
        $list->set('k3', 'v3', 16);
        $list->set('k4', 'v4', 1);
        $list->set('k5', 'v5', 4);
        
        $expectedArray = array(
            'k3' => 'v3', 
            'k2' => 'v2',
            'k5' => 'v5',
            'k1' => 'v1',
            'k4' => 'v4',
        );
        
        foreach($list->toArray() as $key => $value) {
            $this->assertEquals(key($expectedArray), $key);
            $this->assertEquals(current($expectedArray), $value);
            
            next($expectedArray);
        }
        
        if(key($expectedArray)) {
            $this->fail('Actual list less than expected');
        }
    }
}