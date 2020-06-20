<?php

namespace www\P4\model;

class Manager
{

    protected function dbConnect()
    {
        try {
            $db = new \PDO('mysql:host=localhost;dbname=blogp4;charset=utf8', 'root', 'admin');
            return $db;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
