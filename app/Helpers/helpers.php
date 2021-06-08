<?php

if (! function_exists('format_bytes')) {
    /**
     * Converts numbers to bytes
     *
     * @param  int  $bytes
     * @param  int  $precision
     * @return string
     */
    function format_bytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        $bytes = max($bytes, 0); 
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
        $pow = min($pow, count($units) - 1); 
        $bytes /= pow(1024, $pow);
        
        return round($bytes, $precision) . ' ' . $units[$pow]; 
    }
}

if (! function_exists('truncates_text')) {
    /**
     * Truncates text and displays an ellipsis at the end.
     *
     * @param  string  $message
     * @param  string  $start
     * @param  string  $end
     * @return string
     */
    function truncates_text($message, $start, $end)
    {
            
        $string = substr($message, $start, $end);
        $string = rtrim($string, "!,.-");
        $string = substr($string, 0, strrpos($string, ' '));
    
        return $string."… ";
    }
}
