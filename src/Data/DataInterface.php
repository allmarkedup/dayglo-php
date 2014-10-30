<?php namespace Amu\Dayglo\Data;

/**
*  Data interface
*/
interface DataInterface
{
    public function getMimeType();

    public function getData();

    public function getRaw();
}