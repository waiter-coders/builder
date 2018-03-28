<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use Builder\Input\Input;

class InputTest extends TestCase
{
    public $input = null;
    
    public function setUp()
    {        
        $this->input = new Input();
    }
    
    public function testGetArguments()
    {
        var_dump($this->input->getArguments());
    }
    
    public function testGetFirstArgument()
    {
        var_dump($this->input->getArguments());
    }
    
    public function testGetArgument()
    {
        var_dump($this->input->getArgument('d'));
    }
}