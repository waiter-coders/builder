<?php
namespace Tests\Input;

require __DIR__ . '/../../../vendor/autoload.php';

use Builder\Input\Input;

class MyInput
{
    public $input = null;
    
    public function __construct()
    {
        $this->input = new Input();
    }

    public function testGetArguments()
    {
        var_dump($this->input->getArguments());
    }
    
    public function testGetArgument()
    {
        var_dump($this->input->getArgument('c::'));
    }
    
}

$myInput = new MyInput();
$myInput->testGetArguments();
$myInput->testGetArgument();

