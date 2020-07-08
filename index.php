<?php
session_start();
ob_start();

include_once("model/BddConnect.php");
include_once("controller/PostController.php");
include_once("controller/UserController.php");
include_once("controller/ReportController.php");
include_once("controller/CommentController.php");

$CommentController = new CommentController();
$PostController = new PostController();


if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $listLastFivePosts = $PostController->getLastFivePosts();
    $title = "Blog de Jean Forteroche - Accueil";
    $vue = 'view/accueil.php';
}

if (isset($action)) {
    switch ($action) {
        case 'accueil':
            $listLastFivePosts = $PostController->getLastFivePosts();
            $title = "Blog de Jean Forteroche - Accueil";
            $vue = "view/accueil.php";
            break;
        case 'signIn':
            $title = "Blog de Jean Forteroche - Se connecter";
            $vue = "view/login.php";
            break;
        case 'signUp':
            $title = "Blog de Jean Forteroche - S'inscrire";
            $vue = "view/newUser.php";
            break;
        case 'dashboard':
            header('location:dashboard/index.php');
            exit;
            break;
        case 'addUser':
            $message = addUser();
            $title = "Blog de Jean Forteroche - S'inscrire";
            $vue = "view/newUser.php";
            break;
        case 'login':
            $userLogin = verifLogin();
            if (!$userLogin) {
                $message = "La combinaison identifiant et mot de passe est incorrect";
                $title = "Blog de Jean Forteroche - Se connecter";
                $vue = "view/login.php";
            } else if (is_string($userLogin)) {
                $message = $userLogin;
                $vue = "view/login.php";
            } else {
                $_SESSION["user"] = $userLogin->getId();

                if ($userLogin->getRole() == 'admin') {
                    header('location:dashboard/index.php');
                    exit;
                } else {
                    $listLastFivePosts = $PostController->getLastFivePosts();
                    $title = "Blog de Jean Forteroche - Accueil";
                    $vue = "view/accueil.php";
                }
            }
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
            $listLastFivePosts = $PostController->getLastFivePosts();
            $title = "Blog de Jean Forteroche - Accueil";
            $vue = "view/accueil.php";
            break;
        case 'allPosts':
            $listPosts = $PostController->getAllPosts();
            $title = "Blog de Jean Forteroche - Tous les billets";
            $vue = "view/allPosts.php";
            break;
        case 'post':
            if (isset($_GET['id'])) {
                $post = $PostController->getOnePost($_GET['id']);
                if (!empty($post->getId())) {
                    $listComments = $CommentController->getCommentsByPost($_GET['id']);
                    $title = "Blog de Jean Forteroche - " . $post->getTitle();
                    $vue = "view/post.php";
                } else {
                    $title = "Blog de Jean Forteroche - Erreur 404";
                    $vue = "view/error404.php";
                }
            } else {
                $title = "Blog de Jean Forteroche - Erreur 404";
                $vue = "view/error404.php";
            }
            break;
        case 'addComment':
            if (isset($_POST['comment']) && !empty($_POST['comment'])) {
                $message = $CommentController->addComment();
            } else {
                $message = "Veuillez mettre du texte dans votre commentaire !";
            }
            $post = $PostController->getOnePost($_POST['idPost']);
            $listComments = $CommentController->getCommentsByPost($_POST['idPost']);
            $title = "Blog de Jean Forteroche - " . $post->getTitle();
            $vue = "view/post.php";
            break;
        case 'deleteComment':
            $message = $CommentController->deleteComment($_GET['idComment']);
            $post = $PostController->getOnePost($_GET['idPost']);
            $listComments = $CommentController->getCommentsByPost($_GET['idPost']);
            $title = "Blog de Jean Forteroche - " . $post->getTitle();
            $vue = "view/post.php";
            break;
        case 'addReport':
            $message = addReport($_GET['id']);
            $post = $PostController->getOnePost($_GET['idPost']);
            $listComments = $CommentController->getCommentsByPost($_GET['idPost']);
            $title = "Blog de Jean Forteroche - " . $post->getTitle();
            $vue = "view/post.php";
            break;
        default:
            $title = "Blog de Jean Forteroche - Erreur 404";
            $vue = 'view/error404.php';
    }
}

include_once("layout/layout.php");
ob_end_flush();
