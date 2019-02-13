<?php

/* 
 * 输入类接口
 */

namespace Builder\Output;

interface OutputInterface
{
    /**
     * 将消息答应到控制台
     *
     * @param string|iterable $messages 字符串|字符串数组
     * @param bool            $newline  输出后是否要加空行
     */
    public function write($messages, $newline = false);
    
    /**
     * 将消息答应到控制台并增加空行
     * @param string|iterable $messages 字符串|字符串数组
     */
    public function writeln($messages);
    
    /**
     * 设置字体颜色
     * @param type $messages
     * @param type $fcolor
     * @param type $bcolor
     */
    public function color($messages, $fcolor='', $bcolor='');
}
