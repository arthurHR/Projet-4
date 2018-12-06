<?php

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

    public function connect($pseudo, $password)
    {	
        $idAdmin = $this->hashPassword();
        $isPasswordCorrect = password_verify($password, $idAdmin['password']);
        if ($isPasswordCorrect)
        {
        	session_start();
        	$_SESSION['pseudo'] = $pseudo;
            $_SESSION['password'] = $password;
        	$this->listPosts(1);
        } else {
        	require('view/backend/login.php');    
        }
    }

    public function connected ()
    {
        session_start();
        $idAdmin = $this->hashPassword();
        $isPasswordCorrect = password_verify($_SESSION['password'], $idAdmin['password']);
        if ($isPasswordCorrect) {        
        }
        else {
            throw new Exception("Erreur : Vous n'avez pas le droit d'être ici");
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
        require('view/backend/updatePost.php');
    }

    public function saveUpdate($id, $title, $content)
    {
        $this->saveUpdatePost($id, $title, $content);
        $this->listPosts(1);
    }
    public function moderate()
    {
        $reportsComments = $this->getReportsComments();
        require('view/backend/moderate.php');
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
        header('Location: index.php?action=post&id=' . $postId);
    }
    public function addAnswer($id, $answer, $postId)
    {
        $this->saveAnswer($id, $answer);
        header('Location: index.php?action=post&id=' . $postId);
    }
    public function addAnswerModerate($id, $answer)
    {
        $this->saveAnswer($id, $answer);
        header('Location: index.php?action=moderateComments');
    }

}

?>