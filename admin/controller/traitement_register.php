<?php

require_once '../model/user.php';
require_once '../model/manager.php';

$user = new Utilisateur(array(
    'nom' => htmlspecialchars($_POST['nom']),
    'prenom' => htmlspecialchars($_POST['prenom']),
    'username' => htmlspecialchars($_POST['username']),
    'mail' => htmlspecialchars($_POST['mail']),
    'password' => htmlspecialchars($_POST['password']),
    'repassword' => htmlspecialchars($_POST['repassword']),
    'role' => 2
));

$co = new manager();
$co->Inscription($user);


