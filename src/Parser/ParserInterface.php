<?php namespace Amu\Dayglo\Parser;

/**
*  Parser interface
*/
interface ParserInterface
{
    public function parse($contents);

    public function encode(array $content);

    public function getSupportedExtensions();
}