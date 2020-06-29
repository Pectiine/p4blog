<?php

class Comment
{
    private $connect;
    protected $id;
    protected $content;
    protected $dateComment;
    protected $answer;
    protected $user;
    protected $post;

    public function __construct()
    {
        $db = BddConnect::getInstance();
        $this->connect = $db->getDbh();
    }

    public function addComment()
    {
        try {
            $req = $this->connect->prepare("INSERT INTO comment (content, dateComment, id_user, id_post) VALUES (:content, NOW(), :user, :post)");
            $req->bindParam(":content", $this->content, PDO::PARAM_STR);
            $req->bindParam(":user", $this->user, PDO::PARAM_INT);
            $req->bindParam(":post", $this->post, PDO::PARAM_INT);
            $req->execute();
            $message = "Votre commentaire a bien été posté !";
            return $message;
        } catch (PDOException $e) {
            return "Votre commentaire n'a pas été posté, en voici la raison : " . $e->getMessage();
        }
    }

    public function deleteComment($id)
    {
        try {
            $req = $this->connect->prepare("DELETE FROM comment WHERE id = :id");
            $req->bindParam(":id", $id, PDO::PARAM_INT);
            $req->execute();
            $message = "Ce commentaire a bien été supprimé !";
            return $message;
        } catch (PDOException $e) {
            return "Ce commentaire n'a pas été supprimé, en voici la raison : " . $e->getMessage();
        }
    }

    public function allComments()
    {
        try {
            $req = $this->connect->prepare("SELECT id, content, dateComment, id_user, id_post FROM comment ORDER BY dateComment desc ");
            $req->setFetchMode(PDO::FETCH_OBJ);
            $req->execute();
            $listComments = array();
            while ($obj = $req->fetch()) {
                $comment = new Comment();
                $comment->setId($obj->id);
                $comment->setContent($obj->content);
                $comment->setDateComment($obj->dateComment);
                $user = new User();
                $comment->setUser($user->getUserById($obj->id_user));
                $post = new Post();
                $comment->setPost($post->getPost($obj->id_post));
                $listComments[] = $comment;
            }
            return $listComments;
        } catch (PDOException $e) {
            return "Cette requête n'a pas fonctionné, en voici la raison : " . $e->getMessage();
        }
    }

    public function allCommentsReported()
    {
        try {
            $req = $this->connect->prepare("SELECT c.id, c.content, c.dateComment, c.id_user, c.id_post, COUNT(r.id_comment) as nbReport FROM comment c INNER JOIN report r ON r.id_comment = c.id GROUP BY c.id ORDER BY nbReport desc ");
            $req->setFetchMode(PDO::FETCH_OBJ);
            $req->execute();
            $listCommentsReported = array();
            while ($obj = $req->fetch()) {
                $comment = new Comment();
                $comment->setId($obj->id);
                $comment->setContent($obj->content);
                $comment->setDateComment($obj->dateComment);
                $user = new User();
                $comment->setUser($user->getUserById($obj->id_user));
                $post = new Post();
                $comment->setPost($post->getPost($obj->id_post));
                $listCommentsReported[] = $comment;
            }
            return $listCommentsReported;
        } catch (PDOException $e) {
            return "Votre requête a échoué, en voici la raison : " . $e->getMessage();
        }
    }

    public function getCommentsByPost($idPost)
    {
        try {
            $req = $this->connect->prepare("SELECT id, content, dateComment, id_user, id_post FROM comment WHERE id_post = :idPost ORDER BY dateComment asc ");
            $req->bindParam(":idPost", $idPost, PDO::PARAM_INT);
            $req->setFetchMode(PDO::FETCH_OBJ);
            $req->execute();
            $listComments = array();
            while ($obj = $req->fetch()) {
                $comment = new Comment();
                $comment->setId($obj->id);
                $comment->setContent($obj->content);
                $comment->setDateComment($obj->dateComment);
                $user = new User();
                $comment->setUser($user->getUserById($obj->id_user));
                $post = new Post();
                $comment->setPost($post->getPost($obj->id_post));
                $listComments[] = $comment;
            }
            return $listComments;
        } catch (PDOException $e) {
            return "Votre requête a échoué, en voici la raison : " . $e->getMessage();
        }
    }

    public function getCountCommentByPostId($id)
    {
        try {
            $req = $this->connect->prepare("SELECT COUNT(id) FROM comment WHERE id_post = :id");
            $req->bindParam(":id", $id, PDO::PARAM_INT);
            $req->execute();
            $nbComment = $req->fetch();
            return $nbComment;
        } catch (PDOException $e) {
            return "Votre requête a échoué, en voici la raison : " . $e->getMessage();
        }
    }

    public function getCommentById($id)
    {
        try {
            $req = $this->connect->prepare("SELECT id, content, dateComment, id_user, id_post FROM comment WHERE id = :id");
            $req->bindParam(":id", $id, PDO::PARAM_INT);
            $req->setFetchMode(PDO::FETCH_OBJ);
            $req->execute();
            $comment = new Comment();
            while ($obj = $req->fetch()) {
                $comment->setId($obj->id);
                $comment->setContent($obj->content);
                $comment->setDateComment($obj->dateComment);
                $user = new User();
                $comment->setUser($user->getUserById($obj->id_user));
                $post = new Post();
                $comment->setPost($post->getPost($obj->id_post));
            }
            return $comment;
        } catch (PDOException $e) {
            return "Votre requête a échoué, en voici la raison : " . $e->getMessage();
        }
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getDateComment()
    {
        return $this->dateComment;
    }

    public function setDateComment($dateComment)
    {
        $this->dateComment = $dateComment;
        return $this;
    }

    public function getAnswer()
    {
        return $this->answer;
    }

    public function setAnswer($answer)
    {
        $this->answer = $answer;
        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    public function getPost()
    {
        return $this->post;
    }

    public function setPost($post)
    {
        $this->post = $post;
        return $this;
    }
}
