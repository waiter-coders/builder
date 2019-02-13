<?php

namespace Builder\Command;

use Builder\Input\InputInterface;
use Builder\Output\OutputInterface;

class Command
{
    protected $name;
    protected $processTitle;
    protected $hidden = false;
    protected $help;
    protected $description;
    protected $helperSet;
    protected $application;


    public function __construct()
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
       throw new Exception('You must override the execute() method in the concrete command class.');
    }
    
    public function call($commandName, $params = array())
    {
        \Builder\Application::getInstance()->call($commandName, $params);
    }
}