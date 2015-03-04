<?php namespace Amu\Dayglo\Parser;

use Spyc;

/**
*  YAML Parsing class
*/
class YamlParser extends AbstractParser implements ParserInterface
{
    protected static $supportedExtensions = ['yaml', 'yml'];

    protected $indent = 2;

    protected $wrap = 200;

    public function __construct($config = [])
    {
        if ( isset($config['indent']) ) {
            $this->indent = $config['indent'];
        }
        if ( isset($config['wrap']) ) {
            $this->wrap = $config['wrap'];
        }
    }

    public function parse($content)
    {
        return Spyc::YAMLLoadString($content);
    }

    public function encode(array $content)
    {
        return Spyc::YAMLDump($content, $this->indent, $this->wrap);
    }
}