<?php

use Tester\Environment;

date_default_timezone_set('Europe/Prague');
define('TEMP_DIR', __DIR__ . '/../tmp');

$autoload = @include __DIR__ . '/../../vendor/autoload.php';

if (!$autoload) {
	echo 'Install Nette Tester using `composer update --dev`';
	exit(1);
}

$autoload->add('SmartsuppTests', __DIR__ . '/..');

Environment::setup();
Tester\Helpers::purge(TEMP_DIR);
Tracy\Debugger::$logDirectory = TEMP_DIR;