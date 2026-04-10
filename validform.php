<?php
require_once 'partials/head.php';
//var_dump($_POST);
if ((!empty($_POST['email'])) && (!empty($_POST['name']))) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
?>
    <h1>Bonjour <?= $name ?></h1>
    <p>Ton message : <?= $message ?></p>
    <p>Ton adresse mail: <?= $email ?></p>
<?php
} else {
    echo "<p>Merci de remplir le formulaire.</p>";
}
?>

<?php
require_once 'partials/footer.php';
?>