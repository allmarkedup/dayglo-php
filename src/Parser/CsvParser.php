<?php namespace Amu\Dayglo\Parser;

use League\Csv\Reader;
use SplFileObject;

/**
*  CSV Parsing class
*/
class CsvParser extends AbstractParser implements ParserInterface
{
    protected static $supportedExtensions = ['csv'];

    protected $delimiter = ',';

    protected $enclosure = '"';

    protected $escapeChar = '\\';

    protected $flags;

    protected $hasHeader = false;

    public function __construct($params = [])
    {
        if (isset($params['delimiter'])) $this->delimiter = $params['delimiter'];
        if (isset($params['enclosure'])) $this->enclosure = $params['enclosure'];
        if (isset($params['escape'])) $this->escapeChar = $params['escape'];
        if (isset($params['flags'])) $this->flags = $params['flags'];
        if (isset($params['header'])) $this->hasHeader = true;

        $this->flags = isset($params['flags']) ? $params['flags'] : SplFileObject::READ_AHEAD|SplFileObject::SKIP_EMPTY;
    }

    public function parse($content)
    {
        $reader = Reader::createFromString($content);
        $reader->setDelimiter($this->delimiter);
        $reader->setEnclosure($this->enclosure);
        $reader->setEscape($this->escapeChar);
        $reader->setFlags($this->flags);
        if ( $this->hasHeader ) {
            return array_slice($reader->fetchAssoc($reader->fetchOne()), 1);
        }
        return $reader->fetchAll();
    }
}