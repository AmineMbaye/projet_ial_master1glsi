<?php
    session_start();
    require_once("../inc/fonctions.php");
    require_once("../inc/crud_user.php");
    
    try {
        
        $user=getUser($_REQUEST['login'], $_REQUEST['password']);
        if($user!=null)
        {
            $_SESSION['id']=$user["id"];
            $_SESSION['nom']=$user["nom"];
            $_SESSION['prenom']=$user["prenom"];
            
            echo $user["prenom"]." ".$user["nom"].'<br>';
            $users = getAllUsers();
            foreach ($users as $user) 
            {
                echo $user['profil'].'<br>';
            }
            header("Location: administ.php");
        }
        else header("Location: ajouter-article.php");

    } catch (Exception $e) {
        echo "Connection failed ".$e->getMessage();   
    }
?>