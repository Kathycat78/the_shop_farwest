<?php

namespace App\Models;

use PDO;
use Config\Database;


class User
{
    //? = si je te donne tu sera un int sinon tu sera null
    private ?int $id_user;
    private ?string $pseudo;
    private ?string $password;
    private ?string $email;
    private ?string $picture;
    private ?string $description;
    private ?string $creation_date;
    private ?int $id_role;

    public function __construct(?int $id_user, ?string $pseudo, ?string $password, ?string $email, ?string $picture, ?string $description, ?string $creation_date, ?int $id_role)
    {
        $this->id_user = $id_user;
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->email = $email;
        $this->picture = $picture;
        $this->description = $description;
        $this->creation_date = $creation_date;
        $this->id_role = $id_role;
    }

    public function saveUser()
    {
        $pdo = Database::getConnection();
        $sql = "INSERT INTO `user` (`pseudo`, `password`, `email`, `picture`, `description`, `creation_date`, `id_role`) VALUES (?,?,?,?,?,?,?)";
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->pseudo, $this->password, $this->email, $this->picture, $this->description, $this->creation_date, $this->id_role]);
    }

    public function getUserByEmail()
    {
        $pdo = Database::getConnection();
        $sql = "SELECT `id_user`, `pseudo`, `password`, `email`, `picture`, `description`, `creation_date`, `id_role` FROM `user` WHERE `email` = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$this->email]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if($result){
            return new User($result['id_user'], $result['pseudo'], $result['password'], $result['email'], $result['picture'], $result['description'], $result['creation_date'], $result['id_role']);
        }else{
            return false;
        }
    }

    public function getUserById()
    {
        $pdo = Database::getConnection();
        $sql = "SELECT `id_user`, `pseudo`, `id_role` FROM `user` WHERE `id_user` = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$this->id_user]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if($result){
            return new User($result['id_user'], $result['pseudo'], null, null, null, null, null,  $result['id_role']);
        }else{
            return false;
        }
    }

    //les get

    public function getIdUser(): int|string|null
    {
        return $this->id_user;
    }
    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }
    public function getPassword(): ?string
    {
        return $this->password;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function getpicture(): ?string
    {
        return $this->picture;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function getCreationDate() : ?string
    {
        return $this->creation_date;
    }
    public function getIdRole() : int|null|string
    {
        return $this->id_role;
    }

    //Les set
    public function setIdUser (int $id_user): void
    {
        $this->id_user = $id_user;
    }
    public function setPseudo (string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }
    public function setPassword (string $password): void
    {
        $this->password = $password;
    }
    public function setEmail (string $email): void
    {
        $this->email = $email;
    }
    public function setPicture (string $picture): void
    {
        $this->picture = $picture;
    }
    public function setDescription (string $description): void
    {
        $this->description = $description;
    }
    public function setCreationDate (string $creation_date): void
    {
        $this->creation_date = $creation_date;
    }
    public function setIdRole (int $id_role): void
    {
        $this->id_role = $id_role;
    }


}