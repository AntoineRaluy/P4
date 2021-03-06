<?php

namespace App\src\DAO;

use App\src\model\Comment;

class CommentDAO extends DAO
{
    private function buildComment($field)
    {
        $comment = new Comment();
        $comment->setId($field['id']);
        $comment->setChapterId($field['post_id']);
        $comment->setAuthor($field['author']);
        $comment->setComment($field['comment']);
        $comment->setCommentDate($field['comment_date']);
        $comment->setFlag($field['flag']);
        return $comment;
    }

    public function getComments($chapterId)
    {
        $sql = 'SELECT id, post_id, author, comment, date_format(comment_date, "%d/%m/%Y à %H:%i") as comment_date, flag FROM comments WHERE post_id = ? ORDER BY comment_date DESC';
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
        $sql = 'INSERT INTO comments (post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())';
        $this->createQuery($sql, [$chapterId, $author, $comment]);
    }

    public function reportComment($commentId)
    {
        $sql = 'UPDATE comments SET flag = ? WHERE id = ?';
        $this->createQuery($sql, [1, $commentId]);
    }

    public function checkComment($commentId)
    {
        $sql = 'UPDATE comments SET flag = ? WHERE id = ?';
        $this->createQuery($sql, [0, $commentId]);
    }

    public function deleteComment($commentId)
    {
        $sql = 'DELETE FROM comments WHERE id = ?';
        $this->createQuery($sql, [$commentId]);
    }

    public function getReportedComments()
    {
        $sql = 'SELECT id, post_id, author, comment, date_format(comment_date, "%d/%m/%Y") as comment_date, flag FROM comments WHERE flag = ? ORDER BY comment_date DESC';
        $commentFields = $this->createQuery($sql, [1]);
        $comments = [];
        foreach ($commentFields as $field) {
            $commentId = $field['id'];
            $comments[$commentId] = $this->buildComment($field);
        }
        return $comments;
    }
}