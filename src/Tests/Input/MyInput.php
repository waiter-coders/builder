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
        var_dump($this->input->get());
    }
    
    /**
     * php MyInput.php fd dfd  -cd dfd dfd --html=html
     */
    public function testGet()
    {
        var_dump($this->input->get(0));
        var_dump($this->input->get('c'));
        var_dump($this->input->get('d'));
        var_dump($this->input->get('html'));
    }
    
}

$myInput = new MyInput();
$myInput->testGetArguments();

