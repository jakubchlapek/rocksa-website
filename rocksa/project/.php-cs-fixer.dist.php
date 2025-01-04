<?php

use PhpCsFixer\Finder;
use PhpCsFixer\Config;

$finder = Finder::create();
$finder->ignoreVCSIgnored(true);

$config = new Config();
$config->setFinder($finder);

return $config;
