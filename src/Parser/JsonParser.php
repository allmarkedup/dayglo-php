<?php namespace Amu\Dayglo\Parser;

/**
*  JSON Parsing class
*/
class JsonParser extends AbstractParser implements ParserInterface
{
    protected $toArray;

    protected static $supportedMimes = ['application/json'];

    public function __construct($toArray = true)
    {
        $this->toArray = $toArray;
    }

    public function parse($content)
    {
        return json_decode($content, $this->toArray);
    }
    
}