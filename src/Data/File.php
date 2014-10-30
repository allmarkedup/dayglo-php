<?php namespace Clearleft\Dayglo\Data;

use Clearleft\Dayglo\Data\DataInterface;
use Clearleft\Dayglo\Parser\ParserInterface;

/**
*  Data file object class
*/
class File implements DataInterface
{
    protected $path;

    protected $parser;

    protected $rawContents = null;

    protected $parsedContents = null;

    function __construct($path, ParserInterface $parser = null)
    {
        $this->path = $path;
        $this->parser = $parser;
    }

    public function getContents()
    {
        
    }

    public function getRawContents()
    {
        
    }


}