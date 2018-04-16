<?php

/* 
 * 输入类
 */

namespace Builder\Output;

use Builder\Output\OutputInterface;

class Output implements OutputInterface
{
  
    public function write($messages, $newline = false) {
        if(is_string($messages)){
            $this->output($messages, $newline);
        } elseif (is_array($messages)) {
            foreach ($messages as $message) {
                $this->output($message, $newline);
            }
        }
        
    }

    public function writeln($messages) {
        $this->write($messages, true);
    }

    private function output($string, $newline = false)
    {
        $ln = $newline ? PHP_EOL : '';
        echo $string . $ln;
    }
}
