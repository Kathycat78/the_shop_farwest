<?php
function redirectToRoute($route, $code)
{
    http_response_code($code);
    header("Location: {$route}");
    exit;
}

function successMessage($myMessage)
{

?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $myMessage ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php

}

function errorMessage($myMessage)
{

?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $myMessage ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php

}

//C'est un var_dump plus stylé 😁
function debug($info)
{
    echo '<pre>';
    var_dump($info);
    echo '</pre>';
}
