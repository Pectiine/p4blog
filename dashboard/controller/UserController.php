<?php

include_once("../model/Role.php");
include_once("../model/user.php");

function verifLogin($id)
{
    $user = new User();
    $userLogin = $user->getUserById($id);
    return $userLogin;
}

function getCountUser()
{
    $user = new User();
    $nbUser = $user->getCountUser();
    return $nbUser;
}
