<?php

require_once 'user.php';
require_once 'bdd.php';

class manager
{

    public function connexion(Utilisateur $user){

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
        }
        else{
            header("location : ../views/login.html");
        }

        if ($SESSION['id'] = '1' AND $SESSION['username'] = 'admin'){
            header("location : ../index.php");
        }
        else{
            header("location : ../../index.html");
        }

    }

    public function Ins(Utilisateur $user){

        $bdd = new bdd();

        $req=$bdd->getStart()->prepare('INSERT INTO user(nom, prenom, age, metier, pays) VALUES(:nom, :prenom, :age, :metier, :pays)');
       $a =  $req->execute(array(
            'nom'=>$user->getNom(),
            'prenom'=>$user->getPrenom(),
            'age'=>$user->getAge(),
            'metier'=>$user->getMetier(),
            'pays'=>$user->getPays()

        ));


        if($a){
            echo'ok';
        }
        else{
           echo 'nok';
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



        if($a){
            echo'ok';
        }
        else{
            'nok';
        }

    }

}