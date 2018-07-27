<?php
include '../services/tools.php';
include '../services/functions.php';

$article = [];

$article['title'] = $_POST['title'];
$article['content'] = $_POST['content'];
$article['category_id'] = $_POST['category_id'];
$article['author'] = $_POST['author'];

saveArticle($article);
// pre($article);
// exit;

header('Location: index.php');



