<?php

namespace App\Models;

use PDO;
use Config\Database;

class 
{
    private ?int $id_the_shop_farwest;
    private ?string $text;
    private ?string $creation_date;
    private ?string $modification_date;
    private ?string $picture;
    private ?int $like_reaction;
    private ?int $supports_reaction;
    private ?int $skeptical_reaction;
    private ?int $id_user;
    //private const PDO = Database::getConnection();

    public function __construct(?int $id_the_shop_farwest, ?string $text, ?string $creation_date, ?string $modification_date, ?string $picture, ?int $like_reaction, ?int $supports_reaction, ?int $skeptical_reaction, ?int $id_user)
    {
        $this->id_the_shop_farwest = $id_the_shop_farwest;
        $this->text = $text;
        $this->creation_date = $creation_date;
        $this->modification_date = $modification_date;
        $this->picture = $picture;
        $this->like_reaction = $like_reaction;
        $this->supports_reaction = $supports_reaction;
        $this->skeptical_reaction = $skeptical_reaction;
        $this->id_user = $id_user;
    }

    public function add()
    {
        $pdo = Database::getConnection();
        $sql = "INSERT INTO `the_shop_farwest` (`text`, `creation_date`, `picture`, `id_user`) VALUES (?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$this->text, $this->creation_date, $this->picture, $this->id_user]);
    }

    public function getThe_shop_farwestById()
    {
        $pdo = Database::getConnection();
        $sql = "SELECT `id_the_shop_farwest`, `text`, `creation_date`, `modification_date`, `picture`, `like_reaction`, `supports_reaction`, `skeptical_reaction`, `id_user` 
        FROM `` WHERE `id_the_shop_farwest`= ?";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->id_the_shop_farwest]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return new The_shop_farwest($result['id_the_shop_farwest'], $result["text"], $result["creation_date"], $result["modification_date"], $result["picture"], $result["like_reaction"], $result["supports_reaction"], $result["skeptical_reaction"], $result['id_user']);
        } else {
            return false;
        }
    }

    public function editThe_shop_farwest()
    {
        $pdo = Database::getConnection();
        $sql = "UPDATE `the_shop_farwest` SET `text` = ?, `modification_date` = ?, `picture` = ? WHERE `id_the_shop_farwest` = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$this->text, $this->modification_date, $this->picture, $this->id_the_shop_farwest]);
    }

    public function getIdThe_shop_farwest(): ?int
    {
        return $this->id_the_shop_farwest;
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
    public function getPicture(): ?string
    {
        return $this->picture;
    }
    public function getLikeReaction(): ?int
    {
        return $this->like_reaction;
    }
    public function getSupportsReaction(): ?int
    {
        return $this->supports_reaction;
    }
    public function getSkepticalReaction(): ?int
    {
        return $this->skeptical_reaction;
    }
    public function getUserId(): ?int
    {
        return $this->id_user;
    }
    public function setIdThe_shop_farwest(?int $id_the_shop_farwest): void
    {
        $this->id_the_shop_farwest = $id_the_shop_farwest;
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
    public function setPicture(?string $picture): void
    {
        $this->picture = $picture;
    }
    public function setLikeReaction(?int $like_reaction): void
    {
        $this->like_reaction = $like_reaction;
    }
    public function setSupportsReaction(?int $supports_reaction): void
    {
        $this->supports_reaction = $supports_reaction
    }
    public function setSkepticalReaction(?int $skeptical_reaction): void
    {
        $this->skeptical_reaction = $skeptical_reaction;
    }
    public function setUserId(?int $id_user): void
    {
        $this->id_user = $id_user;
    }
}
