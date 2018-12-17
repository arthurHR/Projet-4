<?php

require_once('connectMySQL.php');

class modelFront extends connectBD {
    
    protected $db;

    public function __construct ()
    {
        $this->db = $this->dbConnect();
    }

    public function getPosts($page)
    {
        $pageNumber = $page -1;
        $postsPerPage = (int) 5; 
        $limit_min = (int) $pageNumber * $postsPerPage;  
        $posts = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT :v1, :v2');
        $posts->bindValue(':v1', $limit_min, PDO::PARAM_INT);
        $posts->bindValue(':v2', $postsPerPage, PDO::PARAM_INT);
        $posts->execute();
        return $posts;
    }

    public function numberOfPosts()
    { 
        $req = $this->db->query("SELECT  COUNT(*) as nbPosts FROM posts" );
        $donnees = $req->fetch();
        return $donnees['nbPosts'];

    }

    public function selectIdMax()
    { 
        $req = $this->db->query("SELECT  MAX(id) as maxID FROM posts" );
        $donnees = $req->fetch();
        return $donnees['maxID'];
    }

    public function selectIdMin()
    { 
        $req = $this->db->query("SELECT  MIN(id) as minID FROM posts" );
        $donnees = $req->fetch();
        return $donnees['minID'];
    }


    public function getPost($postId)
    {        
        $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;            
    }

    public function getPreviousId($postId)
    {        
        $req = $this->db->prepare('SELECT id FROM posts  WHERE id < :v1 ORDER BY id DESC LIMIT  1');
        $req->bindValue(':v1', $postId, PDO::PARAM_INT);
        $req->execute();
        $donnees = $req->fetch();
        return $donnees['id'];            
    }

    public function getnextId($postId)
    {        
        $req = $this->db->prepare('SELECT id FROM posts  WHERE id > :v1 ORDER BY id LIMIT  1');
        $req->bindValue(':v1', $postId, PDO::PARAM_INT);
        $req->execute();
        $donnees = $req->fetch();
        return $donnees['id'];            
    }


    public function getComments($postId)
    {
        $comments = $this->db->prepare('SELECT id, author, comment, post_id, reply, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        return $comments;
    }

    public function postComment($postId, $author, $email, $comment)
    {
        $comments = $this->db->prepare('INSERT INTO comments(post_id, author, email, comment, report, comment_date) VALUES(?, ?, ?, ?, FALSE, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $email, $comment));

        return $affectedLines;
    }

    public function saveReport($id)
    {
        $report = $this->db->prepare('UPDATE comments SET report = TRUE WHERE id = ?');
        $report->execute(array($id));
    }

}

?>