<?php

/* 
 * 颜色类
 */

namespace Builder\Output;

class Color
{
    const COLOR_PRE = "\033[";
    const COLOR_END = "\033[0m";
    
    const F_BLUE = '0;34m';
    const F_BLACK = '0;30m';
    const F_GREEN = '0;32m';
    const F_RED = '0;34m';
    
    const B_RED = '41m';
    const B_YELLOW = '43m';
    const B_BLUE = '44m';
    
    public static function wapperColor($content, $fcolor = '', $bcolor = '')
    {
        return self::COLOR_PRE . $fcolor . $bcolor . $content . self::COLOR_END;
    }
}
