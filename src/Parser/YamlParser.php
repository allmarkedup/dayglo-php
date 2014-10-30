<?php namespace Amu\Dayglo\Parser;

use Symfony\Component\Yaml\Yaml;

/**
*  YAML Parsing class
*/
class YamlParser extends AbstractParser implements ParserInterface
{
    protected static $supportedExtensions = ['yaml', 'yml'];

    public function parse($content)
    {
        return Yaml::parse($content);
    }
}