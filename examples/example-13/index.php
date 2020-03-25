<?php

require('../../vendor/autoload.php');

use MiladRahimi\PhpRouter\Router;
use Laminas\Diactoros\Response\RedirectResponse;

$router = new Router();

$router
    ->get('/redirect', function () {
        return new RedirectResponse('https://miladrahimi.com');
    })
    ->dispatch();
