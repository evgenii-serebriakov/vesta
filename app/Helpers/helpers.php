<?php

if (!function_exists('format_bytes')) {

    function format_bytes($bytes, $precision = 2) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        $bytes = max($bytes, 0); 
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
        $pow = min($pow, count($units) - 1); 
        $bytes /= pow(1024, $pow);
        
        return round($bytes, $precision) . ' ' . $units[$pow]; 
    }

}

if (!function_exists('trim_message')) {

    function trim_message($message) {
            
        $string = substr($message, 0, 200);
        $string = rtrim($string, "!,.-");
        $string = substr($string, 0, strrpos($string, ' '));
    
        return $string."… ";
    }

}
