<?php namespace Amu\Dayglo\Data;

use Amu\Dayglo\Data\DataInterface;
use Amu\Dayglo\Data\AbstractData;

/**
*  Data file object class
*/
class LocalData extends AbstractData implements DataInterface
{
    protected $path;

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
        return strtolower(pathinfo($this->path, PATHINFO_EXTENSION));
    }

}