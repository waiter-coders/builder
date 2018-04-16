<?php

namespace Tests;


use PHPUnit\Framework\TestCase;

use Builder\Application;

Application::addCommandNamespace(array('Command\\'=>__DIR__.'/Command'));

use Command\TestCommand;

class ApplicationTest extends TestCase
{
    
    /**
     * 测试方法是否能运行
     */
    public function testRun()
    {
        $app = new Application();
        $app->run();
        $this->assertEquals('test', 'test');
    }
    
    
}
