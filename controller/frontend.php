<?php

require_once('model/modelFront.php');

class controlFront extends modelFront
{
	public function homePage()
	{
		$idMax = $this->selectIdMax();
		$post = $this->getPost($idMax);
		require('view/frontend/homeView.php');
	}

	public function listPosts($currentPage)
	{
		
	    $posts = $this->getPosts($currentPage);
	    $nbOfPosts = $this->numberOfPosts();
	    require('view/frontend/listPostView.php');
	}

	public function post($id)
	{
	    $post = $this->getPost($id);
	    $comments = $this->getComments($id);

	    require('view/frontend/postView.php');
	} 

	public function previousPost($id)
	{
		$idMax = $this->selectIdMax();
		$idMin = $this->selectIdMin();
		if ($id < $idMin + 1)
		{
			$this->post($idMax);
		} else {
			$postId = $this->getPreviousId($id);
			$this->post($postId);
		}
	}  

	public function nextPost($id)
	{
		$idMax = $this->selectIdMax();
		$idMin = $this->selectIdMin();
		if ($id > $idMax - 1)
		{
			$this->post($idMin);
		} else {
			$postId = $this->getnextId($id);
			$this->post($postId);
		}
	} 


	public function addComment($postId, $author, $email, $comment)
	{
	    $affectedLines = $this->postComment($postId, $author, $email, $comment);

	    if ($affectedLines === false) {
	        die('Impossible d\'ajouter le commentaire !');
	    }
	    else {
	       $this->post($postId);
	    }
	}

	public function reportComment($id, $postId)
    {
        $this->saveReport($id);
        $this->post($postId);
    }
}
?>