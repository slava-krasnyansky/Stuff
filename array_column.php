<?php
// array_column for PHP < 5.5.0
if (!function_exists('array_column')) {
    function array_column(array $input, $column_key, $index_key = null)
    {
        if (!is_int($column_key) && !is_string($column_key)) {
            trigger_error('array_column(): The column key should be either a string or an integer', E_USER_WARNING);
            return false;
        }
        
        if (!is_null($index_key) && !is_int($index_key) && !is_string($index_key)) {
            trigger_error('array_column(): The index key should be either a string or an integer', E_USER_WARNING);
            return false;
        }
        
        $result = array();
        
        foreach ($input as $arr) {
            if (is_array($arr) && array_key_exists($column_key, $arr)) {                
                if (!is_null($index_key) && array_key_exists($index_key, $arr)) {
                    $result[$arr[$index_key]] = $arr[$column_key];
                } else {
                    $result[] = $arr[$column_key];
                }
            }
        }
        
        return $result;
    }
}