<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\The_shop_farwest;
use App\Models\Comment;
use App\Utils\AbstractController;

//impoter la class le "use"
class CommitController extends AbstractController
{
    public function addThe_shop_farwest()
    {
        if (isset($_SESSION['user'])) {
            if (isset($_POST['addThe_shop_farwest'])) {
                $text = htmlspecialchars($_POST['the_shop_farwest']);
                $this->totalCheck('the_shop_farwest', $text);

                if (empty($this->arrayError)) {
                    $today = date("Y-m-d");
                    $the_shop_farwest = new The_shop_farwest(null, $text, $today, null, null, null, null, null, null, $_SESSION['user']['id_user']);
                    $the_shop_farwest->addThe_shop_farwest();
                    $this->redirectToRoute('/', 200);
                }
            }
            require_once(__DIR__ . "/../Views/addthe_shop_farwest.view.php");
        } else {
            $this->redirectToRoute('/', 302);
        }
    }


    //afficher un commit par l'id s'il existe
    public function the_shop_farwest()
    {
        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $commit = new addThe_shop_farwest($id, null, null, null, null, null, null, null, null, null, null);
            $the_shop_farwest = $the_shop_farwest->getThe_shop_farwestById();

            if ($The_shop_farwest) {
                //formulaire du commentaire
                if (isset($_POST['addComment'])) {
                    $text = htmlspecialchars($_POST['comment']);
                    $this->totalCheck('comment', $text);
                    if (empty($this->arrayError)) {
                        $today = date("Y-m-d");
                        $comment = new Comment(null, $text, $today, null, $id, $_SESSION['user']['id_user'], null);
                        $comment->addComment();
                        $this->redirectToRoute('/the_shop_farwest?id=' . $id, 200);
                    }
                }

                $searchComment = new Comment(null, null, null, null, $id, null, null);
                $comments = $searchComment->getCommentByThe_shop_farwest();


                $author = new User($The_shop_farwest->getUserId(), null, null, null, null, null, null, null);
                $myAuthor = $author->getUserById();

                require_once(__DIR__ . "/../Views/the_shop_farwest.view.php");
            } else {
                $this->redirectToRoute('/', 302);
            }
        } else {
            $this->redirectToRoute('/', 302);
        }
    }

    public function editThe_shop_farwest()
    {
        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $the_shop_farwest = new The_shop_farwest($id, null, null, null, null, null, null, null, null, null, null);
            $myThe_shop_farwest = $the_shop_farwest->getThe_shop_farwestById();

            if ($myThe_shop_farwest && ($_SESSION['user']['id_user'] === $myThe_shop_farwest->getUserId())) {

                if (isset($_POST['editThe_shop_farwest'])) {
                    $text = htmlspecialchars($_POST['The_shop_farwest']);
                    $this->totalCheck('the_shop_farwest', $text);

                    if (empty($this->arrayError)) {
                        $today = date("Y-m-d");
                        $updateThe_shop_farwest = new The_shop_farwest($id, $text, null, $today, null, null, null, null, null, null);
                        $updateThe_shop_farwest->editThe_shop_farwest();
                        $this->redirectToRoute('/the_shop_farwest?id=' . $id, 200);
                    }
                }

                require_once(__DIR__ . "/../Views/editthe_shop_farwest.view.php");
            } else {
                $this->redirectToRoute('/', 302);
            }
        } else {
            $this->redirectToRoute('/', 302);
        }
    }
}
