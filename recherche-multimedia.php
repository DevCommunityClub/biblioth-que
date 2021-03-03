<?php
    require_once 'bdd.php';
    $bdd = new bdd();

   if (isset($_GET["search"]))
   {
    $_GET["search"] = htmlspecialchars($_GET["search"]);    //pour sécuriser le formulaire contre les intrusions html
                        $search = $_GET["search"];
                        $search = trim($search);                                  //pour supprimer les espaces dans la requête de l'internaute
                        $search = strip_tags($search);                            //pour supprimer les balises html dans la requête

                    if (isset($search))
                        {
                        $req = $bdd->getStart()->prepare("SELECT * FROM media WHERE Titre LIKE ?");
                        $req->execute(array("%".$search."%"));
                        }
                    else
                        {
                        $message = "Vous devez entrer votre requete dans la barre de recherche";
                        }
    }

?>