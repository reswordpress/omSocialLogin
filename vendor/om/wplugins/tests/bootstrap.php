<?php

if (@!include __DIR__ . '/../vendor/autoload.php') {
	echo 'Install Nette Tester using `composer update --dev`';
	exit(1);
}



// configure environment
// configure environment
Tester\Helpers::setup();
/**/class_alias('Tester\Assert', 'Assert');/**/
date_default_timezone_set('Europe/Prague');
$_GET = $_POST = $_COOKIE = array();


// create temporary directory
define('TEMP_DIR', __DIR__ . '/tmp/' . getmypid());
@mkdir(dirname(TEMP_DIR)); // @ - directory may already exist
Tester\Helpers::purge(TEMP_DIR);


if (extension_loaded('xdebug')) {
	xdebug_disable();
	Tester\CodeCoverage\Collector::start(__DIR__ . '/coverage.dat');
}