<?php

namespace Builder\Command;

use Builder\Input\InputInterface;
use Builder\Output\OutputInterface;

class Command
{
    private $name;
    private $processTitle;
    private $hidden = false;
    private $help;
    private $description;
    private $helperSet;
    
    public function __construct()
    {
        $this->configure();
    }

    protected function configure()
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
       throw new Exception('You must override the execute() method in the concrete command class.');
    }
    
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    public function getName()
    {
        return $this->name;
    }
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
        return $this;
    }
    public function getHidden()
    {
        return $this->hidden;
    }
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setProcessTitle($processTitle)
    {
        $this->processTitle = $processTitle;
        return $this;
    }
    public function getProcessTitle()
    {
        return $this->processTitle;
    }
}