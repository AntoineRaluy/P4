<?php require('model/Post.php');

$post = new Post();
$posts = $post->getPosts();

while($post=$posts->fetch())
{?>
    <div>
        <h2><?= htmlspecialchars($post['title']);?></h2>
        <p><?= htmlspecialchars($post['content']);?></p>
        <p><?= htmlspecialchars($post['author']);?></p>
        <p>Créé le : <?= htmlspecialchars($post['creationDate']);?></p>
    </div>
    <br>
<?php
}
$articles->closeCursor();
?>
</div>
  
<?php 
require('template.php');