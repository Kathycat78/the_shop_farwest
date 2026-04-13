<?php

namespace Config;

use PDO;
use Exception;

class Database
{
    static function getConnection()
    {
        try {
            // Connexion à la base
            $pdo = new PDO(
                "mysql:host=database;dbname=the_shop_farwestndb;charset=utf8",
                "root",
                "admin"
            );
            //echo "Connexion réussie ✅";


        } catch (Exception $e) {
            // Gestion d'erreur
            die("Erreur de connexion ❌ : " . $e->getMessage());
        };
        return $pdo;
    }
}
