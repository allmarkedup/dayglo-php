<?php namespace Amu\Dayglo\Parser;

use Toml\Parser as Toml;
use Amu\Dayglo\Exception\Exception\NotSupportedException;

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

    public function encode(array $content)
    {
        throw new NotSupportedException("Cannot write TOML data at this time");
    }
}