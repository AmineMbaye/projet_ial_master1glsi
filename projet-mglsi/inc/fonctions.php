<?php
	function dbConnect()
	{
		try
		{
			$password = 'passer';
			$server = '192.168.43.222';
			$bdd = new PDO('mysql:host='.$server.';dbname=base_project;charset=utf8', 'projet', $password);
			return $bdd;
		}
		catch (Exception $e) 
		{
			echo "Erreur de connexion à la base de données : ".$e->getMessage();
		}
	}

	function getList($bdd, $table='Article')
	{
		$reponse = $bdd->query('SELECT * FROM '.$table);
		if ($table === 'Categorie') 
		{
			$table .= ' ORDER BY length(libelle)';
		}
		$articles = $reponse->fetchAll(PDO::FETCH_OBJ);
		$reponse->closeCursor();
		return $articles;
	}

	function getItem($bdd, $id, $table='Article')
	{
		$reponse = $bdd->query('SELECT * FROM '.$table. ' WHERE id = '.$id);
		$item = $reponse->fetch(PDO::FETCH_OBJ);
		$reponse->closeCursor();
		return $item;
	}

	function getItemByCategorie($bdd, $catId)
	{
		$reponse = $bdd->query('SELECT * FROM Article WHERE categorie = '.$catId);
		$articles = $reponse->fetchAll(PDO::FETCH_OBJ);
		$reponse->closeCursor();
		return $articles;
	}
	
	function consultArticle($bdd){
		// $stm = $bdd->query('SELECT * FROM Article');
		// $articles = $stm->fetchAll();
		// return json_encode($articles);
	}

?>