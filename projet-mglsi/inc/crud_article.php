<?php
	require_once 'fonctions.php';

    // récupere tous les Articles
    function getAllArticles() 
    {
		$bdd = new PDO('mysql:host=192.168.43.222;dbname=base_project;charset=utf8', 'projet', 'passer');
		$requete = 'SELECT * from Article';
		$rows = $bdd->query($requete);
		return $rows;
	}

	// creer un Article
    function addArticle($titre, $contenu, $dateCreation, $dateModification, $categorie) 
    {
        try 
        {
            $bdd = new PDO('mysql:host=192.168.43.222;dbname=base_project;charset=utf8', 'projet', 'passer');
			$requete = "INSERT INTO Article (titre, contenu, dateCreation, dateModification, categorie) 
					VALUES (?, ?, ?, ?, ?)";
			$stmt= $bdd->prepare($requete);
			$stmt->execute(array($titre, $contenu, $dateCreation, $dateModification, $categorie));
		}
        catch(PDOException $e)
        {
	    	echo $requete . "<br>" . $e->getMessage();
	    }
	}

	//met à jour le Article
 //    function updateArticle($titre, $contenu, $dateCreation, $dateModification, $categorie) 
 //    {
 //        try 
 //        {
 //            global $bdd;
	// 		$requete = "UPDATE Article set 
	// 					titre = ?,
	// 					contenu = ?,
	// 					dateCreation = ?,
	// 					dateModification = ?,
	// 					categorie = ?
	// 					where id = ?";
	// 		$stmt = $bdd->prepare($requete);
	// 		$stmt->execute(array($titre, $contenu, $prenom, $login, password_hash($password, PASSWORD_BCRYPT), $profil));
	// 	}
 //        catch(PDOException $e) 
 //        {
	//     	echo $sql . "<br>" . $e->getMessage();
	//     }
	// }

	//modifier mot de passe
	// function updatePassword($id, $password) 
 //    {
 //        try 
 //        {
 //            global $bdd;
	// 		$requete = "UPDATE Article set 	password = ? where id = ?";
	// 		$stmt = $bdd->prepare($requete);
	// 		$stmt->execute(array(password_hash($password, PASSWORD_BCRYPT), $id));
	// 	}
 //        catch(PDOException $e) 
 //        {
	//     	echo $sql . "<br>" . $e->getMessage();
	//     }
	// }

	//modifier login
	// function updateLogin($id, $login) 
 //    {
 //        try 
 //        {
 //            global $bdd;
	// 		$requete = "UPDATE Article set 	login = ? where id = ?";
	// 		$stmt = $bdd->prepare($requete);
	// 		$stmt->execute(array($login, $id));
	// 	}
 //        catch(PDOException $e) 
 //        {
	//     	echo $sql . "<br>" . $e->getMessage();
	//     }
	// }

	// // suprime un Article
 //    function deleteArticle($id) 
 //    {
	// 	try 
	// 	{
 //            global $bdd;
	// 		$requete = "DELETE from Article where id = ? ";
	// 		$stmt = $bdd->prepare($requete);
	// 		$stmt->execute(array($id));
	// 	}
	// 	catch(PDOException $e) 
	// 	{
	//     	echo $sql . "<br>" . $e->getMessage();
	//     }
	// }
	
	// //recupere un Article a partir du nom et du prenom
	// function findArticleByFullName($nom, $prenom) 
 //    {
	// 	global $bdd;
	// 	$requete = "SELECT * from Article where nom = ? and prenom = ?";
 //        $stmt = $bdd->prepare($requete);
 //        $stmt->execute(array($nom, $prenom));
	// 	$row = $stmt->fetchAll();
 //        if (!empty($row)) 
 //        {
	// 		return $row[0];
	// 	}
		
	// }
?>