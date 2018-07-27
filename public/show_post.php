<?php
include '../services/tools.php';
include '../services/functions.php';


$article = getArticleById( $_GET['articleid'] ); 
// pre($article);



$commentsList = getComments();
// pre($articlesList);


include "../views/show_post.phtml";