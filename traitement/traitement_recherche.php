<?php

    require_once '../model/Functions.php'

    try{
        $recherche = new Functions(array(
            
            'titre'=>$_POST['titre'],
            'Auteur'=>$_POST['Auteur'],
            'Type'=>$_POST['Type'],
            'Date_emprunt'=>$_POST['Date_emprunt']

        ));

        $functions = new Functions();
        $functions->afficher($recherche);
    }

    catch (Exception $e) {
        echo $e->getMessage();
    }

?>