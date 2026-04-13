<?php

use App\Kernel;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};

require_once(__DIR__ . '/../vendor/autoload.php');
session_start();

use Config\Router;

$router = new Router;

$router->addRoute('/', 'HomeController', 'index');
$router->addRoute('/404', 'ErrorController', 'notFound');
$router->addRoute('/inscription', 'RegisterController', 'index');
$router->addRoute('/connexion', 'SessionController', 'login');
$router->addRoute('/deconnexion', 'SessionController', 'logout');
$router->addRoute('/ajoutPresentation', 'PresentationController', 'addPresentation');
$router->addRoute('/Presentation', 'PresentationController', 'presentation');
$router->addRoute('/modifier', 'PresentationController', 'editPresentation');
$router->addRoute('/modifCommentaire', 'CommentController', 'editComment');
$router->addRoute('/supprimerCommentaire', 'CommentController', 'deleteComment');

$router->handleRequest();
