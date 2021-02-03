<?php

require_once '../model/user.php';
require_once '../model/manager.php';

if (empty($_POST['checkbox'])){
    $_POST['checkbox'] = 'off';
}

$user = new Utilisateur(array(
    'username'=> $_POST['username'],
    'password'=>$_POST['password'],
    'checkbox' => $_POST['checkbox']
    ));

$co = new manager();
$co->Connexion($user);
