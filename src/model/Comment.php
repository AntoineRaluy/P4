<?php

namespace App\src\model;

class Comment
{
    private $id;
    private $chapterId;
    private $author;
    private $comment;
    private $commentDate;
    private $flag;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getChapterId()
    {
        return $this->chapterId;
    }

    public function setChapterId($chapterId)
    {
        $this->chapterId = $chapterId;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function getCommentDate()
    {
        return $this->commentDate;
    }

    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;
    }

    public function getFlag(): int
    {
        return $this->flag;
    }

    public function setFlag($flag)
    {
        $this->flag = $flag;
    }
}