<?php
/**
 * Created by PhpStorm.
 * User: tazo
 * Date: 25/11/2015
 * Time: 23:20
 */

if ( ! is_file($autoloadFile = __DIR__.'/../vendor/autoload.php')) {
	echo 'Could not find "vendor/autoload.php". Did you forget to run "composer install --dev"?'.PHP_EOL;
	exit(1);
}
require_once $autoloadFile;