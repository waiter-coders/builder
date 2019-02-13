<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use Builder\Input\Input;

class InputTest extends TestCase
{
    public $input = null;
    
    public function setUp()
    {        
        $this->input = new Input(array(
            'InputTest',
            'make:controller',
            'Home',
            '-r',
            '-t',
            'admin',
            '--name=HomePage',
            '--model',
            '-o',
            'name',
            'sex',
        ));
    }
    
    public function testGetForArgument()
    {
        $this->assertEquals('make:controller', $this->input->get(0));
    }
    
    public function testGetForLongOptionHasValue()
    {
        $this->assertEquals('HomePage', $this->input->get('name'));
    }
    
    public function testGetForLongOptionNoValue()
    {
        $this->assertTrue($this->input->get('model'));
    }
    
    public function testGetForLongOptionNoExist()
    {
        $this->assertFalse($this->input->get('html'));
    }
    
    public function testGetForShortOptionNoValue()
    {
        $this->assertTrue($this->input->get('r'));
    }
    
    public function testGetForShortOptionHasValue()
    {
        $this->assertEquals('admin', $this->input->get('t'));
    }
    
    public function testGetForShortOptionHasMoreValue()
    {
        $this->assertEquals(array('name','sex'), $this->input->get('o'));
    }
    
    public function testGetForShortOptionNotExist()
    {
        $this->assertFalse($this->input->get('s'));
    }
    
    public function testHasParameterOptionNoExist()
    {
        $this->assertFalse($this->input->hasParameterOption('s'));
    }
    
    public function testHasParameterOption()
    {
        $this->assertTrue($this->input->hasParameterOption('r'));
    }
    
    public function testHasParameterOptionArray()
    {
        $this->assertTrue($this->input->hasParameterOption(array('r')));
    }
    
    public function testHasParameterOptionNoArray()
    {
        $this->assertFalse($this->input->hasParameterOption(array('h','help')));
    }
    
}