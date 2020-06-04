<?php
require('Manager.php');

class postManager extends Manager
{
    public function getPosts()
    {   
        $connection=$this->dbConnect();
        $query = $connection->query('SELECT id, title, content, author, creationDate FROM post ORDER BY id DESC');
        $result=$query->fetchAll();
        
        return $result;
    }
}
