<?php namespace Clearleft\Dayglo\Parser;

/**
*  Abstract base parser class
*/
abstract class AbstractParser
{
    public static $supportedMimes = [];

    public function getSupportedMimes()
    {
        return static::$supportedMimes;
    }
}