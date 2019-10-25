<?php

/**
 * Ouch error handler for PHP.
 *
 * @author      Lotfio Lakehal <lotfiolakehal@gmail.com>
 * @copyright   2018 Lotfio Lakehal
 * @license     MIT
 *
 * @link        https://github.com/lotfio/ouch
 */
if (!function_exists('ouch_root')) {

    /**
     * root() directory function.
     *
     * @return string root dir path
     */
    function ouch_root()
    {
        return dirname(__DIR__).DIRECTORY_SEPARATOR;
    }
}

if (!function_exists('ouch_assets')) {
    /**
     * assets() function path.
     *
     * @param null $file
     *
     * @return string
     */
    function ouch_assets($file = null)
    {
        return ouch_root().'resources'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.$file;
    }
}

if (!function_exists('ouch_views')) {
    /**
     * views() function path.
     *
     * @param null $file
     *
     * @return string
     */
    function ouch_views($file = null)
    {
        return ouch_root().'resources'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$file;
    }
}

if (!function_exists('str_last')) {
    /**
     * get last word from a string.
     *
     * @param string $str string
     * @param string $del delimiter
     *
     * @return void
     */
    function str_last($str, $del = '\\')
    {
        $str = explode($del, $str);

        return $str[count($str) - 1];
    }
}

if (!function_exists('unpackError')) {
    /**
     * recursively unpack exception.
     *
     * @param array $array
     *
     * @return string
     */
    function unpackError($array)
    {
        $arr = array();

        foreach($array as  $key => $value)
        {
        if(isset($value['args']))
                unset($value['args']); 
                $arr[] = $value;
        }

        foreach($arr as $ar)
        {
            echo '<li>';
            foreach($ar as $key => $value)
            {
                echo '<b>' . ucfirst($key) . '</b> : '.  ucfirst($value) . "<br>";
            }
            echo '</li>';
        }
    }
}

if (!function_exists('readErrorFile')) {
    /**
     * read error file function.
     *
     * @param string $file error file
     * @param int    $line error line
     *
     * @return string
     * 
     */
    function readErrorFile($fileName, $errorLine, $escape = TRUE)
    {
        $output      = "";
        $file        = file($fileName);
        $file        = array_combine(range(1, count($file)), $file); // change index to 1

        $numberOfLines  = count($file);

        $start = $errorLine >= 6 ? $errorLine - 4 : 1;
        $end   = ($errorLine + 4) <= $numberOfLines ? $errorLine + 4 : $numberOfLines;
        
        for ($i=$start; $i <= $end; $i++) { 
            $output .= ($escape) ? htmlentities($file[$i], ENT_QUOTES, 'UTF-8') : $file[$i] ; 
        }
        return $output;
    }
}

if (!function_exists('readErroLine')) {
    /**
     * read error line function.
     *
     * @param string $file error file
     * @param int    $line error line
     *
     * @return string
     * 
     */
    function readErroLine($fileName, $errorLine)
    {
        $file        = file($fileName);
        $file        = array_combine(range(1, count($file)), $file); // change index to 1
        return trim($file[$errorLine]);
    }
}