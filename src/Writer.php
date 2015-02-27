<?php namespace Amu\Dayglo;

use Amu\Dayglo\Data\LocalData;
use Amu\Dayglo\Exception\Exception;
use Amu\Dayglo\Exception\FileNotFoundException;
use Amu\Dayglo\Exception\NotSupportedException;
use Amu\Dayglo\Exception\NoMatchingParserException;

class Writer extends Handler {

    protected $data = [];

    public function setData(array $data)
    {
        $this->data = $data;
    }

    public function mergeData(array $data)
    {
        $this->data = array_merge($this->data, $data);
    }

    public function write($path, array $data = array())
    {
        $path = $this->makePath($this->basePath, $path);
        $file = new LocalData($path);
        if ($parser = $this->parsers->getParser($file)) {
            $file->setParser($parser);
            $file->setData($this->data);
            $file->write();
            return $file;
        }
        throw new NoMatchingParserException('No matching parser found');
    }



    // public function create($path)
    // {
    //     $path = $this->makePath($this->basePath, $path);
    //     if (file_exists($path)) {
    //         if (is_file($path)) {
    //             $file = new LocalData($path);
    //             if ($parser = $this->parsers->getParser($file)) {
    //                 $file->setParser($parser);
    //                 return $file;
    //             }
    //             throw new NoMatchingParserException('No matching parser found');
    //         } elseif (is_dir($path)) {
    //             throw new NotSupportedException('Loading a directory of data is not supported at this time.');
    //         }
    //     }
    //     throw new FileNotFoundException('File or directory not found (tried finding ' . $path . ')');
    // }

}

