<?php

namespace App\src\DAO;

use App\src\model\Comment;

class CommentDAO extends DAO
{
    private function buildComment($field)
    {
        $comment = new Comment();
        $comment->setId($field['id']);
        $comment->setAuthor($field['author']);
        $comment->setComment($field['comment']);
        $comment->setCommentDate($field['comment_date']);
        $comment->setFlag($field['flag']);
        return $comment;
    }

    public function getComments($chapterId)
    {
        $sql = 'SELECT id, author, comment, comment_date, flag FROM comments WHERE post_id = ? ORDER BY comment_date DESC';
        $commentFields = $this->createQuery($sql, [$chapterId]);
        $comments = [];
        foreach ($commentFields as $field){
            $commentId = $field['id'];
            $comments[$commentId] = $this->buildComment($field);
        }
        return $comments;
    }

    public function postComment($chapterId, $author, $comment)
    {
        $sql = 'INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())';
        $newComment = $this->createQuery($sql, [$postId, $author, $comment]);

        return $newComment;
    }

    public function reportComment($commentId)
    {
        $connection=$this->dbConnect();
        $update = $connection->prepare('UPDATE comments SET flag = 1 WHERE id = :id');
        $update->execute(['id'=>$commentId]);
    }

}