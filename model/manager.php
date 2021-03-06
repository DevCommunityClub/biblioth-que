<?php

require_once 'user.php';
require_once 'bdd.php';
require_once 'Functions.php';


class manager
{

    public function Connexion(Utilisateur $user){

        $bdd = new bdd();

        $req=$bdd->getStart()->prepare('SELECT * FROM users WHERE username = :username');
        $req->execute(array(
            'username'=>$user->getUsername()
        ));

        $resultat = $req->fetch();

        $isPasswordCorrect =  password_verify($user->getPassword(), $resultat['password']);

        if (!$resultat)
        {
            $_SESSION['errors'][0] = "Utilisateur n'existe pas";
            header("Location: ../views/login.php");
        }
        else
        {
            if ($isPasswordCorrect) {
                session_start();
                $_SESSION['id'] = $donne['id'];
                $_SESSION['username'] = $donne['username'];
                $_SESSION['role'] = $donne['role'];
                if($donne['role'] == 1){
                    header("Location: ../admin.php ");
                }
                elseif($donne['role'] == 2){
                    header("Location: ../index.php ");
                }
            }
            else {
                $_SESSION['errors'][1] = "Mauvais identifiant ou mot de passe !";
                header("Location: ../views/login.php");
            }
        }
    }

    public function Inscription(Utilisateur $user){

        session_start();

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
            $req1=$bdd->getStart()->prepare('INSERT INTO users (username, nom, prenom, password, mail, role) VALUES (:username, :nom, :prenom, :password, :mail, :role)');

            $pass_hache = password_hash($user->getPassword(), PASSWORD_DEFAULT);

            $req1->execute(array(
                'username'=>$user->getUsername(),
                'nom'=>$user->getNom(),
                'prenom'=>$user->getPrenom(),
                'password'=> $pass_hache,
                'mail'=>$user->getMail(),
                'role'=>(int)$user->getRole()
            ));


            //$Functions->Mail_ins($user);

            $_SESSION['username'] = $user->getUsername();
            $_SESSION['role'] = $user->getRole();

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