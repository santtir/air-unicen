<?php

require_once 'libs/router-api.php';
require_once 'apicontroller.php';

//crea el router

$router=new Router();


//define tabla de ruteo
$router->addRoute('vuelos/:NRO_VUELO', 'GET', 'apiController', 'obtenerVuelo');
$router->addRoute('vuelos/ciudades', 'GET', 'apiController', 'obtenerCiudades');
$router->addRoute('vuelos', 'POST', 'apiController', 'insertarVuelo');
$router->addRoute('vuelos', 'GET', 'apiController', 'obtenerAllVuelos');


//rutea

$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);