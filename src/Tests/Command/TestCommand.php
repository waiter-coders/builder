<?php

namespace Command;

use Builder\Command\Command;
use Builder\Input\InputInterface;
use Builder\Output\OutputInterface;

class TestCommand extends Command
{
    public function configure()
    {
        $this->setName('test')
             ->setDescription('测试命令行');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
       echo($this->getDescription());
    }
}
