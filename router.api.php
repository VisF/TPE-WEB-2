<?php
    require_once('libs/Router.php');
    require_once('app/api/api.controller.php');
    // crea el router
    $router = new Router();

    // define la tabla de ruteo

    $router->addRoute('comentario/:ID_PRODUCTO', 'GET', 'ApiController','mostrarComentarios');
    $router->addRoute('comentario/:ID_PRODUCTO', 'POST', 'ApiController','agregarComentario');
    $router->addRoute('comentario/:ID_PRODUCTO/:ID_COMENTARIO', 'DELETE', 'ApiController','eliminarComentario');
    $router->setDefaultRoute('ApiController', 'error');

    // rutea
    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
