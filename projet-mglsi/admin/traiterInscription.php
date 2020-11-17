<?php
    require_once("../inc/fonctions.php");
    require_once("../inc/crud_user.php");
    addUser($_REQUEST['nom'],$_REQUEST['prenom'], $_REQUEST['login'], $_REQUEST['password'], $_REQUEST['profil'], $_REQUEST['type']);
    header("Location: index.php");
    echo "Inscription reussie!!";
?>