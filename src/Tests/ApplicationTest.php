<?php

namespace Tests;


use PHPUnit\Framework\TestCase;

use Builder\Application;
use Builder\Input\Input;
use Builder\Output\Output;

Application::addCommandNamespace(array('Command\\'=>__DIR__.'/Command'));


class ApplicationTest extends TestCase
{
    
    /**
     * 测试方法是否能运行
     */
    public function testRun()
    {
        $app = new Application();
        $app->run(new Input, new Output);
        $this->assertEquals('test', 'test');
    }
    
    
}
