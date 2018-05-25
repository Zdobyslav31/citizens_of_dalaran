<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('user_homepage', new Route('/', array(
    '_controller' => 'UserBundle:Default:index',
)));

return $collection;
