<?php

namespace App\src\DAO;

use PDO;
use Exception;

abstract class DAO 
{   
    private $connection;

    private function checkConnection()
    {
        if($this->connection === null) {
            return $this->dbConnect();
        }
        return $this->connection;
    }

    private function dbConnect() // connexion à la BDD
    {
        try {
            $this->connection = new PDO(DB_HOST,DB_USER,DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        }
        
        catch(Exception $errorConnection) {
            die ('Erreur de connexion :' . $errorConnection->getMessage());
        }
    }

    protected function createQuery($sql, $parameters = null) // gestion des requêtes préparées
    {
        if($parameters)
        {
            $result = $this->checkConnection()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->checkConnection()->query($sql);
        return $result;
    }
}