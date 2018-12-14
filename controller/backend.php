<?php ob_start();
require_once('model/frontend/modelFront.php');
require_once('model/backend/modelBack.php');

class controlBack extends modelBack 
{
    public function login()
    {
        require('view/backend/login.php');
    }

    public function listPosts($currentPage)
    {
    	$user = new modelFront();
        $posts = $user->getPosts($currentPage);
        $nbOfPosts = $user->numberOfPosts();
        require('view/frontend/listPostView.php');
    }

    public function post($id)
    {
        $user = new modelFront();
        $post = $user->getPost($id);
        $comments = $user->getComments($id);
        require('view/frontend/postView.php');
    }

    public function connect($pseudo, $password)
    {	
        $idAdmin = $this->hashPassword();
        $isPasswordCorrect = password_verify($password, $idAdmin['password']);
        if ($isPasswordCorrect && $idAdmin['pseudo'] == $pseudo)
        {
        	$_SESSION['pseudo'] = $pseudo;
            $_SESSION['password'] = $password;
        	$this->listPosts(1);
        } else {
        	require('view/backend/loginView.php');    
        }
    }

    public function connected ()
    {
        $idAdmin = $this->hashPassword();
        $isPasswordCorrect = password_verify($_SESSION['password'], $idAdmin['password']);
        if ($isPasswordCorrect) { 
        }
        else {
            header('Location: http://s736369307.onlinehome.fr/Projet_4/index.php?action=login');
            exit;   
        }
    }

    public function createPost($title, $content)
    {
        $this->savePost($title, $content);
        $this->listPosts(1);
    }

    public function deletPost($id)
    {
        $this->delete($id);
        $this->listPosts(1);
    }

    public function updatePost($id)
    {
        $user = new modelFront();
        $post = $user->getPost($id);
        require('view/backend/updatePostView.php');
    }

    public function saveUpdate($id, $title, $content)
    {
        $this->saveUpdatePost($id, $title, $content);
        $this->listPosts(1);
    }
    public function moderate()
    {
        $reportsComments = $this->getReportsComments();
        require('view/backend/moderateView.php');
    }
    public function deleteReportComment($id)
    {
        $this->deleteComment($id);
        $this->moderate();
    }
    public function cancelReport($id)
    {
        $this->deleteReport($id);
        $this->moderate();
    }

    public function deleteComments($id, $postId)
    {
        $this->deleteComment($id);
        $this->post($postId);
    }
    public function addAnswer($id, $answer, $postId)
    {
        $this->saveAnswer($id, $answer);
        $this->post($postId);
    }
    public function addAnswerModerate($id, $answer)
    {
        $this->saveAnswer($id, $answer);
        $this->moderate();
    }

} ?>