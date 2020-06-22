<?php
include_once("./model/Post.php");
function getAllPosts()
{
    $post = new Post();
    $listPosts = $post->allPosts();

    return $listPosts;
}

function getOnePost($id)
{
    $post = new Post();
    $onePost = $post->getPost($id);

    return $onePost;
}

function getLastFivePosts()
{
    $post = new Post();
    $listLastFivePosts = $post->getLastFivePosts();

    return $listLastFivePosts;
}
