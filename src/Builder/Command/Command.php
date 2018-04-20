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

    protected function getApplication()
    {
        return $this->application;
    }
    
    protected function setApplication($application)
    {
        $this->application = $application;
    }
    
    protected function call($commandName, $params = array())
    {
        $this->application->call($commandName, $params);
    }
}