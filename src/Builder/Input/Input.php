<?php

/* 
 * 输入类
 */

namespace Builder\Input;

use Builder\Input\InputInterface;
use Builder\Input\Parse;

class Input implements InputInterface
{
    /**
     * 原生命令行参数
     * @var Array
     */
    private $argvs = array();
    
    /**
     * 解析后的命令行参数
     * @var Array
     */
    private $parseArgvs = array();
    
    public function __construct()
    {
        $argv = \filter_input(\INPUT_SERVER, 'argv');
        //去掉程序名
        array_shift($argv);
        $this->argvs = $argv;
        
        //解析命令行选项
        $this->parseArgv();
        $this->parseOption();
    }
    
    /**
     * 解析参数
     */
    private function parseArgv()
    {
        foreach ($this->argvs as $key => $value) {
            if ('--' == $value ||  '-' == $value) {
                break;
            } 
            $pArgv = Parse::argument($key, $value);
            $this->setArgument($pArgv['key'], $pArgv['value']);
        }
    }
    
    /**
     * 解析长短选项
     */
    private function parseOption()
    {
        $optionArgv = array();
        $reverseArgvs = array_reverse($this->argvs, true);
        foreach ($reverseArgvs as $value) {
            if ('--' == substr($value, 0, 2)) {
                $pArgv = Parse::longOption($value);
                $this->setArgument($pArgv['key'], $pArgv['value']);
            } elseif ('-' == substr($value, 0, 1)) {
                $pArgv = Parse::option($value, $optionArgv);
                $this->setArgument($pArgv['key'], $pArgv['value']);
                $optionArgv = array();
            } else {
                $optionArgv[] = $value;
            }
        }
    }
    
    
    
    public function getFirstArgument()
    {
        foreach ($this->argvs as $token) {
            if('-' === $token[0]) {
                continue;
            }
            
            return $token;
        }
    }
    
    public function getArguments()
    {
        return $this->argvs;
    }
    
    public function getArgument($name)
    {
        return $this->parseArgvs[$name];
    }
    
    private function setArguments(Array $argv)
    {
        $this->parseArgvs = array_merge($argv, $this->parseArgvs);
    }
    
    private function setArgument(String $name, $value)
    {
        $this->parseArgvs[$name] = $value;
    }

    public function hasParameterOption($values, $onlyParams = false) {
        
        if (is_string($values)) {
            $hasOption = isset($this->parseArgvs[$values]) ? $this->parseArgvs[$values] : false;
            if (!$onlyParams && $hasOption) {
                return true;
            }
            if ($onlyParams && $hasOption != true) {
                return true;
            }
            return false;
        } elseif (is_array($values)) {
            foreach ($values as  $value) {
                if ( $this->hasParameterOption($value, $onlyParams) ){
                    return true;
                }
            }
        }
        
        return false;
    }

}
