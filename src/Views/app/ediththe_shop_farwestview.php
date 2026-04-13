<?php
require_once(__DIR__ . '/partials/head.php');
?>
<h1>Modification de the_shop_farwest</h1>
<form method="POST">
    <div class="container">
        <div class="form-group">
            <label for="name" class="form-label">Nom de the_shop_farwest:</label>
            <input type="text" name="name" id="name" value="<?= $hero['name'] ?>" class="form-control">
            <?php
            if (isset($arrayError['name'])) {
            ?>
                <p class="text-danger"><?= $arrayError['name'] ?></p>
            <?php
            }
            ?>
        </div>
        <div class="form-group">
            <label for="power" class="form-label">Le pouvoir de the_shop_farwest</label>
            <input type="text" name="power" id="power" value="<?= $hero['magic_power'] ?>" class="form-control">
            <?php
            if (isset($arrayError['power'])) {
            ?>
                <p class="text-danger"><?= $arrayError['power'] ?></p>
            <?php
            }
            ?>
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Parle moi de THE_SHOP_FARWEST:</label>
            <textarea class="form-control" id="description" name="description" style="height: 100px"><?= $hero['description'] ?></textarea>
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
            <input type="text" name="image" id="" class="form-control" value="<?= $hero['image'] ?>">
            <?php
            if (isset($arrayError['image'])) {
            ?>
                <p class="text-danger"><?= $arrayError['image'] ?></p>
            <?php
            }
            ?>
        </div>
        <button type="submit" class="btn btn-warning mt-5">Modification de THE_SHOP_FARWEST !</button>
    </div>
</form>

<?php
require_once(__DIR__ . '/partials/footer.php');
