<?php

require_once 'user.php';
require_once 'bdd.php';

class manager
{

    public function Connexion(Utilisateur $user){

        $bdd = new bdd();

        $req=$bdd->getStart()->prepare('SELECT * FROM users WHERE username = :username OR mail = :username');
        $req->execute(array(
            'username'=>$user->getUsername()
        ));

        $donne = $req->fetch();

        $isPasswordCorrect = password_verify($user->getPassword(), $donne['password']);

        if(!empty($donne) AND !empty($isPasswordCorrect)){
            session_start();
            $SESSION['id'] = $donne['id'];
            $SESSION['username'] = $donne['username'];
            $SESSION['role'] = $donne['role'];
        }
    }

    public function Inscription(Utilisateur $user){

        session_start();
        $bdd = new bdd();

        $req=$bdd->getStart()->prepare('SELECT * FROM users WHERE username = :username OR mail = :mail');
        $req->execute(array(
            'username'=>$user->getUsername(),
            'mail'=>$user->getMail()
        ));

        $donne = $req->fetch();

        if ($donne){
            $_SESSION['errors']['user'] = "Votre Username/Mail est déjà utilisé";
        }

        if (empty($user->getUsername()) || !preg_match('/^[a-zA-Z0-9_]+$/', $user->getUsername())){
            $_SESSION['errors']['username'] =  "Votre pseudo n'est pas alphanumérique";
        }

        if (empty($user->getMail() || !filter_var($user->getMail(), FILTER_VALIDATE_EMAIL))){
            $_SESSION['errors']['mail'] = "Votre mail n'est pas valide";
        }

        if (empty($user->getPassword()) || $user->getPassword() != $user->getRepassword()){
            $_SESSION['errors']['password'] = "Votre mot de passe n'est pas valide";
        }

        if (empty($_SESSION['errors'])){
            $req1=$bdd->getStart()->prepare('INSERT INTO users(username, nom, prenom, password, mail, role) VALUES (:username, :nom, :prenom, :password, :mail, :role)');

            $pass_hache = password_hash($user->getPassword(), PASSWORD_DEFAULT);

            $req1->execute(array(
                'username'=>$user->getUsername(),
                'nom'=>$user->getNom(),
                'prenom'=>$user->getPrenom(),
                'password'=> $pass_hache,
                'mail'=>$user->getMail(),
                'role'=>$user->getRole()
            ));

        }
        else{
            header('location: ../views/register.php');
        }
    }

    public function Modif(Utilisateur $user){

        $bdd = new bdd();

        $req=$bdd->getStart()->prepare('UPDATE user SET prenom = :prenom, age = :age, metier=:metier, pays =:pays WHERE nom = :nom');
        $a = $req->execute(array(
            'nom'=>$user->getNom(),
            'prenom'=>$user->getPrenom(),
            'age'=>$user->getAge(),
            'metier'=>$user->getMetier(),
            'pays'=>$user->getPays()

        ));
    }

}