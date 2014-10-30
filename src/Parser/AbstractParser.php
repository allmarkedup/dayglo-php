<?php namespace Amu\Dayglo\Parser;

/**
*  Abstract base parser class
*/
abstract class AbstractParser
{
    protected static $supportedMimes = [];

    public function getSupportedMimes()
    {
        return static::$supportedMimes;
    }
}