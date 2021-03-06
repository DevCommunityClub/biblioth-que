<?php

// ici vous retrouverez toutes les fonctionnalité en rapport avec le fonctionnement du site en lui même

require_once 'user.php';
require_once 'bdd.php';

class Functions
{
    private $donne;
    private $req;
    private $id;

    public function Errors(Utilisateur $user){ // Fonction qui permet une gestion d'erreur au moment du login et du register
        session_start();

        if (!empty($this->getDonne())) {
            $_SESSION['errors'][0] = "Votre Username/Mail est déjà utilisé";
        }

        if (empty($user->getNom()) || !preg_match('/^[a-zA-Z0-9_]+$/', $user->getNom())) {
            $_SESSION['errors'][1] = "Votre nom n'est pas alphanumérique";
        }

        if (empty($user->getPrenom()) || !preg_match('/^[a-zA-Z0-9_]+$/', $user->getPrenom())) {
            $_SESSION['errors'][2] = "Votre prenom n'est pas alphanumérique";
        }

        if (empty($user->getUsername()) || !preg_match('/^[a-zA-Z0-9_]+$/', $user->getUsername())) {
            $_SESSION['errors'][3] = "Votre pseudo n'est pas alphanumérique";
        }

        if (empty($user->getMail() || !filter_var($user->getMail(), FILTER_VALIDATE_EMAIL))) {
            $_SESSION['errors'][4] = "Votre mail n'est pas valide";
        }

        if (empty($user->getPassword()) || $user->getPassword() != $user->getRepassword()) {
            $_SESSION['errors'][5] = "Votre mot de passe n'est pas valide";
        }
    }

    public function setDonne($donne)
    {
        $this->donne = $donne;
    }

    public function getDonne()
    {
        return $this->donne;
    }

    public function setReq($req)
    {
        $this->req = $req;
    }

    public function getReq()
    {
        return $this->req;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function fetch_media_info() // fonction qui affiche la page-reservation.php isole le media que l'on souhaite reserver
    {
        $bdd = new bdd();

        $req=$bdd->getStart()->prepare('SELECT * FROM media WHERE id = :id');
        $req->execute(array(
            'id'=>$this->getId()
        ));
        $donne = $req->fetch();
        $this->setReq($donne);

    }

    public function fetch_user(){ // fonction qui affiche tout les utilisateur utiliser sur la page admin.php
        $bdd = new bdd();

        $req=$bdd->getStart()->prepare('SELECT * FROM users ');
        $req->execute();
        $donne = $req->fetchAll();
        $this->setReq($donne);
    }

    public function reservation(array $param){ // fonction qui réalise une réservation selon les dates que l'utisateur selectionne présent dans page-réservation.php
        $bdd = new bdd();

        $req=$bdd->getStart()->prepare('UPDATE media SET Date_emprunt = :Date_emprunt, Date_rendu = :Date_rendu WHERE id = :id');
        $req->execute(array(
            'id' => $param['id'],
            'Date_emprunt' => $param['Date_emprunt'],
            'Date_rendu' => $param['Date_rendu']
        ));
    }

    public function fetch_media(){ // fonction qui affiche tout les médias de la bdd présent dans réservation.php
        $bdd = new bdd();

        $req=$bdd->getStart()->prepare('SELECT * FROM media');
        $req->execute();
        $donne = $req->fetchAll();
        $this->setReq($donne);
    }

    public function recherche(string $search){ // Fonction de recherche qui récupère dans la bdd les médias selon la recherche de l'utilisateur (Non fonctionnel)
        $bdd = new bdd();

            $search = htmlspecialchars($search); //pour sécuriser le formulaire contre les intrusions html
            $search = '%'.$search.'%';

            if (!empty($search))
            {
                $req = $bdd->getStart()->prepare("SELECT * FROM media WHERE Titre LIKE :search OR Auteur LIKE :search OR Type LIKE :search");
                $req->execute(array(
                    'search' => $search
                ));

                $donne = $req->fetchAll();
                $this->setReq($donne);
            }
            else
            {
                $donne = "Vous devez entrer votre requete dans la barre de recherche";
                $this->setReq($donne);
            }
        }

    public function Mail_Contact(Utilisateur $user) // fonction qui permet de faire fonctionner le formulaire de contact (Non fonctionnel)
    {
        // Replace contact@example.com with your real receiving email address
        $receiving_email_address = '';

        if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
            include($php_email_form);
        } else {
            die('Unable to load the "PHP Email Form" Library!');
        }

        $contact = new PHP_Email_Form;
        $contact->ajax = true;

        $contact->to = $receiving_email_address;
        $contact->from_name = $_POST['name'];
        $contact->from_email = $_POST['email'];
        $contact->subject = $_POST['subject'];

        // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials

        $contact->smtp = array(
          'host' => '',
          'username' => '',
          'password' => '',
          'port' => ''
        );

        $contact->add_message($_POST['name'], 'From');
        $contact->add_message($_POST['email'], 'Email');
        $contact->add_message($_POST['message'], 'Message', 10);

        echo $contact->send();
    }
}
