<?php

namespace App\src\DAO;

use App\src\model\Chapter;

class ChapterDAO extends DAO
{   
    private function buildChapter($field)
    {
        $chapter = new Chapter();
        $chapter->setId($field['id']);
        $chapter->setTitle($field['title']);
        $chapter->setContent($field['content']);
        $chapter->setCreationDate($field['creationDate']);
        return $chapter;
    }

    public function getChapters()
    {   
        $sql = 'SELECT id, title, content, date_format(creationDate, "%d/%m/%Y") as creationDate FROM post ORDER BY id DESC';
        $chapterFields = $this->createQuery($sql);
        $chapters = [];
        foreach ($chapterFields as $field){
            $chapterId = $field['id'];
            $chapters[$chapterId] = $this->buildChapter($field);
        }
        return $chapters;
    }
    
    public function getChapter($chapterId)
    {
        $sql = 'SELECT id, title, content, date_format(creationDate, "%d/%m/%Y") as creationDate FROM post WHERE id = ?';
        $chapters = $this->createQuery($sql,[$chapterId]);
        $chapter = $chapters->fetch(); 
        return $this->buildChapter($chapter);
    }

    public function addChapter($newChapter)
    {
        extract($newChapter);
        var_dump($newChapter);
        $sql = 'INSERT INTO post (title, content, creationDate) VALUES (:title, :content, NOW())';
        $this->createQuery($sql, [
            'title' => $newChapter['title'], 
            'content' => $newChapter['content']
        ]);
    }

    public function editChapter($editedChapter, $chapterId)
    {
        $sql = 'UPDATE post SET title=:title, content=:content WHERE id=:chapterId';
        $this->createQuery($sql, [
            'title' => $editedChapter['title'], 
            'content' => $editedChapter['content'], 
            'chapterId' => $_GET['chapterId']
        ]);
    }

    public function deleteChapter($chapterId)
    {   
        $sql = 'DELETE FROM comments WHERE post_id = ?';
        $this->createQuery($sql, [$chapterId]);
        $sql = 'DELETE FROM post WHERE id = ?';
        $this->createQuery($sql, [$chapterId]);
    }
}