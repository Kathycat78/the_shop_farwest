<?php
require_once(__DIR__ . '/partials/head.php');
?>
<div class="container">
    <h1><?= $the_shop_farwest['name'] ?></h1>
    <div class="row">
        <div class="col">
            <img src="public/img/<?= $the_shop_farwest['image'] ?>" alt="Image de <?= $the_shop_farwest['name'] ?>">
        </div>
        <div class="col">
            <h2>Pouvoir magique :</h2>
            <p><?= $the_shop_farwest['magic_power'] ?></p>
        </div>
        <div class="col">
            <h2>Description :</h2>
            <p><?= $the_shop_farwest['description'] ?></p>
        </div>
    </div>
    <?php
    if ((isset($_SESSION['user'])) && ($_SESSION['user']['role'] === 'admin')) {
    ?>
        <div class="row my-5">
            <div class="col-2">
                <a href="/editthe_shop_farwest?id=<?= $the_shop_farwest['id'] ?>" class="btn btn-warning d-flex justify-content-center mt-3">Modifier</a>
                <a href="/deletethe_shop_farwest?id=<?= $the_shop_farwest['id'] ?>" class="btn btn-danger d-flex justify-content-center mt-3">Supprimer</a>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php
require_once(__DIR__ . '/partials/footer.php');
?>