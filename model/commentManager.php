<?php

require_once 'Manager.php';

class commentManager extends Manager
{
    public function getComments($postId)
    {
        $connection=$this->dbConnect();
        $statement = $connection->prepare('SELECT author, comment, comment_date FROM comments WHERE post_id = :id ORDER BY comment_date DESC');
        $statement->execute(['id'=>$postId]);
        $commentsArray = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $commentsArray;
    }

}