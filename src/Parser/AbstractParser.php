<?php namespace Amu\Dayglo\Parser;

/**
*  Abstract base parser class
*/
abstract class AbstractParser
{
    protected static $supportedExtensions = [];

    public function getSupportedExtensions()
    {
        return array_map(function($ext){
            return strtolower($ext);
        }, static::$supportedExtensions);
    }
}