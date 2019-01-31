<?php

namespace Tests;


use PHPUnit\Framework\TestCase;

use Builder\Application;
use Builder\Input\Input;
use Builder\Output\Output;
$autoloader = include __DIR__.'/../../vendor/autoload.php';
Application::addCommandNamespace(array('Command\\'=>__DIR__.'/Command'),$autoloader);


class ApplicationTest extends TestCase
{
    
    /**
     * 测试方法是否能运行
     */
    public function testRun()
    {
        Application::getInstance()->run(new Input, new Output);
        $this->assertEquals('test', 'test');
    }
    
    
}
