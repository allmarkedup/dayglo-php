<?php namespace Amu\Dayglo\Parser;

use Toml\Parser as Toml;

/**
*  TOML Parsing class
*/
class TomlParser extends AbstractParser implements ParserInterface
{
    protected static $supportedExtensions = ['toml'];

    public function parse($content)
    {
        return Toml::fromString($content);
    }
}