<?php

namespace Builder\Command;

use Builder\Input\InputInterface;
use Builder\Output\OutputInterface;

class HelpCommand extends Command
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function configure()
    {
        $this->setName('help')
             ->setDescription('显示命令的帮助');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
       echo $this->getDescription();
    }
  
    public function getAllCommands()
    {
        
    }
}