<?php

include_once("../model/Comment.php");

function deleteComment($idComment){
    $comment = new Comment();
    $message = $comment->deleteComment($idComment);
    return $message;
}

function allComments(){
    $comment = new Comment();
    $listComments = $comment->allComments();
    return $listComments;
}

function allCommentsReported(){
    $comment = new Comment();
    $listCommentsReported = $comment->allCommentsReported();
    return $listCommentsReported;
}

function getCountCommentByPost($id){
    $comment = new Comment();
    $nbComment = $comment->getCountCommentByPostId($id);
    return $nbComment;
}

function getCommentById($id){
    $comment = new Comment();
    $oneComment = $comment->getCommentById($id);
    return $oneComment;
}
