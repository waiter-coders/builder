<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use Builder\Application;

class ApplicationTest extends TestCase
{
    
    /**
     * 测试方法是否能运行
     */
    public function testRun()
    {
        $app = new Application();
        $this->assertTrue($app->run());
    }
    
}
