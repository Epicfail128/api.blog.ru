<?php


function getPosts ($connect) {
    $posts = mysqli_query($connect, "SELECT * FROM `posts`");

    $postsList = [];

    while($post = mysqli_fetch_assoc($posts)){
        $postsList[] = $post;
    }

    echo json_encode($postsList);
}

function getPost($connect, $id){
    $post = mysqli_query($connect, "SELECT * FROM `posts` WHERE `id` = '$id'");

    if(mysqli_num_rows($post) === 0){
        http_response_code(404);
        $res = [
          "status" => false,
          "massage" => "Post not found"
        ];
        echo json_encode($res);
    } else {
        $post = mysqli_fetch_assoc($post);
        echo json_encode($post);
    }
}

function addPost($connect, $data){

}