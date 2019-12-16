<?php

use ishop\Router;

// Admin routes
Router::add("^admin$", ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
Router::add("^admin/?(?P<controller>[a-z-]+)?/?(?P<action>[a-z-]+)?$", ['prefix' => 'admin']);

// Default routes
Router::add("^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$");
Router::add("^$", ['controller' => 'Main', 'action' => 'index']);