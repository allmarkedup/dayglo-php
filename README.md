Dayglo
=======

A data file loader/parser for PHP 5.4+.

## Installation and use

Using composer:

```bash
$ composer require allmarkedup/dayglo
```

## Example

```php

<?php

use Amu\Dayglo\Parser;
use Amu\Dayglo\Loader;
use Amu\Dayglo\ParserCollection;

// Create collection with the parsers required
$parsers = new ParserCollection([
    new Parser\JsonParser(),
    new Parser\YamlParser()
]);

$loader = new Loader($parsers, __DIR__ . '/data');

// load and parse data from a JSON file
$file = $loader->fetch('example.json');
$data = $file->getData();

// load and parse data from a YAML file
$file = $loader->fetch('test.yaml');
$data = $file->getData();

```