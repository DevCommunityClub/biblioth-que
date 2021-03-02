<?php
    try
        {
        $bdd = new PDO("mysql:host=localhost;dbname=library", "root", "");
        $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(Exception $e)
            {
            die("Une érreur a été trouvé : " . $e->getMessage());
                }
                    $bdd->query("SET NAMES UTF8");

                    if (isset($_GET["search"]))
                    {
                        $_GET["search"] = htmlspecialchars($_GET["search"]);    //pour sécuriser le formulaire contre les intrusions html
                        $search = $_GET["search"];
                        $search = trim($search);                                  //pour supprimer les espaces dans la requête de l'internaute
                        $search = strip_tags($search);                            //pour supprimer les balises html dans la requête

                    if (isset($search))
                        {
                        $req = $bdd->prepare("SELECT * FROM media WHERE title LIKE ?");
                        $req->execute(array("%".$search."%", "%".$search."%"));
                        }
                    else
                        {
                        $message = "Vous devez entrer votre requete dans la barre de recherche";
                        }
    }

?>