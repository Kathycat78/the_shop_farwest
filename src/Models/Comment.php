<?php

namespace App\Models;

use PDO;
use Config\Database;

class Comment
{
    private ?int $id_comment;
    private ?string $text;
    private ?string $creation_date;
    private ?string $modification_date;
    private ?int $id_presentation;
    private ?int $id_user;
    private ?string $pseudo;

    public function __construct(?int $id_comment, ?string $text, ?string $creation_date, ?string $modification_date, ?int $id_presentation, ?int $id_user, ?string $pseudo)
    {
        $this->id_comment = $id_comment;
        $this->text = $text;
        $this->creation_date = $creation_date;
        $this->modification_date = $modification_date;
        $this->id_presentation = $id_presentation;
        $this->id_user = $id_user;
        $this->pseudo = $pseudo;
    }

    public function addComment()
    {
        $pdo = Database::getConnection();
        $sql = "INSERT INTO `comment` (`text`, `creation_date`, `id_presentation`, `id_user`) 
                VALUES (?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$this->text, $this->creation_date, $this->id_presentation, $this->id_user]);
    }

    public function getCommentByCommit()
    {
        $pdo = Database::getConnection();
        $sql = "SELECT `comment`.`id_comment`, `comment`.`text`, `comment`.`creation_date`, `comment`.`modification_date`, `comment`.`id_commit`, `comment`.`id_user`, `user`.`pseudo`
        FROM `comment` 
        INNER JOIN `user` ON `comment`.`id_user` = `user`.`id_user`
        WHERE `id_com` = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->id_presentation]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //On créer un tableau vide
        $comments = [];
        //Je boucle sur mon tableau de resultat pour créer un nouvel objet de chaque resultat
        foreach ($result as $row) {
            //Je créer un nouvel objet
            $comment = new Comment($row['id_comment'], $row['text'], $row['creation_date'], $row['modification_date'], $row['id_commit'], $row['id_user'], $row['pseudo']);
            //Je l'insert dans mon tableau
            $comments[] = $comment;
        }
        return $comments;
    }

    //méthode pour aller chercher un commentaire depuis sont id:
    public function getCommentById()
    {
        $pdo = Database::getConnection();
        $sql = "SELECT `id_comment`, `text`, `creation_date`, `modification_date`, `id_presentation`, `id_user`
        FROM `comment` WHERE `id_comment` = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->id_comment]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return new Comment($result['id_comment'], $result['text'], $result['creation_date'], $result['modification_date'], $result['id_presentation'], $result['id_user'], null);
        } else {
            return false;
        }
    }

    //méthode pour modifier le commentaire:
    public function editComment()
    {
        $pdo = Database::getConnection();
        $sql = "UPDATE `comment` SET `text` = ?, `modification_date` = ? WHERE `id_comment` = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$this->text, $this->modification_date, $this->id_comment]);
    }

    //méthode pour supprimer un commentaire
    public function deleteComment()
    {
        $pdo = Database::getConnection();
        $sql = "DELETE FROM `comment` WHERE `id_comment` = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$this->id_comment]);
    }

    public function getIdComment(): ?int
    {
        return $this->id_comment;
    }
    public function getText(): ?string
    {
        return $this->text;
    }
    public function getCreationDate(): ?string
    {
        return $this->creation_date;
    }
    public function getModificationDate(): ?string
    {
        return $this->modification_date;
    }
    public function getIdPresentation(): ?int
    {
        return $this->id_presentation;
    }
    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setIdComment(?int $id_comment): void
    {
        $this->id_comment = $id_comment;
    }
    public function setText(?string $text): void
    {
        $this->text = $text;
    }
    public function setCreationDate(?string $creation_date): void
    {
        $this->creation_date = $creation_date;
    }
    public function setModificationDate(?string $modification_date): void
    {
        $this->modification_date = $modification_date;
    }
    public function setIdPresentation(?int $id_presentation): void
    {
        $this->id_presentation = $id_presentation;
    }
    public function setIdUser(?int $id_user): void
    {
        $this->id_user = $id_user;
    }
}
