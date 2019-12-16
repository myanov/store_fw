<?php

use \ishop\App;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "config/init.php";
require_once LIBS . '/functions.php';
require_once CONF . '/routes.php';

new App();