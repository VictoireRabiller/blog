<?php
include '../services/tools.php';
include '../services/functions.php';

$articlesList = getArticles();

include '../views/admin.phtml';