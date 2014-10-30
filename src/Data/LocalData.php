<?php namespace Amu\Dayglo\Data;

use Amu\Dayglo\Data\DataInterface;
use Amu\Dayglo\Parser\ParserInterface;

/**
*  Data file object class
*/
class LocalData implements DataInterface
{
    protected $path;

    protected $parser;

    protected $raw = null;

    protected $data = null;

    function __construct($path, ParserInterface $parser = null)
    {
        $this->path = $path;
        $this->parser = $parser;
    }

    public function setParser(ParserInterface $parser = null)
    {
        $this->parser = $parser;
    }

    public function getData()
    {
        if ( is_null($this->data) ) {
            if ( ! $this->parser ) {
                throw new \LogicException('A parser must be set before the file contents can be parsed');
            }
            $this->data = $this->parser->parse($this->getRaw());
        }
        return $this->data;
    }

    public function getRaw()
    {
        if ( is_null($this->raw) ) {
            $this->raw = file_get_contents($this->path);
        }
        return $this->raw;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getExtension()
    {
        return pathinfo($this->path, PATHINFO_EXTENSION);
    }

}