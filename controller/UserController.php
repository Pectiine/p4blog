<?php
include_once("./model/Role.php");
include_once("./model/user.php");



    function verifLogin()
    {
        $user = new User();
        $userLogin = $user->getUser($_POST["identifiant"], $_POST["password"]);
        return $userLogin;
    }

    function verifLoginById($id)
    {
        $user = new User();
        $userLogin = $user->getUserById($id);
        return $userLogin;
    }

    function addUser()
    {
        $user = new User();
        $user->setLastName($_POST['lastName']);
        $user->setFirstName($_POST['firstName']);
        $user->setIdentifiant($_POST['identifiant']);
        $user->setPassword($_POST['password']);
        $user->setMail($_POST['mail']);

        $message = $user->addUser();
        return $message;
    }

