<?php

namespace Waiterphp\Builder\Tests\Builder\Main\Admin;

use Waiterphp\Builder\Tests\TestCase as TestCase;

use Waiterphp\Builder\Main\Admin\AdminTree as AdminTreeBuilder;
use Waiterphp\Core\File\File as File;

class TestAdminTree extends TestCase
{

    public function SetUp()
    {
        parent::SetUp();
        $this->builder = new AdminTreeBuilder('/tmp/admin');
    }

    public function test_build()
    {
        // $daoFile = '/tmp/Model/Exam/Choice.php';
        // is_file($daoFile) && unlink($daoFile);

        $this->builder->build([
            'table'=>'exam_choice',
            'path'=>'exam'
        ]);
        // $this->assertTrue(is_file($daoFile));
        // $content = file_get_contents($daoFile);
        // $this->assertEquals($content, $this->articleContent());
        
    }

    private function articleContent()
    {
        return '';
    }
}