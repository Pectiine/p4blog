<?php

class Role
{
    private $connect;
    protected $id;
    protected $role;

    public function __construct()
    {
        $db = BddConnect::getInstance();
        $this->connect = $db->getDbh();
    }
    public function getRoleById($id)
    {
        try {
            $req = $this->connect->prepare("SELECT id, role FROM role WHERE id = :id");
            $req->setFetchMode(PDO::FETCH_OBJ);
            $req->bindParam(":id", $id, PDO::PARAM_INT);
            $req->execute();
            $role = new Role();
            while ($obj = $req->fetch()) {
                $role->setId($obj->id);
                $role->setRole($obj->role);
            }
            return $role;
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

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }
}
