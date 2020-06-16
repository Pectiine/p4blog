<?php

 include 'function/main-functions.php';
$pages = scandir('pages /');
if (isset($_GET['page']) && !empty($_GET['page'])) {
    if (in_array($_GET['page'] . '.php', $pages)) {
        $page = $_GET['page'];
    } else {
        $page = "error";
    }
} else {
    $page = "home";
}
$pages_functions =scandir('function/');
if(in_array($page.'.func.php' ,$pages_functions)) {
    include 'function/'.$page.'.func.php'; 
}
?>
