<?php namespace Amu\Dayglo\Parser;

/**
*  Parser interface
*/
interface ParserInterface
{
    public function parse($contents);

    public function getSupportedExtensions();
}