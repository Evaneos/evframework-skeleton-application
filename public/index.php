<?php
require_once '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use EVFramework\Container\BaseBuilder as ContainerBuilder;
use Pyrite\Routing\RouteCollectionBuilder as RouteCollectionBuilder;
use Pyrite\Kernel\PyriteKernel as PyriteKernel;

date_default_timezone_set('Europe/Paris');

// We use the compiled version of the configuration
// If you want to compile the configuration you should run compile.php
// In dev env you can use grunt to automate this. Run grunt and a compiled version of the configuration will be created.
// Grunt will also watch for changes in the configuration and will recompile if needed
$routingPath   = '../config/routing/route.yml';
$containerPath = '../config/container/container.yml';

$request  = Request::createFromGlobals();
$container = ContainerBuilder::build($request, $containerPath);

$routeCollection = RouteCollectionBuilder::buildFromFile($routingPath);

PyriteKernel::boot($request, $routeCollection, $container);
