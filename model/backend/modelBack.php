<?php

require_once('model/connectMySQL.php');

class modelBack extends connectBD {
    
    protected $db;

    public function __construct ()
    {
        $this->db = $this->dbConnect();
    }

    public function hashPassword()
    {
        $req = $this->db->prepare('SELECT id, pseudo, password FROM admin');
        $req->execute(array());
        $idAdmin = $req->fetch();
        return $idAdmin;
    }

    public function savePost($title, $content)
    {
        $post = $this->db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
        $post->execute(array($title, $content));    
    }

    public function delete($id)
    {
        $delete = $this->db->prepare('DELETE FROM posts WHERE id = ?');
        $delete->execute(array($id));    

    }

    public function saveUpdatePost($id, $title, $content)
    {
        $update = $this->db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $update->execute(array($title, $content, $id));    
    }

    public function getReportsComments()
    {
        $reportComments = $this->db->prepare('SELECT id, author, comment, post_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, reply FROM comments WHERE report = TRUE ORDER BY comment_date DESC');
        $reportComments->execute(array());

        return $reportComments;
    }
    public function deleteComment($id)
    {
        $delete = $this->db->prepare('DELETE FROM comments WHERE id = ?');
        $delete->execute(array($id));    

    }
    public function deleteReport($id)
    {
        $report = $this->db->prepare('UPDATE comments SET report = FALSE WHERE id = ?');
        $report->execute(array($id));
    }
    public function saveAnswer($id, $answer)
    {
        $reply = $this->db->prepare('UPDATE comments SET reply = ? WHERE id = ?');
        $reply->execute(array($answer, $id));    
    }

}

?>