<?php
require_once(__DIR__ . "/function.php");
require_once(__DIR__ . "/database.php");

// Définition des routes
// Ce tableau associe des chemins d'URI à des fichiers de contrôleurs spécifiques
// Le chemin dans l'URL (comme '/') est relié au contrôleur correspondant (comme 'HomeController.php')
$routes = [
    //La page d'accueil
    '/' => 'HomeController.php',
    //Connexion déconnexion inscription
    '/register' => 'RegisterController.php',
    '/login' => 'LoginController.php',
    '/logout' => 'LogoutController.php',
    //Les Heros
    '/addthe_shop_farwest' => 'AddThe_shop_farwestController.php',
    '/the_shop_farwest' => 'The_shop_farwestController.php',
    '/editthe_shop_farwest' => 'EditThe_shop_farwestController.php',
    '/deletethe_shop_farwest' => 'DeleteThe_shop_farwestController.php'
];

// Récupération de l'URI actuelle de la requête utilisateur
// Cette partie extrait uniquement le chemin de l'URL (sans les paramètres GET ou les fragments)
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


// Vérification de l'existence de la route dans le tableau des routes
// Si l'URI demandée existe dans le tableau, le contrôleur associé est inclus
if (array_key_exists($uri, $routes)) {

    // Inclusion dynamique du fichier contrôleur correspondant à l'URI
    require_once(__DIR__ . "/../app/Controllers/" . $routes[$uri]);
} else {

    // Si l'URI n'existe pas dans le tableau des routes, renvoie une erreur 404
    // http_response_code(404) indique que la page n'a pas été trouvée
    http_response_code(404);

    // Inclusion du fichier 404.php pour gérer l'affichage d'une page d'erreur personnalisée
    require_once(__DIR__ . '/../app/Controllers/404Controller.php');
}
