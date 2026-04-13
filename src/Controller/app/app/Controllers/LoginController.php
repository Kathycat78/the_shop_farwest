<?php
require_once(__DIR__ . '/../Utils/checkForm.php');
//Si je reçois ma super global POST avec la clé email alor:
if (isset($_POST['email'])) {
    //on met dans des variables en string
    $mail = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    //on appel la fonction checkFormat
    checkFormat('email', $mail);
    checkFormat('password', $password);

    //On appel la fonction isNotEmpty
    isNotEmpty('email');
    isNotEmpty('password');

    //Si mon tableau d'erreur est vide :
    if (empty($arrayError)) {
        //On créer la requête
        $query = "SELECT * FROM `user` WHERE email = :email";
        //On appel la connection à la base de donnée et on prepare la requête
        $statement = $pdo->prepare($query);
        //On donne les paramètres
        $statement->bindParam(':email', $mail);
        //Puis on execute la requête
        $statement->execute();

        //on créer une variable ou on met la reponse de la requête sql
        $userInfo = $statement->fetch();
        //var_dump($userInfo);

        //si je n'ai pas de reponse alor :
        if (!$userInfo) {
            //J'appelle la fonction errorMessage
            errorMessage("Votre adresse mail ou mot de passe sont incorrecte !");
        } else {
            //sinon je verifie que la mot de passe que l'user ma donner est le même que celui de la base de donnée 
            //si c'est le même alors c'est vrais
            $verifPassword = password_verify($password, $userInfo['password']);

            //Si c'est pas le même
            if (!$verifPassword) {
                errorMessage("Votre adresse mail ou mot de passe sont incorrecte !");
            } else {
                //sinon on peut le co

                $_SESSION['user'] = [
                    'id' => uniqid(),
                    'email' => $userInfo['email'],
                    'pseudo' => $userInfo['pseudo'],
                    'role' => $userInfo['role'],
                    'idDatabase' => $userInfo['id']
                ];

                //var_dump($_SESSION);
                redirectToRoute('/', 200);
            }
        }
    }
}

require_once(__DIR__ . "/../Views/login.view.php");
