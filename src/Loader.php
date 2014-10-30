<?php namespace Clearleft\Dayglo;

use Clearleft\Dayglo\Data\File;
use Clearleft\Dayglo\Parser\ParserInterface;
use Clearleft\Dayglo\Exception\Exception;
use Clearleft\Dayglo\Exception\FileNotFoundException;

class Loader {

    protected $basePath;

    protected $parsers = [];

    public function __construct($basePath = '/')
    {
        $this->basePath = $basePath;
    }

    public function addParser(ParserInterface $parser)
    {
        $this->parsers[] = $parser;
    }

    public function fetch($path)
    {
        $path = $this->makePath($this->basePath, $path);
        if (file_exists($path)) {
            if (is_file($path)) {
                $file = new File($path);
                $parser = $this->getParserForFile($path, $file->getMimeType());
                $file->setParser($parser);
                return $parser;
            } elseif (is_dir($path)) {
                throw new NotSupportedException('Loading a directory of data is not supported at this time.');
            }
        }
        throw new FileNotFoundException('File or directory not found (tried finding ' . $path . ')');
    }

    protected function getParserForFile($path)
    {
        $mimeType = $this->getMimeForPath($path);
        foreach($this->parsers as $parser)
        {
            $mimes = $parser->getSupportedMimes();

        }
        return null;
    }

    protected function getExtension($path)
    {

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

