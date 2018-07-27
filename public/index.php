<?php
include '../services/tools.php';
include '../services/functions.php';


$articlesList = getArticles();
// pre($articlesList);



include "../views/index.phtml";