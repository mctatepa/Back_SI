<?php

    // Add a comment for a specific movie

    function addComment( $movieid, $author, $comment)
    {
        require('database.php');
        $req = $pdo->prepare('
            INSERT INTO 
                comments ( movieid, author, comment, date) 
            VALUES 
                ( :movieid, :author, :comment, NOW())
        ');
        $req->bindValue('movieid', $movieid);
        $req->bindValue('author', $author);
        $req->bindValue('comment', $comment);

        $execute = $req->execute();
    }

    // Take all the comments for a specific movie

    function getComments($movieid)
    {
        require('database.php');
        $req = $pdo->prepare('SELECT * FROM comments WHERE movieid = :movieid ORDER BY id DESC');
        $req->bindValue('movieid', $movieid);
        $req->execute();
        $data = $req->fetchAll();
        return $data;
    }