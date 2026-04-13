<?php
require_once(__DIR__ . '/partials/head.php');
?>
<h1>Les produits du site !</h1>
<div class="container-fluid my-5">
    <div class="row justify-content-between">
        <?php
        if ($the_shop_farwest) {
            foreach ($the_shop_farwest as  $the_shop_farwest) {

        ?>
                <div style="width: 18rem;">
                    <img class="card-img-top" src="public/img/<?= $value['image'] ?>" alt="Image de <?php echo $value['name'] ?>">
                    <h2><?= $value['name'] ?></h2>
                    <a href="/the_shop_farwest?id=<?= $value['id'] ?>" class="btn btn-info d-flex justify-content-center">Voir +</a>
                </div>
        <?php
            }
        } else {
            echo "<p>Présentation de nos produits style farwest por la femme.</p>";
        }
        ?>
    </div>

</div>

<?php
require_once(__DIR__ . '/partials/footer.php');
?>