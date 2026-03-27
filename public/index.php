<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

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
$router->addRoute('/ajoutCommit', 'CommitController', 'addCommit');
$router->addRoute('/commit', 'CommitController', 'commit');
$router->addRoute('/modifier', 'CommitController', 'editCommit');
$router->addRoute('/modifCommentaire', 'CommentController', 'editComment');
$router->addRoute('/supprimerCommentaire', 'CommentController', 'deleteComment');

$router->handleRequest();


