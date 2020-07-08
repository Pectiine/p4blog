<?php

session_start();
ob_start();
include("../model/BddConnect.php");
include_once("controller/PostController.php");
include_once("controller/UserController.php");
include_once("controller/CommentController.php");
include_once("controller/ReportController.php");

$CommentController = new CommentController();
$PostController = new PostController();
$ReportController = new ReportController();
$UserController = new UserController();

if (!isset($_SESSION['user'])) {
    header('location:../index.php');
    exit();
} else {
    $userLogin = $UserController->verifLogin($_SESSION['user']);

    if ($userLogin->getRole() == 'lecteur') {
        header('location:../index.php');
        exit();
    } else {

        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = '';
        }


        switch ($action) {
            case 'accueil':
                $title = "Blog Jean Forteroche - Tableau de bord - Accueil";
                $vue = "view/accueil.php";
                break;
            case 'logOut':
                $_SESSION = array();

                if (ini_get("session.use_cookies")) {
                    $params = session_get_cookie_params();
                    setcookie(
                        session_name(),
                        '',
                        time() - 42000,
                        $params["path"],
                        $params["domain"],
                        $params["secure"],
                        $params["httponly"]
                    );
                }

                session_destroy();

                header('location:../index.php');
                exit();
                break;
            case 'addPost':
                $title = "Blog Jean Forteroche - Tableau de bord - Publication d'un chapitre";
                $vue = "view/addPost.php";
                break;
            case 'addPostBdd':
                if (isset($_POST['title']) && !empty($_POST['title'])) {
                    $message = $PostController->addPost();
                } else {
                    $message = "Veuillez renseigner un titre !";
                }
                $title = "Blog Jean Forteroche - Tableau de bord - Publication d'un chapitre";
                $vue = "view/addPost.php";
                break;
            case 'updatePostBdd':
                $id = $_GET['id'];
                if (isset($_POST['title']) && !empty($_POST['title'])) {
                    $message = $PostController->updatePost($id);
                } else {
                    $message = "Veuillez renseigner un titre !";
                }
                $post = $PostController->getOnePost($id);
                $title = "Blog Jean Forteroche - Tableau de bord - Édition d'un chapitre";
                $vue = "view/editPost.php";
                break;
            case 'allPosts':
                $listPosts = $PostController->getAllPosts();
                $title = "Blog Jean Forteroche - Tableau de bord - Tous les chapitres";
                $vue = "view/allPosts.php";
                break;
            case 'editPost':
                $post = $PostController->getOnePost($_GET['id']);
                $title = "Blog Jean Forteroche - Tableau de bord - Édition d'un chapitre";
                $vue = "view/editPost.php";
                break;
            case 'deletePost':
                $message = $PostController->deletePost($_GET['id']);
                $listPosts = $PostController->getAllPosts();
                $title = "Blog Jean Forteroche - Tableau de bord - Tous les chapitres";
                $vue = "view/allPosts.php";
                break;
            case 'allComments':
                $listComments = $CommentController->allComments();
                $title = "Blog Jean Forteroche - Tableau de bord - Tous les commentaires";
                $vue = "view/allComments.php";
                break;
            case 'deleteComment':
                $message = $CommentController->deleteComment($_GET['id']);
                $listComments = $CommentController->allComments();
                $title = "Blog Jean Forteroche - Tableau de bord - Tous les commentaires";
                $vue = "view/allComments.php";
                break;
            case 'allCommentsReported':
                $listCommentsReported = $CommentController->allCommentsReported();
                $title = "Blog Jean Forteroche - Tableau de bord - Tous les commentaires signalés";
                $vue = "view/allCommentsReported.php";
                break;
            case 'viewReport':
                $comment = $CommentController->getCommentById($_GET["id"]);
                $listReport = $ReportController->getReportByIdComment($_GET['id']);
                $title = "Blog Jean Forteroche - Tableau de bord - Signalement(s) d'un commentaire";
                $vue = "view/viewReport.php";
                break;
            case 'deleteReport':
                $message = $ReportController->deleteAllReport($_GET["id"]);
                $listCommentsReported = $CommentController->allCommentsReported();
                $title = "Blog Jean Forteroche - Tableau de bord - Tous les commentaires signalés";
                $vue = "view/allCommentsReported.php";
                break;

            default:
                $title = "Blog Jean Forteroche - Tableau de bord - Accueuil";
                $vue = 'view/accueil.php';
        }
    }


    include_once("layout/layout.php");
}

ob_end_flush();
