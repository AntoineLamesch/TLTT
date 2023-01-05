<?php

class Log{

    private $fp;

    function __construct($path){

        $this->fp= fopen($path, 'a');
    }

    function __destruct(){

        fclose($this->fp);
    }

    function writeLog($string){

        fwrite($this->fp, $string);
    }

    public static function directlyWriteLog($path, $string, $level, $code){

        $fp = fopen($path, "a");
        $string = date('d/m/Y H:i:s' )."    ".$code."    ".$level."    ".$string."\n";
        fwrite($fp, $string);
        fclose($fp);
    }

}


?>