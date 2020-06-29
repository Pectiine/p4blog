<?php
include_once("./model/Comment.php");
function addComment()
{
    $comment = new Comment();
    $comment->setContent($_POST['comment']);
    $comment->setUser($_SESSION['user']);
    $comment->setPost($_POST['idPost']);

    $message = $comment->addComment();
    return $message;
}

function getCommentsByPost($idPost)
{
    $comment = new Comment();
    $listComments = $comment->getCommentsByPost($idPost);
    return $listComments;
}

function deleteComment($idComment)
{
    $comment = new Comment();
    $message = $comment->deleteComment($idComment);
    return $message;
}
