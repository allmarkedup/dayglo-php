<?php namespace Amu\Dayglo\Data;

use Amu\Dayglo\Data\DataInterface;
use Amu\Dayglo\Parser\ParserInterface;

abstract class AbstractData implements DataInterface, \IteratorAggregate, \ArrayAccess, \JsonSerializable
{
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

    abstract public function getRaw();

    public function getIterator()
    {
        return new \ArrayIterator($this->getData());
    }

    public function offsetSet($offset, $value)
    {
        $data = $this->getData();
        if (is_null($offset)) {
            $data[] = $value;
        } else {
            $data[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        $data = $this->getData();
        return isset($data[$offset]);
    }

    public function offsetUnset($offset)
    {
        $data = $this->getData();
        unset($data[$offset]);
    }

    public function offsetGet($offset)
    {
        $data = $this->getData();
        return isset($data[$offset]) ? $data[$offset] : null;
    }

    public function jsonSerialize()
    {
        return $this->getData();
    }
}