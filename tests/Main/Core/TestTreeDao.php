<?php

namespace Waiterphp\Builder\Tests\Builder\Main\Core;

use Waiterphp\Builder\Tests\TestCase as TestCase;

use Waiterphp\Builder\Main\Core\TreeDao as BuilderTreeDao;
use Waiterphp\Core\File\File as File;

class TestTreeDao extends TestCase
{

    public function SetUp()
    {
        parent::SetUp();
        $this->builder = new BuilderTreeDao('/tmp');
    }

    public function test_build()
    {
        $daoFile = '/tmp/Model/Article.php';
        is_file($daoFile) && unlink($daoFile);

        $this->builder->build([
            'table'=>'article',
        ]);
        $this->assertTrue(is_file($daoFile));
        $content = file_get_contents($daoFile);
        // $this->assertEquals($content, $this->articleContent());
        
    }

    private function articleContent()
    {
        return '';
    }
}