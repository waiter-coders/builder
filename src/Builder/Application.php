<?php

namespace Builder;

use Builder\Output\Output;
use Builder\Input\Input;
use Builder\Command\Command;
use Builder\Command\HelpCommand;

class Application
{
    private $namespaces;
    private static $autoloader;
    private $commands;
    private $input;
    private $output;


    public function __construct() 
    {
        $this->input = new Input();
        $this->output = new Output();
    }
    /**
     * @params array 
     * 设置命令命名空间
     */
    public static function addCommandNamespace(Array $namespaces = array())
    {
        self::$autoloader = $autoloader = include __DIR__ .'/../../vendor/autoload.php';
        if (is_array($namespaces)) {
            foreach ($namespaces as $namespace => $dir) {
                $autoloader->setPsr4($namespace, $dir);
            }
        }
    }
    
    public static function getNamespace()
    {
    }
    public function addCommand($command)
    {
        $this->commands[] = $command;
    }
    
    public function run()
    {
        
        $this->setDefaultCommand();
        
        foreach ($this->commands as $command) {
            return $command->execute($this->input, $this->output);
        }
    }
    
    public function setDefaultCommand($defaultCommand = ''){
        if(!count($this->commands)) {
            if (!$defaultCommand instanceof Command) {
                $defaultCommand = new HelpCommand();
            }
            $this->addCommand($defaultCommand);
        }
    }
}
