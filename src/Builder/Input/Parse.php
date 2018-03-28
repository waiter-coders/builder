<?php

/* 
 * 参数解析
 */

namespace Builder\Input;

class Parse
{
    /**
     * 解析短选项
     * @param String $shortStr
     * @param Array $argvs
     * @return Array
     */
    public static function option($shortStr, $argvs) 
    {
        $key = substr($shortStr, 1);
        $optionNum = strlen($key);
        $shortArr = array();
        for ($i = $optionNum-1; $i >= 0; $i--) {
            if ($optionNum-1 == $i) {
                $value = count($argvs) == 1 ? $argvs[0] : $argvs;
                $shortArr[$key[$i]] = empty($value) ? true : $value;
            }
            $shortArr[$shortStr[$i]] = true;
        }
        
        return $shortArr;
    }
    
    /**
     * 解析长选项
     * @param String $longStr
     * @return Array
     */
    public static function longOption($longStr) 
    {
        $longArr        = explode('=', substr($longStr, 2));
        $value = isset($longArr[1]) ? $longArr[1] : true;
        return array('key' => $longArr[0], 'value' => $value);
    }
    
    /**
     * 解析参数
     * @param String $key
     * @param String $value
     * @return Array
     */
    public static function argument($key, $value) 
    {
        return array('key' => $key, 'value' => $value);
    }
}
