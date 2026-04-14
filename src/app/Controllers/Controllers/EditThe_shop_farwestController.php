<?php
require_once(__DIR__ . '/../Utils/checkForm.php');

//Si la personne est connecté + admin alors:
if ((isset($_SESSION['user'])) && ($_SESSION['user']['role'] === "admin")) {

    if (isset($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']);

        //Je fais une requête sql pour récupérer The_shop_farwest par l'id
        $query = "SELECT `id`, `name`, `image`, `description` 
        FROM `the_shop_farwest` WHERE `id` = :id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();
        //on met la reponse dans la variable the_shop_farwest
        $the_shop_farwest = $statement->fetch();

        //Si il y a the_shop_farwest alors:
        if ($the_shop_farwest) {

            if (isset($_POST['name'])) {
                $valueName = htmlspecialchars($_POST['name']);
                $valueDescription = htmlspecialchars($_POST['description']);
                $valueImg = htmlspecialchars($_POST['image']);

                checkFormat('name', $valueName);
                checkFormat('description', $valueDescription);
                checkFormat('image', $valueImg);

                isNotEmpty('name');
                isNotEmpty('description');

                if (empty($arrayError)) {
                    $queryUpdate = "UPDATE `the_shop_farwest` 
                    SET `name` = :name, `description`= :description, `image` = :image
                    WHERE `id` = :id";

                    $statementUpdate = $pdo->prepare($queryUpdate);
                    $statementUpdate->bindValue(':name', $valueName);
                    $statementUpdate->bindValue(':description', $valueDescription);
                    $statementUpdate->bindValue(':image', $valueImg);
                    $statementUpdate->bindValue(':id', $id);
                    $statementUpdate->execute();

                    redirectToRoute('/', 200);
                }
            }

            require_once(__DIR__ . '/../Views/editthe_shop_farwest.view.php');
        } else {
            redirectToRoute('404', 404);
        }
    } else {
        redirectToRoute('404', 404);
    }
} else {
    redirectToRoute('404', 404);
}
