<?php
require_once 'partials/head.php';
?>
<h1>Nous contacter ! </h1>
<form action="validform.php" method="post">
    <div class="container mt-5">
        <div class="form-group">
            <label for="email">Adresse e-mail</label>
            <input type="email" class="form-control" name="email" placeholder="maria@gmail.com" required>
        </div>

        <div class="form-group">
            <label for="name">Prénom</label>
            <input type="text" class="form-control" name="name" placeholder="Marie" required>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
    </div>
</form>
<?php
require_once 'partials/footer.php';
