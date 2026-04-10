<?php
require_once 'partials/head.php';
require_once 'data.php';
// je vérifie que j'ai un truc dans le get
//var_dump($_GET);

function getHeros($id, $tab)
{

    foreach ($tab as $value) {

        if ($id == $value['id']) {
            return $value;
        }
    }
    return null;
};

//Si dans le get j'ai un id alors
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);

    $result = getHeros($id, $heros);
    //var_dump($result);
    if ($result !== NULL) {
?>
        <div class="container">
            <h1><?= $result['name'] ?></h1>
            <div class="row">
                <div class="col">
                    <img src="public/img/<?= $result['picture'] ?>" alt="Image de <?= $result['name'] ?>">
                </div>
                <div class="col">
                    <h2 class="text-center mt-5"><?= $result['magic_power'] ?><h2>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "<h1> fier d'être une femme !</h1>";
    }
} else {
    echo "<p>Erreur</p>";
};

require_once 'partials/head.php';
