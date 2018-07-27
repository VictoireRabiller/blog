<?php

include '../services/tools.php';
include '../services/functions.php';

    addComment();
    
    // Retour à l'article détaillé une fois que le nouveau commentaire a été ajouté.
    header('Location: show_post.php?articleid='.$_POST['articleid']);
    exit();