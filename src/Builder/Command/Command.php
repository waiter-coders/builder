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
    
    public function __construct()
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
       throw new Exception('You must override the execute() method in the concrete command class.');
    }

}