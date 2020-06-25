<?php
// session_start();

namespace App\src\controller;

class BackController extends Controller
{
    public function addChapter($post)
        {
            if(isset($post['submit'])) {
            $chapterDAO = new ChapterDAO();
            $chapterDAO->addChapter($post);
            header('Location: index.php');
            }
            require 'templates/backend/addChapter.php';
        }

}

// if (isset($_POST['password'])) { 
//     if ($_POST['password'] == 'blogp4') {
//         $_SESSION['connecte'] = true;
//     }
//     else {
//         $_SESSION['connecte'] = false;
//         echo "mauvais mot de passe";
//     }
// }


// if (!isset($_SESSION['connecte']) or $_SESSION['connecte'] == false) { 
// // 
//      <p>Vous n'êtes pas connecté, veuillez taper le mot de passe</p>
//      <form action="backend.php" method="post">
//      <input type='password' name='password'/>
//      <input type="submit"/>
//      </form>
//  <?php

// }

// else { 
//     echo "Vous êtes connecté.";
// }