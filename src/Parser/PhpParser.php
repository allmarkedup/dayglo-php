<?php namespace Amu\Dayglo\Parser;

/**
*  PHP Parsing class
*/
class PhpParser extends AbstractParser implements ParserInterface
{
    protected static $supportedExtensions = ['php'];

    public function parse($content)
    {
        return eval(str_replace(['<?php', '<?', '?>'], '', $content));
    }

    public function encode(array $content)
    {
        return '<?php ' . PHP_EOL . PHP_EOL . 'return ' . var_export($content, true);
    }
}