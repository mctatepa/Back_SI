<?php 
    if(!empty($_POST))
    {
        extract($_POST);
        $errors = array();

        $author = strip_tags($author);
        $comment = strip_tags($comment);

        if(empty($author))
        {
            array_push($errors, 'Missing pseudo');
        }
        if(empty($comment))
        {
            array_push($errors, 'Missing comment');
        }
        if(count($errors) == 0)
        {
            // fonction pour créer le commentaire dans la bdd
            $comment = addComment($movieid, $author, $comment);

            $succes = 'Your comment has been published';

            $_POST['author'] = '';
            $_POST['comment'] = '';
        }
    }