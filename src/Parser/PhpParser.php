<?php namespace Amu\Dayglo\Parser;

/**
*  PHP Parsing class
*/
class PhpParser extends AbstractParser implements ParserInterface
{
    protected static $supportedMimes = ['application/x-php'];

    public function parse($content)
    {
        return eval(str_replace(['<?php', '<?', '?>'], '', $content));
    }
}