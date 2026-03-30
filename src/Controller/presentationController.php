<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\presenyation;
use App\Models\Comment;
use App\Utils\AbstractController;

//impoter la class le "use"
class CommitController extends AbstractController
{
    public function addPresentation()
    {
        if(isset($_SESSION['user'])) {
            if(isset($_POST['addpresentation'])){
                $text = htmlspecialchars($_POST['presentation']);
                $this->totalCheck('presentation', $text);

                if(empty($this->arrayError)){
                    $today = date("Y-m-d");
                    $commit = new Presentation(null, $text, $today, null, null, null, null, null, null, $_SESSION['user']['id_user']);
                    $commit->addPresentation();
                    $this->redirectToRoute('/', 200);
                }
            }
            require_once(__DIR__ . "/../Views/addPresentation.view.php");
        }else{
            $this->redirectToRoute('/', 302);
        }
    }


    //afficher un commit par l'id s'il existe
    public function presentation()
    {
        if(isset($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $commit = new Commit($id, null, null, null, null, null, null, null, null, null, null);
            $myCommit = $commit->getPresentationById();

            if($myPresentation)
            {
                //formulaire du commentaire
                if(isset($_POST['addComment'])){
                    $text = htmlspecialchars($_POST['comment']);
                    $this->totalCheck('comment', $text);
                    if(empty($this->arrayError)){
                        $today = date("Y-m-d");
                        $comment = new Comment(null, $text, $today, null, $id, $_SESSION['user']['id_user'], null);
                        $comment->addComment();
                        $this->redirectToRoute('/presentation?id=' . $id, 200);
                    }
                }

                $searchComment = new Comment(null, null, null, null, $id, null, null);
                $comments = $searchComment->getCommentByPresentation();

                //récuperer l'autheur du commit
                $author = new User($myPresentation->getUserId(), null, null, null, null, null, null, null);
                $myAuthor = $author->getUserById();

                require_once(__DIR__ . "/../Views/presentation.view.php");
            }else{
                $this->redirectToRoute('/', 302);
            }
        }else{
            $this->redirectToRoute('/', 302);
        }
    }

    public function editPresentation()
    {
        if(isset($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $commit = new presentation($id, null, null, null, null, null, null, null, null, null, null);
            $myCommit = $commit->getPresentationById();
            
            if($myPresentation && ($_SESSION['user']['id_user'] === $myPresentation->getUserId())){

                if(isset($_POST['editPresentation'])){
                    $text = htmlspecialchars($_POST['presentation']);
                    $this->totalCheck('presentation', $text);

                    if(empty($this->arrayError)){
                        $today = date("Y-m-d");
                        $updatePresentation = new editPresentation($id, $text, null, $today, null, null, null, null, null, null);
                        $updatePresentation->editPresentation();
                        $this->redirectToRoute('/presentation?id='.$id , 200);
                    }
                }

                require_once(__DIR__ . "/../Views/editPresentation.view.php");
            }else{
                $this->redirectToRoute('/', 302);
            }
        }else{
            $this->redirectToRoute('/', 302);
        }
        
    }
}