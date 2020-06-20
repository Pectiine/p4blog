<?php
session_start();
require('controller/controller.php');
require('controller/PostController.php');

$postsController = new www\P4\controller\PostController();

if (isset($_GET['action'])) {

    switch ($_GET['action']) {
        case 'index':
            $postsController->index();
            break;

        case 'post':
            if (isset($_GET['post']) && $_GET['post'] > 0) {
                $postsController->post($_GET['post']);
            } else {
                echo 'Erreur : Aucun identifiant de post envoyé';
            }
            break;
        case 'posts':
            $postsController->posts();
            break;
        case 'add_post':
            $postsController->addPost();
            break;
        case 'formAddPost':
            if (!empty($_POST['title_post']) && !empty($_POST['text_post'])) {
                $postsController->formAddPost($_POST['title_post'], $_SESSION['username'], $_POST['text_post']);
            } else {
                echo "Erreur : tous les champs ne sont pas remplis !";
            }
            break;
        case 'deletePost':
            if (isset($_GET['post']) && $_GET['post'] > 0) {
                $postsController->deletePost($_GET['post']);
            } else {
                echo 'Erreur : Aucun identifiant de post envoyé';
            }
            break;
        case 'updatePost':
            if (isset($_GET['post']) && $_GET['post'] > 0) {
                $postsController->updatePost($_GET['post']);
            } else {
                echo 'Erreur : Aucun identifiant de post envoyé';
            }
            break;
        case 'formUpdatePost':
            if (isset($_GET['post']) && $_GET['post'] > 0) {
                if (!empty($_POST['title_post']) && !empty($_POST['text_post'])) {
                    $postsController->formUpdatePost($_GET['post'], $_POST['title_post'], $_POST['text_post']);
                } else {
                    echo "Erreur : tous les champs ne sont pas remplis !";
                }
            } else {
                echo 'Erreur : Aucun identifiant de post envoyé';
            }
            break;

        case 'addComment':
            if (isset($_GET['post']) && $_GET['post'] > 0) {
                if (!empty($_POST['username']) && !empty($_POST['text_comment'])) {
                    addComment($_GET['post'], $_POST['username'], $_POST['text_comment']);
                } else {
                    echo "Erreur : tous les champs ne sont pas remplis !";
                }
            } else {
                echo "Erreur : aucun identifiant de billet envoyé";
            }
            break;
        case 'deleteComment':
            if (isset($_GET['post']) && $_GET['post'] > 0 && isset($_GET['comment']) && $_GET['comment'] > 0) {
                deleteComment($_GET['post'], $_GET['comment']);
            } else {
                echo 'Erreur : Aucun identifiant de post ou de commentaire envoyé';
            }
            break;

        case 'report_comment':
            report_comment();
            break;
        case 'form_report':
            form_report();
            break;

        case 'management':
            management();
            break;

        case 'connect':
            connect();
            break;
        case 'formConnect':
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                formConnect();
            } else {
                echo "Erreur : tous les champs ne sont pas remplis !";
            }
            break;
        case 'disconnect':
            disconnect();
            break;
    }
} else {
    $postsController->index();
}
