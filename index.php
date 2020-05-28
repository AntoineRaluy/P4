<?php
require_once('Database.php');
require('view/frontend/listPostsView.php');

$db = new Database();
echo $db->dbConnect();