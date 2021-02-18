<?php

require_once 'user.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'assets/vendor/phpmailer/src/Exception.php';
require 'assets/vendor/phpmailer/src/PHPMailer.php';
require 'assets/vendor/phpmailer/src/SMTP.php';

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

    public function Mail_ins(Utilisateur $user){

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 2;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.mail.yahoo.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'devcomclub@yahoo.com';                     // SMTP username
            $mail->Password   = 'wkplhzdoualkpxbw';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('devcomclub@yahoo.com', 'Bibliothèque de Dugny');
            $mail->addAddress($user->getMail(), $user->getUsername());     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'La Bibliothèque de dugny vous remercie de votre inscription';
            $mail->Body = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                
                <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
                <head>
                <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
                <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
                <meta content="width=device-width" name="viewport"/>
                <!--[if !mso]><!-->
                <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
                <!--<![endif]-->
                <title></title>
                <!--[if !mso]><!-->
                <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet" type="text/css"/>
                <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css"/>
                <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css"/>
                <!--<![endif]-->
                <style type="text/css">
                        body {
                            margin: 0;
                            padding: 0;
                        }
                
                        table,
                        td,
                        tr {
                            vertical-align: top;
                            border-collapse: collapse;
                        }
                
                        * {
                            line-height: inherit;
                        }
                
                        a[x-apple-data-detectors=true] {
                            color: inherit !important;
                            text-decoration: none !important;
                        }
                    </style>
                <style id="media-query" type="text/css">
                        @media (max-width: 670px) {
                
                            .block-grid,
                            .col {
                                min-width: 320px !important;
                                max-width: 100% !important;
                                display: block !important;
                            }
                
                            .block-grid {
                                width: 100% !important;
                            }
                
                            .col {
                                width: 100% !important;
                            }
                
                            .col_cont {
                                margin: 0 auto;
                            }
                
                            img.fullwidth,
                            img.fullwidthOnMobile {
                                max-width: 100% !important;
                            }
                
                            .no-stack .col {
                                min-width: 0 !important;
                                display: table-cell !important;
                            }
                
                            .no-stack.two-up .col {
                                width: 50% !important;
                            }
                
                            .no-stack .col.num2 {
                                width: 16.6% !important;
                            }
                
                            .no-stack .col.num3 {
                                width: 25% !important;
                            }
                
                            .no-stack .col.num4 {
                                width: 33% !important;
                            }
                
                            .no-stack .col.num5 {
                                width: 41.6% !important;
                            }
                
                            .no-stack .col.num6 {
                                width: 50% !important;
                            }
                
                            .no-stack .col.num7 {
                                width: 58.3% !important;
                            }
                
                            .no-stack .col.num8 {
                                width: 66.6% !important;
                            }
                
                            .no-stack .col.num9 {
                                width: 75% !important;
                            }
                
                            .no-stack .col.num10 {
                                width: 83.3% !important;
                            }
                
                            .video-block {
                                max-width: none !important;
                            }
                
                            .mobile_hide {
                                min-height: 0px;
                                max-height: 0px;
                                max-width: 0px;
                                display: none;
                                overflow: hidden;
                                font-size: 0px;
                            }
                
                            .desktop_hide {
                                display: block !important;
                                max-height: none !important;
                            }
                        }
                    </style>
                <style id="icon-media-query" type="text/css">
                        @media (max-width: 670px) {
                            .icons-inner {
                                text-align: center;
                            }
                
                            .icons-inner td {
                                margin: 0 auto;
                            }
                        }
                    </style>
                </head>
                <body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;">
                <!--[if IE]><div class="ie-browser"><![endif]-->
                <table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;" valign="top" width="100%">
                <tbody>
                <tr style="vertical-align: top;" valign="top">
                <td style="word-break: break-word; vertical-align: top;" valign="top">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#FFFFFF"><![endif]-->
                <div style="background-color:#eeeeee;">
                <div class="block-grid" style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #353434;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:#353434;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#eeeeee;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:650px"><tr class="layout-full-width" style="background-color:#353434"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="650" style="background-color:#353434;width:650px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="min-width: 320px; max-width: 650px; display: table-cell; vertical-align: top; width: 650px;">
                <div class="col_cont" style="width:100% !important;">
                <!--[if (!mso)&(!IE)]><!-->
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                <!--<![endif]-->
                <div align="center" class="img-container center autowidth" style="padding-right: 0px;padding-left: 0px;">
                <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><a href="http://mediatheques.drancydugnylebourget.fr/" style="outline:none" tabindex="-1" target="_blank"><img align="center" border="0" class="center autowidth" src="images/logo-01.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 150px; display: block;" width="150"/></a>
                <!--[if mso]></td></tr></table><![endif]-->
                </div>
                <!--[if (!mso)&(!IE)]><!-->
                </div>
                <!--<![endif]-->
                </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                </div>
                </div>
                </div>
                <div style="background-color:#eeeeee;">
                <div class="block-grid" style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #201f1f;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:#201f1f;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#eeeeee;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:650px"><tr class="layout-full-width" style="background-color:#201f1f"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="650" style="background-color:#201f1f;width:650px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="min-width: 320px; max-width: 650px; display: table-cell; vertical-align: top; width: 650px;">
                <div class="col_cont" style="width:100% !important;">
                <!--[if (!mso)&(!IE)]><!-->
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                <!--<![endif]-->
                <table cellpadding="0" cellspacing="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top" width="100%">
                <tr style="vertical-align: top;" valign="top">
                <td align="center" style="word-break: break-word; vertical-align: top; padding-bottom: 0px; padding-left: 0px; padding-right: 0px; padding-top: 0px; text-align: center; width: 100%;" valign="top" width="100%">
                <h1 style="color:#555555;direction:ltr;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:23px;font-weight:normal;line-height:120%;text-align:center;margin-top:0;margin-bottom:0;"></h1>
                </td>
                </tr>
                </table>
                <table cellpadding="0" cellspacing="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top" width="100%">
                <tr style="vertical-align: top;" valign="top">
                <td align="center" style="word-break: break-word; vertical-align: top; padding-bottom: 0px; padding-left: 0px; padding-right: 0px; padding-top: 0px; text-align: center; width: 100%;" valign="top" width="100%">
                <h1 style="color:#555555;direction:ltr;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:31px;font-weight:normal;line-height:120%;text-align:center;margin-top:0;margin-bottom:0;"><strong><em><span style="color: #ffffff;">Bibliothèque de Dugny</span></em></strong></h1>
                </td>
                </tr>
                </table>
                <table cellpadding="0" cellspacing="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top" width="100%">
                <tr style="vertical-align: top;" valign="top">
                <td align="center" style="word-break: break-word; vertical-align: top; padding-bottom: 0px; padding-left: 0px; padding-right: 0px; padding-top: 0px; text-align: center; width: 100%;" valign="top" width="100%">
                <h1 style="color:#555555;direction:ltr;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:23px;font-weight:normal;line-height:120%;text-align:center;margin-top:0;margin-bottom:0;"></h1>
                </td>
                </tr>
                </table>
                <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                <div style="color:#555555;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                <div class="txtTinyMce-wrapper" style="line-height: 1.5; font-size: 12px; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; color: #555555; mso-line-height-alt: 18px;">
                <p style="line-height: 1.5; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; word-break: break-word; mso-line-height-alt: 18px; margin: 0;"><em><strong><span style="font-size: 16px; color: #ffffff;">Mr.'.$user->getNom().''.$user->getPrenom().',</span></strong></em></p>
                <p style="line-height: 1.5; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; word-break: break-word; mso-line-height-alt: 18px; margin: 0;"> </p>
                <p style="line-height: 1.5; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; word-break: break-word; mso-line-height-alt: 18px; margin: 0;"><em><strong><span style="font-size: 16px; color: #ffffff;">Merci de vous être inscrit sur le site de la Bibliothèque de la ville de Dugny.</span></strong></em></p>
                <p style="line-height: 1.5; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; word-break: break-word; mso-line-height-alt: 18px; margin: 0;"><br/><em><strong><span style="font-size: 16px; color: #ffffff;">Nous sommes ravis de votre participation à la vie communautaire de la ville dorénavant, vous aurez accès au service de réservation de la bibliothèque de Dugny comprenant une large gamme de Livre, CD ou Film.</span></strong></em></p>
                </div>
                </div>
                <!--[if mso]></td></tr></table><![endif]-->
                <table cellpadding="0" cellspacing="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top" width="100%">
                <tr style="vertical-align: top;" valign="top">
                <td align="center" style="word-break: break-word; vertical-align: top; padding-bottom: 0px; padding-left: 0px; padding-right: 0px; padding-top: 0px; text-align: center; width: 100%;" valign="top" width="100%">
                <h1 style="color:#555555;direction:ltr;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:23px;font-weight:normal;line-height:120%;text-align:center;margin-top:0;margin-bottom:0;"></h1>
                </td>
                </tr>
                </table>
                <!--[if (!mso)&(!IE)]><!-->
                </div>
                <!--<![endif]-->
                </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                </div>
                </div>
                </div>
                <div style="background-color:#eeeeee;">
                <div class="block-grid" style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #353434;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:#353434;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#eeeeee;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:650px"><tr class="layout-full-width" style="background-color:#353434"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="650" style="background-color:#353434;width:650px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="min-width: 320px; max-width: 650px; display: table-cell; vertical-align: top; width: 650px;">
                <div class="col_cont" style="width:100% !important;">
                <!--[if (!mso)&(!IE)]><!-->
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                <!--<![endif]-->
                <table cellpadding="0" cellspacing="0" class="social_icons" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top" width="100%">
                <tbody>
                <tr style="vertical-align: top;" valign="top">
                <td style="word-break: break-word; vertical-align: top; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                <table align="center" cellpadding="0" cellspacing="0" class="social_table" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;" valign="top">
                <tbody>
                <tr align="center" style="vertical-align: top; display: inline-block; text-align: center;" valign="top">
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 2.5px; padding-left: 2.5px;" valign="top"><a href="https://www.facebook.com/Mediatheque.Anne.Frank" target="_blank"><img alt="Facebook" height="32" src="images/facebook2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="Facebook" width="32"/></a></td>
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 2.5px; padding-left: 2.5px;" valign="top"><a href="https://twitter.com/share?url=http%3A%2F%2Fmediatheques.drancydugnylebourget.fr%2F%3Ffbclid%3DIwAR1h-75cAeFNwrp4Lc3g4RyN9ecaCV4XpDZUIKnDMQjettvWNZXI1a1Yhe0&amp;text=M%C3%A9diath%C3%A8ques%20-%20Drancy%2C%20Dugny%2C%20Le%20Bourget%20-%20Accueil" target="_blank"><img alt="Twitter" height="32" src="images/twitter2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="Twitter" width="32"/></a></td>
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 2.5px; padding-left: 2.5px;" valign="top"><a href="https://www.tumblr.com/login?redirect_to=https%3A%2F%2Fwww.tumblr.com%2Fwidgets%2Fshare%2Ftool%3FshareSource%3Dlegacy%26canonicalUrl%3D%26url%3Dhttp%253A%252F%252Fmediatheques.drancydugnylebourget.fr%252F%253Ffbclid%253DIwAR1h-75cAeFNwrp4Lc3g4RyN9ecaCV4XpDZUIKnDMQjettvWNZXI1a1Yhe0" target="_blank"><img alt="Tumblr" height="32" src="images/tumblr2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="Tumblr" width="32"/></a></td>
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 2.5px; padding-left: 2.5px;" valign="top"><a href="https://www.pinterest.fr/pin/create/button/?url=http%3A%2F%2Fmediatheques.drancydugnylebourget.fr%2F%3Ffbclid%3DIwAR1h-75cAeFNwrp4Lc3g4RyN9ecaCV4XpDZUIKnDMQjettvWNZXI1a1Yhe0&amp;media=&amp;description=" target="_blank"><img alt="Pinterest" height="32" src="images/pinterest2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="Pinterest" width="32"/></a></td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                </tbody>
                </table>
                <!--[if (!mso)&(!IE)]><!-->
                </div>
                <!--<![endif]-->
                </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                </div>
                </div>
                </div>
                <div style="background-color:transparent;">
                <div class="block-grid" style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:650px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="650" style="background-color:transparent;width:650px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="min-width: 320px; max-width: 650px; display: table-cell; vertical-align: top; width: 650px;">
                <div class="col_cont" style="width:100% !important;">
                <!--[if (!mso)&(!IE)]><!-->
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                <!--<![endif]-->
                <table cellpadding="0" cellspacing="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top" width="100%">
                <tr style="vertical-align: top;" valign="top">
                <td align="center" style="word-break: break-word; vertical-align: top; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; text-align: center;" valign="top">
                <!--[if vml]><table align="left" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]-->
                <!--[if !vml]><!-->
                <table cellpadding="0" cellspacing="0" class="icons-inner" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block; margin-right: -4px; padding-left: 0px; padding-right: 0px;" valign="top">
                <!--<![endif]-->
                </table>
                </td>
                </tr>
                </table>
                <!--[if (!mso)&(!IE)]><!-->
                </div>
                <!--<![endif]-->
                </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                </div>
                </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                </td>
                </tr>
                </tbody>
                </table>
                <!--[if (IE)]></div><![endif]-->
                </body>
                </html>';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

}