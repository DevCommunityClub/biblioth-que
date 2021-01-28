<?php
require_once '../model/user.php';
require_once '../model/manager.php';

$user = new Utilisateur(array(
    'username'=> $_POST['username'],
    'password'=>$_POST['password'],
    'checkbox' => $_POST['checkbox']
));

$co = new manager();
$co->connexion($user);

