<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet Heros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/public/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"> The_shop_farwest` = ?";</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php
                    if (isset($_SESSION['user'])) {
                        if ($_SESSION['user']['role'] === "admin") {
                    ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/addthe_shop_farwest">the_shop_faewest</a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Se déconnecter</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">S'inscrire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Se connecter</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Se connecter</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Se connecter</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Se connecter</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Se connecter</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Se connecter</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Se connecter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login"></a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">r</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">r</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">r</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login"></a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login"></a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login"></a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login"></a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login"></a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login"></a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">r</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">r</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>