<?php

class User
{
    private $connect;
    protected $id;
    protected $lastName;
    protected $firstName;
    protected $identifiant;
    protected $password;
    protected $mail;
    protected $role;

    public function __construct()
    {
        $db = BddConnect::getInstance();
        $this->connect = $db->getDbh();
    }


    public function addUser()
    {
        try {
            $req = $this->connect->prepare("INSERT INTO user (lastName, firstName, identifiant, password, mail, id_role) VALUES (:lastName, :firstName, :identifiant, :password, :mail, 1)");

            $options = [
                'cost' => 11,
                'salt' => random_bytes(22)
            ];
            $password = password_hash($this->password, PASSWORD_BCRYPT, $options);

            $req->bindParam(":lastName", $this->lastName, PDO::PARAM_STR);
            $req->bindParam(":firstName", $this->firstName, PDO::PARAM_STR);
            $req->bindParam(":identifiant", $this->identifiant, PDO::PARAM_STR);
            $req->bindParam(":password", $password, PDO::PARAM_STR);
            $req->bindParam(":mail", $this->mail, PDO::PARAM_STR);
            $req->execute();
            $message = "Vous êtes bien inscrit sur les nouvelles de Jean FORTEROCHE!";
            return $message;
        } catch (PDOException $e) {
            return "Votre inscription a échoué, en voici la raison : " . $e->getMessage();
        }
    }

    public function getUser($identifiant, $password)
    {
        try {
            $req = $this->connect->prepare("SELECT id, lastName, firstName, identifiant, password, mail, id_role FROM user WHERE identifiant = :identifiant");

            $req->bindParam(":identifiant", $identifiant, PDO::PARAM_STR);
            $req->execute();
            $req->setFetchMode(PDO::FETCH_OBJ);
            $obj = $req->fetch();
            if (empty($obj)) {
                return null;
            } else {
                if (password_verify($password, $obj->password)) {
                    $user = new User();
                    $user->setId($obj->id);
                    $user->setLastName($obj->lastName);
                    $user->setFirstName($obj->firstName);
                    $user->setIdentifiant($obj->identifiant);
                    $user->setPassword($obj->password);
                    $user->setMail($obj->mail);
                    $role = new Role();
                    $userRole = $role->getRoleById($obj->id_role);
                    $user->setRole($userRole->getRole());

                    return $user;
                } else {
                    return 'Le mot de passe est invalide :(';
                }
            }
        } catch (PDOException $e) {
            return "Votre requête a échoué, en voici la raison : " . $e->getMessage();
        }
    }


    public function getUserById($id)
    {
        try {
            $req = $this->connect->prepare("SELECT id, lastName, firstName, identifiant, mail, id_role FROM user WHERE id = :id");

            $req->bindParam(":id", $id, PDO::PARAM_INT);
            $req->execute();
            $req->setFetchMode(PDO::FETCH_OBJ);
            $obj = $req->fetch();
            if (empty($obj)) {
                return null;
            } else {
                $user = new User();
                $user->setId($obj->id);
                $user->setLastName($obj->lastName);
                $user->setFirstName($obj->firstName);
                $user->setIdentifiant($obj->identifiant);
                $user->setMail($obj->mail);
                $role = new Role();
                $userRole = $role->getRoleById($obj->id_role);
                $user->setRole($userRole->getRole());

                return $user;
            }
        } catch (PDOException $e) {
            return "Votre requête a échoué, en voici la raison : " . $e->getMessage();
        }
    }

    public function getCountUser()
    {
        try {
            $req = $this->connect->prepare("SELECT COUNT(id) FROM user WHERE id_role != 2 ");
            $req->execute();
            $nbUser = $req->fetch();
            return $nbUser;
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
    }

    public function getLastName()
    {
        return $this->lastName;
    }
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getIdentifiant()
    {
        return $this->identifiant;
    }
    public function setIdentifiant($identifiant)
    {
        $this->identifiant = $identifiant;
    }


    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }


    public function getMail()
    {
        return $this->mail;
    }
    public function setMail($mail)
    {
        $this->mail = $mail;
    }


    public function getRole()
    {
        return $this->role;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }
}
