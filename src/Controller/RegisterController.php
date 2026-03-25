<?php 

namespace App\Controllers;

use App\Utils\AbstractController;
use App\Models\User;

class RegisterController extends AbstractController
{
    public function index ()
    {
        //Si mon client click sur submit
        if(isset($_POST['register'])){
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $description = htmlspecialchars($_POST['description']);

            $this->totalCheck("pseudo", $pseudo);
            $this->totalCheck("email", $email);
            $this->totalCheck("password", $password);
            $this->checkFormat('description', $description);

            //var_dump($this->arrayError);
            if(empty($this->arrayError)){
                $today = date('Y-m-d');
                //Hash le mot de passe :
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $user = new User(null, $pseudo, $passwordHash, $email, null, $description, $today, 2);
                $ifExist = $user->getUserByEmail();

                if($ifExist){
                    //on envoie vers connection
                    var_dump("Un compte avec cette boite mail à déjà été créée");
                }else{
                    //On appel la méthode pour l'enregistrer dans la base de données
                    $user->saveUser();
                }
                
            }
            
        }
        require_once(__DIR__ . "/../Views/register.view.php");
    }
}