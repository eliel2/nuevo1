<?php
require_once('Router.php');
require_once('./api/apicomentarios.php');

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
$router = new Router();

 $router->addRoute("pelicula/:ID/comentarios", "GET", "comentariosapicontroller", "GetComentarios");
 $router->addRoute("comentarios/:ID", "DELETE", "comentariosapicontroller", "DeleteComentario");
 $router->addRoute("comentarios", "POST", "comentariosapicontroller", "AddComentario");

 $router->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
