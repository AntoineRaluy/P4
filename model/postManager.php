<?php

require_once 'Manager.php';

class postManager extends Manager
{
    public function getPosts()
    {   
        $connection=$this->dbConnect();
        $query = $connection->query('SELECT id, title, content, author, creationDate FROM post ORDER BY id DESC');
        $result=$query->fetchAll();
        
        return $result;
    }

    public function getPost($postId)
    {
        $connection=$this->dbConnect();
        $statement = $connection->prepare('SELECT id, title, content, author, creationDate FROM post WHERE id = :id');
        $statement->execute(['id'=>$postId]);
        $postArray = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $postArray;
    }
}
