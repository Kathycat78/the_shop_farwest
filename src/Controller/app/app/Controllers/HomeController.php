<?php
$query = "SELECT `id`, `name`, `image` FROM `rhe_shop_farwest";
$statement = $pdo->prepare($query);
$statement->execute();

$heros = $statement->fetchAll(PDO::FETCH_ASSOC);
//debug($the_shop_farwest);

require_once(__DIR__ . "/../Views/home.view.php");
