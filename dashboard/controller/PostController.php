<?php
include_once("../model/Post.php");

class PostController
{
    function addPost()
    {
        $post = new Post();
        $post->setTitle($_POST["title"]);
        $post->setContent($_POST["content"]);

        $message = $post->insertPost();
        return $message;
    }

    function updatePost($id)
    {
        $post = new Post();
        $post->setTitle($_POST["title"]);
        $post->setContent($_POST["content"]);

        $message = $post->updatePost($id);
        return $message;
    }

    function deletePost($id)
    {
        $post = new Post();
        $message = $post->deletePost($id);
        return $message;
    }

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

    function getCountPost()
    {
        $post = new Post();
        $nbPost = $post->getCountPost();
        return $nbPost;
    }
}
