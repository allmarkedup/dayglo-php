<?php namespace Amu\Dayglo;

use Amu\Dayglo\Data\LocalData;
use Amu\Dayglo\ParserCollection;
use Amu\Dayglo\Exception\Exception;
use Amu\Dayglo\Exception\FileNotFoundException;
use Amu\Dayglo\Exception\NotSupportedException;
use Amu\Dayglo\Exception\NoMatchingParserException;

class Handler {

    protected $basePath;

    protected $parsers;

    public function __construct(ParserCollection $parsers, $basePath = '/')
    {
        $this->basePath = $basePath;
        $this->parsers = $parsers;
    }

    public function setBasePath($basePath)
    {
        $this->basePath = $basePath;
    }

    protected function makePath()
    {
        $parts = array();
        $count = 0;
        foreach( func_get_args() as $arg ) {
            if ( $count === 0 ) {
                if ( ! empty($arg) ) $parts[] = rtrim($arg,'/');
            } else {
                if ( ! empty($arg) ) $parts[] = trim($arg,'/');
            }
            $count++;
        }
        return implode('/', $parts);
    }

}

