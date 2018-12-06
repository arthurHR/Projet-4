<?php
require('controller/frontend.php');
require('controller/backend.php');

$user = new controlFront();
$admin = new controlBack();

if (isset($_GET['action'])) {
    /// user ///
    switch ($_GET['action']) {
        case 'listPosts':
            if(isset($_GET['page'])){
                $user->listPosts($_GET['page']);
            } 
            else {
                $user->listPosts(1); 
            }
            break;
        case 'post':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $user->post(($_GET['id']));
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
            break;
        case 'nextPost':
            if (isset($_GET['id'])) {
                $user->nextPost(($_GET['id']));
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
            break;
        case 'previousPost':
            if (isset($_GET['id'])) {
                $user->previousPost(($_GET['id']));
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
            break;
        case 'addComment':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                
                    $user->addComment($_GET['id'], $_POST['author'], $_POST['email'], $_POST['comment']);
              }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
            break;
        case 'reportComment':
            if (isset($_GET['id']) && isset($_GET['post'])) {
                $user->reportComment($_GET['id'] , $_GET['post']);
            } 
            else {
            echo 'Erreur : aucun identifiant de billet envoyé';
            }
            break;

////////////////---Admin---/////////////////////

        case 'login':
            require('view/backend/login.php');    
            break; 
        case 'admin':
            if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
                $admin->connect($_POST['pseudo'], $_POST['password']);
            }
            else {
                echo 'Erreur : veuillez remplir tous les champs';
            }
            break;
        case 'deconnexion':
            $admin->connected();
            $_SESSION = array();
            session_destroy();
            $user->listPosts(1);
            break;
        case 'addPost':
            $admin->connected();
            require('view/backend/addPost.php');
            break;
        case 'createPost':
            $admin->connected();
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                $admin->createPost($_POST['title'], $_POST['content']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
            break;
        case 'deletPost':
            $admin->connected();
            if (isset($_GET['id'])) {
                $admin->deletPost($_GET['id']);
            } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
            }
            break;
        case 'updatePost':
            $admin->connected();
            if (isset($_GET['id'])) {
            $admin->updatePost($_GET['id']);
            } 
            else {
            echo 'Erreur : aucun identifiant de billet envoyé';
            }
            break;
        case 'saveUpdate':
            $admin->connected(); 
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                $admin->saveUpdate($_GET['id'], $_POST['title'], $_POST['content']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
            break;
        case 'moderateComments':
            $admin->connected(); 
            $admin->moderate();
            break;
        case 'deleteReportComment':
            $admin->connected();
            if (isset($_GET['id'])) {
                $admin->deleteReportComment($_GET['id']);
            } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
            } 
            break;
        case 'cancelReport':
            $admin->connected();
            if (isset($_GET['id'])) {
                $admin->cancelReport($_GET['id']);
            } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
            } 
            break;
        case 'deleteComment':
            $admin->connected();
            if (isset($_GET['id']) && isset($_GET['post'])) {
                $admin->deleteComments($_GET['id'], $_GET['post']);
            } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
            } 
            break;
        case 'answerComment':
            $admin->connected();
            if (isset($_GET['id']) && isset($_GET['post']) && !empty($_POST['answer'])) {        
                $admin->addAnswer($_GET['id'], $_POST['answer'], $_GET['post']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
            break;
        case 'answerCommentModerate':
            $admin->connected();
            if (isset($_GET['id']) && !empty($_POST['answer'])) {        
                $admin->addAnswerModerate($_GET['id'], $_POST['answer'], $_GET['post']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
            break;
        default:
            $user->listPosts(1);
              break;
        }
}
else {
    $user->homePage();
}

    


