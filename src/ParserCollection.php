<?php namespace Amu\Dayglo;

use Amu\Dayglo\Parser\ParserInterface;

/**
*  Parser collection
*/
class ParserCollection
{
    protected $parsers;

    function __construct(array $parsers = [])
    {
        $this->parsers = $parsers;
    }

    public function addParser(ParserInterface $parser)
    {
        $this->parsers[] = $parser;
    }
    
    public function getParserForMime($mime)
    {
        foreach($this->parsers as $parser)
        {
            $mimes = $parser->getSupportedMimes();
            if (in_array($mime, $mimes)) {
                return $parser;
            }
        }
        return null;
    }

}