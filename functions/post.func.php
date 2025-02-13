<?php

function get_posts(){
    
    global $db;
    
    $req = $db->query("
        SELECT posts.id,
                posts.title,
                posts.image,
                posts.date,
                posts.content,
                admins.name
        FROM posts
        JOIN admins
        ON posts.writer = admins.email
        WHERE posts.id = '{$_GET['id']}'
        AND posts.posted = '1'
    ");

    $results = $req->fetchObject();
    return $results;
}

function comment($name, $email, $comment){
    
    global $db;
    
    $c = array(
        'name' => $name,
        'email' => $email,
        'comment' => $comment,
        'post_id' => $_GET['id']
    );

    $sql = "INSERT INTO comments (name, email, comment, post_id, date) VALUES (:name, :email, :comment, :post_id, NOW())";
    $req = $db->prepare($sql);
    $req->execute($c);
}

function get_comments(){
        
    global $db;
    
    $req = $db->query("
        SELECT *
        FROM comments
        WHERE post_id = '{$_GET['id']}'
        ORDER BY date DESC
    ");

    $results = [];
    while ($rows = $req->fetchObject()){
        $results[] = $rows;
    }
    return $results;
}

?>