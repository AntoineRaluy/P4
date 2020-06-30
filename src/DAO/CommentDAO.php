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
        $this->createQuery($sql, [$chapterId, $author, $comment]);
    }

    public function reportComment($commentId)
    {
        $sql = 'UPDATE comments SET flag = ? WHERE id = ?';
        $this->createQuery($sql, [1, $commentId]);
    }

    public function deleteComment($commentId)
    {
        $sql = 'DELETE FROM comments WHERE id = ?';
        $this->createQuery($sql, [$commentId]);
    }
}