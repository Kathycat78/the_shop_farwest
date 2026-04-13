<?php
require_once(__DIR__ . '/partials/head.php');
?>
<h1>The_shop_farwest</h1>
<form method="POST">
    <div class="container">
        <div class="form-group">
            <label for="name" class="form-label">Nom de la boutique:</label>
            <input type="text" name="name" id="name" placeholder="Samsam !" class="form-control">
            <?php
            if (isset($arrayError['name'])) {
            ?>
                <p class="text-danger"><?= $arrayError['name'] ?></p>
            <?php
            }
            ?>
        </div>
        <div class="form-group">
            <label for="power" class="form-label">Le pouvoir de ta boutique:</label>
            <input type="text" name="power" id="power" placeholder="Permet de faire plaisir aux femmes" class="form-control">
            <?php
            if (isset($arrayError['power'])) {
            ?>
                <p class="text-danger"><?= $arrayError['power'] ?></p>
            <?php
            }
            ?>
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Parle moi de ta boutique</label>
            <textarea class="form-control" placeholder="tout le style farwest femme !" id="description" name="description" style="height: 100px"></textarea>
            <?php
            if (isset($arrayError['description'])) {
            ?>
                <p class="text-danger"><?= $arrayError['description'] ?></p>
            <?php
            }
            ?>
        </div>
        <div class="form-group">
            <label for="image" class="form-label">Nom de l'image :</label>
            <input type="text" name="image" id="" class="form-control">
            <?php
            if (isset($arrayError['image'])) {
            ?>
                <p class="text-danger"><?= $arrayError['image'] ?></p>
            <?php
            }
            ?>
        </div>
        <button type="submit" class="btn btn-success mt-5">The_shop_farwest !</button>
    </div>
</form>
<?php
require_once(__DIR__ . '/partials/footer.php');
