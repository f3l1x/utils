<?php

declare(strict_types=1);

use Nette\Utils\Helpers;
use Tester\Assert;


require __DIR__ . '/../bootstrap.php';


Assert::same('', Helpers::getLastError());

ini_set('html_errors', '1');
@constant('"');
Assert::same('Couldn\'t find constant "', Helpers::getLastError());

ini_set('html_errors', '0');
@constant('"');
Assert::same('Couldn\'t find constant "', Helpers::getLastError());

ini_set('html_errors', '1');
@fopen('nonexist', 'r');
Assert::same('failed to open stream: No such file or directory', Helpers::getLastError());

ini_set('html_errors', '0');
@fopen('nonexist', 'r');
Assert::same('failed to open stream: No such file or directory', Helpers::getLastError());
