<?php

require_once 'Manager.php';

class commentManager extends Manager
{
    public function getComments($postId)
    {
        $connection=$this->dbConnect();
        $query = $connection->query('SELECT id, author, comment, comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $query->execute(array($postId));
        $result=$query->fetchAll();

        return $result;
    }

}