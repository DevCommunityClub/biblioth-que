<?php

require_once 'user.php';
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//use PHPMailer\PHPMailer\SMTP;

//require_once '/assets/vendor/phpmailer/src/Exception.php';
//require_once '/assets/vendor/phpmailer/src/PHPMailer.php';
//require_once '/assets/vendor/phpmailer/src/SMTP.php';

// Load Composer's autoloader
require '../assets/vendor/autoload.php';

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

    public function fetch_user(){

        $this->req=$bdd->getStart()->exec('SELECT * From users');

        return $this->req;
    }

    //public function Mail_ins(Utilisateur $user){

     //   $mail = new PHPMailer(true);

       // try {
            //Server settings
         //   $mail->SMTPDebug = 2;                      // Enable verbose debug output
          //  $mail->isSMTP();                                            // Send using SMTP
            //$mail->Host       = 'smtp.mail.yahoo.com';                    // Set the SMTP server to send through
            //$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            //$mail->Username   = 'devcomclub@yahoo.com';                     // SMTP username
            //$mail->Password   = 'wkplhzdoualkpxbw';                               // SMTP password
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            //$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            //$mail->setFrom('devcomclub@yahoo.com', 'Bibliothèque de Dugny');
            //$mail->addAddress($user->getMail(), $user->getUsername());     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            //$mail->isHTML(true);                                  // Set email format to HTML
            //$mail->Subject = 'La Bibliothèque de dugny vous remercie de votre inscription';

            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            //$mail->send();
            //echo 'Message has been sent';
       // }
        //catch (Exception $e) {
         //   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
       // }
    //}

}