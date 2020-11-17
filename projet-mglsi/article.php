<!DOCTYPE html>
<html>
<head>
	<title>Site d'actu</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Image Favicon -->
    <link rel="icon" type="image/png" href="../assets/images/news.png" />
    
    <!-- Bootstrap core CSS-->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
</head>
<body class="bg-dark">
	<div id="contenu" class="container">
	<?php 
		require_once 'inc/fonctions.php';
		$bdd = dbConnect();
		$categories = getList($bdd, 'Categorie');
		require_once 'inc/menu.php';
		
		if (isset($_GET['id']))
		{
			$id = (int) $_GET['id'];
			$article = getItem($bdd, $id);
	?>
		<h1 class="text-primary"><?= $article->titre ?></h1>
		<span class="text-light">Publié le <?= $article->dateCreation ?></span>
		<p class="text-light"><?= $article->contenu ?></p>
	<?php
		}
		else if  (isset($_GET['categorie']))
		{
			$catId = (int) $_GET['categorie'];
			$articles = getItemByCategorie($bdd, $catId);

			if (empty($articles)) {
				echo "<p class='text-light'>Aucun article dans cette catégorie</p>";
			}
			else
			{
	?>
		<div class="card-deck">
	<?php 
				foreach ($articles as $article)
				{
	?>  
			<div class="card bg-primary text-light">
				<h4><?= $article->titre ?></h4>
				<div class="card-body">
					<p class="card-text"><?= substr($article->contenu, 0, 300) . '...' ?></p>
				</div>
				<a href="article.php?id=<?= $article->id ?>" class="btn btn-dark">En savoir plus</a>
			</div>
	<?php
				}
	?>
		</div>
	<?php 	
			}
		}
		else
		{
	?>
			<meta http-equiv="refresh" content="3; url=index.php">
			<p>Cet article n'existe pas !!!</p>
	<?php
		}
	?>
	</div>
	<br>
	<br>
	<br>
	<footer class="fixed-bottom"><hr>© Copyright 2020</footer>
</body>
</html>