<?php

if (isset($_GET['id'])) {
    //var_dump($_GET['id']);
    $id = htmlspecialchars($_GET['id']);

    //Je fais une requête sql pour récupérer the_shop_farxest par l'id
    $query = "SELECT `id`, `name`, `magic_power`, `image`, `description` 
    FROM `the_shop_farwest` WHERE `id` = :id";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id', $id);
    $statement->execute();

    //Je met la response de la reque ( donc the_shop_farwest) dans la variable
    $hero = $statement->fetch();


    //Si je n'ai pas de the_shop_farwest alors:
    if (!$hero) {
        redirectToRoute('404', 404);
    } else {
        //debug($the_shop_farwest);
        require_once(__DIR__ . "/../Views/the_shop_farwest.view.php");
    }
} else {
    redirectToRoute('404', 404);
}
