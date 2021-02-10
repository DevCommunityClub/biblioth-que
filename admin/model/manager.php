<?php

require_once 'user.php';
require_once 'bdd.php';
require_once 'Functions.php';

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

        if($donne['role'] = 1){
            header("Location: ..//register.php");
        }
        else{

        }

    }

    public function Inscription(Utilisateur $user){

        $bdd = new bdd();
        $Functions = new Functions();

        $req=$bdd->getStart()->prepare('SELECT * FROM users WHERE username = :username OR mail = :mail');
        $req->execute(array(
            'username'=>$user->getUsername(),
            'mail'=>$user->getMail()
        ));

        $donne = $req->fetch();

        if ($donne){
            $Functions->setDonne($donne);
        }

        $Functions->Errors($user);

        if (empty($_SESSION['errors'])){
            $req1=$bdd->getStart()->prepare('INSERT INTO users(username, nom, prenom, password, mail, role) VALUES(:username, :nom, :prenom, :password, :mail, :role)');

            $pass_hache = password_hash($user->getPassword(), PASSWORD_DEFAULT);

            $req1->execute(array(
                'username'=>$user->getUsername(),
                'nom'=>$user->getNom(),
                'prenom'=>$user->getPrenom(),
                'password'=> $pass_hache,
                'mail'=>$user->getMail(),
                'role'=>$user->getRole()
            ));

            $Functions->Mail_ins($user);

            $r=$bdd->getStart()->prepare('SELECT id From users WHERE username = :username');
            $r->execute(array(
                'username' => $user->getUsername()
            ));

            $res = $r->fetch();
            $user->setId($res);

            $_SESSION['username'] = $user->getUsername();
            $_SESSION['id'] = $user->getId();

            header("Location: ../index.php");

        }
        else{
            header("Location: ../views/register.php");
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