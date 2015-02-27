<?php namespace Amu\Dayglo\Parser;

use Spyc;

/**
*  YAML Parsing class
*/
class YamlParser extends AbstractParser implements ParserInterface
{
    protected static $supportedExtensions = ['yaml', 'yml'];

    public function parse($content)
    {
        return Spyc::YAMLLoadString($content);
    }
}