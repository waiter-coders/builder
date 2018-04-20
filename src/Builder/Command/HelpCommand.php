<?php

namespace Builder\Command;

use Builder\Input\InputInterface;
use Builder\Output\OutputInterface;
use Builder\Application;

class HelpCommand extends Command
{
    
    public $name = 'help';
    
    public $description = '(-h,-help)显示帮助命令';
    
    private $containers;
    
    public function __construct()
    {
        parent::__construct();
        $this->containers = Application::$containers;
    }


    public function execute(InputInterface $input, OutputInterface $output)
    {
        foreach ($this->containers as $commandName => $commandReflection) {
            $reflection = new \ReflectionClass($commandReflection);
            $properties = $reflection->getDefaultProperties();
            $commandName = $output->color($properties['name'], \Builder\Output\Color::F_GREEN);
            $output->writeln($commandName . "\t" . $properties['description']);
        }
    }

}