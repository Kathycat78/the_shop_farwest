<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/comment')]
final class CommentController extends AbstractController
{
    #[Route(name: 'app_comment_index', methods: ['GET'])]
    public function index(CommentRepository $commentRepository): Response
    {
        return $this->render('comment/index.html.twig', [
            'comments' => $commentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_comment_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('app_comment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('comment/new.html.twig', [
            'comment' => $comment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_comment_show', methods: ['GET'])]
    public function show(Comment $comment): Response
    {
        return $this->render('comment/show.html.twig', [
            'comment' => $comment,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_comment_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Comment $comment, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_comment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('comment/edit.html.twig', [
            'comment' => $comment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_comment_delete', methods: ['POST'])]
    public function delete(Request $request, Comment $comment, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($comment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_comment_index', [], Response::HTTP_SEE_OTHER);
    }
}


           namespace App\Controllers;

            use App\Models\Comment;
            use App\Utils\AbstractController;

            class CommentController extends AbstractController
{
           public function editComment()
    {
           if(isset($_GET['id'])){
            $id = htmlspecialchars($_GET['id'] );
            
            //Je dois instancier l'objet Comment pour poouvoir utiliser la méthode getCommentById (pas oublier le use)
            $comment = new Comment($id, null, null, null, null, null);
            $myComment = $comment->getCommentById();
            /*
            * si j'ai bien un commentaire dans la base de donner avec cet id
            * si j'ai bien unse session avec user ( donc si une personne est connecté)
            * si id_user et === à l'id du user qui a créer le commentaire
            */
            if($myComment && $_SESSION['user'] && $_SESSION['user']['id_user'] === $myComment->getIdUser()){

                if(isset($_POST['editComment'])){
                    $comment = htmlspecialchars($_POST['comment']);
                    $this->totalCheck('comment', $comment);
                    if(empty($this->arrayError)){
                        $today = date("Y-m-d"); 
                        $newComment = new Comment($id, $comment, null, $today, $myComment->getIdCommit(), $myComment->getIdUser());
                        $newComment->editComment();
                        $this->redirectToRoute('/presentation?id=' . $myComment->getIdCommit() , 200);
                    }
                }

                require_once(__DIR__ . "/../Views/editComment.view.php");
            }else{
                $this->RedirectToRoute('/', 302);
            }
            
            //Si la personne clique sur le submit alors vérifier les erreurs puis créer une méthode update pour envoyer la modification
        }else{
            $this->RedirectToRoute('/', 302);
        }
        
    }

    public function deleteComment()
    {
        if(isset($_POST['id'])){
            $id = htmlspecialchars($_POST['id']);
            $comment = new Comment($id, null, null, null, null, null);
            $myComment = $comment->getCommentById();

            //Je veux que le commentaire existe et que ce soit la personne qui a créer le commentaire ou alors que ce soit un admin
            if(($myComment && $_SESSION['user']['id_user'] === $myComment->getIdUser()) || ($myComment && $_SESSION['user']['id_role'] === 1)){
                $myComment->deleteComment();
                $this->redirectToRoute('/commit?id=' . $myComment->getIdCommit() , 200);

            }else{
                $this->redirectToRoute('/', 302);
            }
        }else{
            $this->redirectToRoute('/404', 404);
        }
    }
}