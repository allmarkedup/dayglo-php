<?php namespace Amu\Dayglo\Data;

/**
*  Data interface
*/
interface DataInterface
{
    public function getData();

    public function setData(array $data);

    public function getRaw();

    public function write();    
}