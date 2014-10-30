<?php namespace Amu\Dayglo;

use Amu\Dayglo\Data\LocalData;
use Amu\Dayglo\ParserCollection;
use Amu\Dayglo\Exception\Exception;
use Amu\Dayglo\Exception\FileNotFoundException;
use Amu\Dayglo\Exception\NotSupportedException;
use Amu\Dayglo\Exception\NoMatchingParserException;

class DataLoader {

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

    public function fetch($path)
    {
        $path = $this->makePath($this->basePath, $path);
        if (file_exists($path)) {
            if (is_file($path)) {
                $file = new LocalData($path);
                if ($parser = $this->parsers->getParserForMime($file->getMimeType())) {
                    $file->setParser($parser);
                    return $file;    
                }
                throw new NoMatchingParserException('No matching parser found');
            } elseif (is_dir($path)) {
                throw new NotSupportedException('Loading a directory of data is not supported at this time.');
            }
        }
        throw new FileNotFoundException('File or directory not found (tried finding ' . $path . ')');
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

