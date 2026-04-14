<?php
require_once(__DIR__ . '/../Utils/checkForm.php');
//var_dump($_SESSION);

//Si il est connecté ET que le role est bien admin alors
if ((isset($_SESSION['user'])) && ($_SESSION['user']['role'] === "admin")) {

    //Si la personne à clicker sur le bouton submit alors
    if (isset($_POST['name'])) {
        $valueName = htmlspecialchars($_POST['name']);
        $valueDescription = htmlspecialchars($_POST['description']);
        $valueImage = htmlspecialchars($_POST['image']);

        checkFormat('name', $valueName);
        checkFormat('description', $valueDescription);
        checkFormat('image', $valueImage);

        isNotEmpty('name');
        isNotEmpty('description');

        //var_dump($arrayError);

        if (empty($arrayError)) {
            $today = date('Y-m-d');

            $query = "INSERT INTO `the_shop_farwest` (`name`, `description`, `image`, `creation_date`)
            VALUES (:name, :description, :image, :creation_date)";
            $statement = $pdo->prepare($query);
            $statement->bindValue(':name', $valueName);
            $statement->bindValue(':description', $valueDescription);
            $statement->bindValue(':image', $valueImage);
            $statement->bindValue(':creation_date', $today);
            $statement->execute();

            redirectToRoute('/', 200);
        }

        require_once(__DIR__ . "/../Views/addthe_shop_farwest.view.php");
    } else {
        require_once(__DIR__ . "/../Views/addthe_shop_farwest.view.php");
    }
} else {
    redirectToRoute('/404', 404);
}
