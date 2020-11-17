<?php
    require_once("../inc/fonctions.php");
    require_once("../inc/crud_article.php");
    addArticle($_REQUEST['titre'], $_REQUEST['contenu'], $_REQUEST['dateCreation'], $_REQUEST['dateModification'], $_REQUEST['categorie']);
    header("Location: display-articles.php");
    echo "Inscription reussie!!";
?>