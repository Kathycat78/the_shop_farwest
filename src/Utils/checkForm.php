<?php

function isNotEmpty($value)
{
    //Création d'un tableau vide
    global $arrayError;

    //si le post avec la valeur est vide alors
    if (empty($_POST[$value])) {
        //On rapelle le tableau et on lui donne en clé le nom de la $value et en valeur une string
        $arrayError[$value] = "Ce champs ne peut pas être vide.";
        //On retour le tableau
        return $arrayError;
    }

    //sinon on retourne false
    return false;
}

function checkFormat($nameInput, $value)
{
    //Création d'un tableau vide
    global $arrayError;

    //Vos regex = vos filtres
    $regexPseudo = '/^([0-9a-z_\-.A-Zà-üÀ-Ü\ ]){3,255}$/';
    $regexPassword = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/';
    $regexPower = '/^[a-z_\-\'.A-Zà-üÀ-Ü\ œ]{3,255}$/';
    $regexDescription = '/^[a-zA-Zà-üÀ-Ü ,!?;.:()<>$@£\'\"\-_°€&%#<>\-+\/0-9œ]{1,1000}$/';
    $regexImg = '/^([0-9a-z_\-.A-Zà-üÀ-Ü]){0,255}$/';

    //on prend le nom de l'input
    switch ($nameInput) {

        //Si l'input s'appel pseudo alors 
        case 'pseudo':

            //si la valeur de l'input n'arrive pas a passer le filtre alors
            if (!preg_match($regexPseudo, $value)) {
                //on appel notre tableau et on ajoute en clé pseudo et en valeur la string
                $arrayError['pseudo'] = 'Merci de renseigner un pseudo correcte!';
            }
            break;

        case 'password':

            if (!preg_match($regexPassword, $value)) {
                $arrayError['password'] = 'Merci de donné un mot de passe avec au minimum : 8 caractères, 1 majuscule, 1 miniscule, 1 caractère spécial!';
            }
            break;

        case 'email':

            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $arrayError['mail'] = 'Merci de renseigner un e-mail correcte!';
            }
            break;

        case 'name':

            if (!preg_match($regexPseudo, $value)) {
                $arrayError['name'] = 'Merci  poor the_shop_farwest';
            }
            break;

        case 'power':

            if (!preg_match($regexPower, $value)) {
                $arrayError['power'] = 'Merci de mettre un vrai pouvoir';
            }
            break;

        case 'description':

            if (!preg_match($regexDescription, $value)) {
                $arrayError['description'] = 'Merci de mettre une vraie description';
            }
            break;

        case 'image':

            if (!preg_match($regexImg, $value)) {
                $arrayError['image'] = 'Merci de mettre une véritable image';
            }
            break;
    }
}
