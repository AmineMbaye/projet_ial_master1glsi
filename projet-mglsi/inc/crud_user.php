<?php
	require_once 'fonctions.php';

    // récupere tous les users
    function getAllUsers() 
    {
		$bdd = new PDO('mysql:host=192.168.43.222;dbname=base_project;charset=utf8', 'projet', 'passer');
		$requete = 'SELECT * from Users';
		$rows = $bdd->query($requete);
		return $rows;
	}

	// creer un user
    function addUser($nom, $prenom, $login, $password, $profil, $type_user) 
    {
        try 
        {
        	$type_user = 1;
            $bdd = new PDO('mysql:host=192.168.43.222;dbname=base_project;charset=utf8', 'projet', 'passer');
			$requete = "INSERT INTO users (nom, prenom, login, password, profil, type_user) 
					VALUES (?, ?, ?, ?, ?, ?)";
			$stmt= $bdd->prepare($requete);
			$stmt->execute(array($nom, $prenom, $login, password_hash($password, PASSWORD_BCRYPT), $profil, $type_user));
		}
        catch(PDOException $e)
        {
	    	echo $requete . "<br>" . $e->getMessage();
	    }
	}

	//recupere un user
    function getUser($login, $password) 
    {
		$bdd = new PDO('mysql:host=192.168.43.222;dbname=base_project;charset=utf8', 'projet', 'passer');
		$requete = "SELECT * from Users where login = ?";
		$stmt = $bdd->prepare($requete);
		$stmt->execute(array($login));
		$row = $stmt->fetchAll();
		foreach($row as $ligne)
		{
			if(password_verify($password, $ligne['password']))
			{
				return $ligne;
			}
		}
		return null;
		
	}

	//met à jour le user
    function updateUser($id, $nom, $prenom, $login, $password, $profil, $type_user) 
    {
        try 
        {
            global $bdd;
			$requete = "UPDATE Users set 
						nom = ?,
						prenom = ?,
						login = ?,
						password = ?,
						profil = ?,
						type_user = ?
						where id = ?";
			$stmt = $bdd->prepare($requete);
			$stmt->execute(array($id, $nom, $prenom, $login, password_hash($password, PASSWORD_BCRYPT), $profil, $type_user));
		}
        catch(PDOException $e) 
        {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}

	//modifier mot de passe
	function updatePassword($id, $password) 
    {
        try 
        {
            global $bdd;
			$requete = "UPDATE Users set 	password = ? where id = ?";
			$stmt = $bdd->prepare($requete);
			$stmt->execute(array(password_hash($password, PASSWORD_BCRYPT), $id));
		}
        catch(PDOException $e) 
        {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}

	//modifier login
	function updateLogin($id, $login) 
    {
        try 
        {
            global $bdd;
			$requete = "UPDATE Users set 	login = ? where id = ?";
			$stmt = $bdd->prepare($requete);
			$stmt->execute(array($login, $id));
		}
        catch(PDOException $e) 
        {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}

	// suprime un user
    function deleteUser($id) 
    {
		try 
		{
            global $bdd;
			$requete = "DELETE from Users where id = ? ";
			$stmt = $bdd->prepare($requete);
			$stmt->execute(array($id));
		}
		catch(PDOException $e) 
		{
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}
	
	//recupere un user a partir du nom et du prenom
	function findUserByFullName($nom, $prenom) 
    {
		global $bdd;
		$requete = "SELECT * from Users where nom = ? and prenom = ?";
        $stmt = $bdd->prepare($requete);
        $stmt->execute(array($nom, $prenom));
		$row = $stmt->fetchAll();
        if (!empty($row)) 
        {
			return $row[0];
		}
		
	}
?>