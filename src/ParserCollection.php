<?php namespace Amu\Dayglo;

use Amu\Dayglo\Data\DataInterface;
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

    public function getParser(DataInterface $data)
    {
        return $this->getParserForExtension($data->getExtension());
    }

    public function getParserForExtension($extension)
    {
        foreach($this->parsers as $parser) {
            $extensions = $parser->getSupportedExtensions();
            if (in_array($extension, $extensions)) {
                return $parser;
            }
        }
        return null;
    }

}