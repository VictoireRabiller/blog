<?php
include '../services/tools.php';
include '../services/functions.php';

    if(empty($_POST))
    {
        // Validation de la query string dans l'URL.
        if(!array_key_exists('articleid', $_GET) OR !ctype_digit($_GET['articleid']))
        {
            header('Location: index.php');
            exit();
        }




        $db = getDb();
        $sql =
        '
            SELECT
                id,
                title,
                content
            FROM
                article
            WHERE
                id = ?
        ';
        $statement = $db->prepare($sql);
        $statement->execute([$_GET['articleid']]);
        $article = $statement->fetch();
    
    } else  {
    // Edition d'un article du blog.
       $db = getDb();

       $sql=
        '
            UPDATE
                article
            SET
                title = ?,
                content = ?
            WHERE
                id = ?
        ';
        $statement = $db->prepare($sql);
        $statement->execute([$_POST['title'], $_POST['content'], $_POST['articleid']]);

        // Retour au panneau d'administration.
        header('Location: admin.php');
        exit();
    }

    include "../views/edit.phtml";