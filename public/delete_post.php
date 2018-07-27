<?php

    // Validation de la query string dans l'URL.
    if(!array_key_exists('articleid', $_GET) OR !ctype_digit($_GET['articleid']))
    {
        header('Location: index.php');
        exit();
    }

include '../services/tools.php';
include '../services/functions.php';
  

    // Suppression d'un article du blog.
    
    $db = getDb();

    $sql =
    '
        DELETE FROM
            article
        WHERE
            id = ?
    ';
    $statement = $db->prepare($sql);
    $statement->execute([$_GET['articleid']]);

    // Redirection vers le panneau d'administration.
    header('Location: admin.php');
    exit();