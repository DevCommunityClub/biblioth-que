<?php

require_once 'user.php';
require_once 'bdd.php';

class Functions
{
    private $donne;
    private $req;

    public function Errors(Utilisateur $user){
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

    public function fetch_user(){
        $bdd = new bdd();

        $req=$bdd->getStart()->prepare('SELECT * FROM users ');
        $req->execute();
        $donne = $req->fetchAll();
        if ($donne){
            $this->setReq($donne);
        }
    }

    public function fetch_media(){
        $bdd = new bdd();

        $req=$bdd->getStart()->prepare('SELECT * FROM media ');
        $req->execute();
        $donne = $req->fetchAll();
        if ($donne){
            $this->setReq($donne);
        }
    }

    public function Mail_Contact(Utilisateur $user)
    {
        // Replace contact@example.com with your real receiving email address
        $receiving_email_address = 'devcomclub@yahoo.com';

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
          'host' => 'smtp.mail.yahoo.com',
          'username' => 'devcomclub@yahoo.com',
          'password' => 'ysMNA4hnQ9Hj',
          'port' => '587'
        );

        $contact->add_message($_POST['name'], 'From');
        $contact->add_message($_POST['email'], 'Email');
        $contact->add_message($_POST['message'], 'Message', 10);

        echo $contact->send();
    }
}