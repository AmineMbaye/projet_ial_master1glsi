<?php
	// On détermine sur quelle page on se trouve
	if(isset($_GET['page']) && !empty($_GET['page'])){
	    $currentPage = (int) strip_tags($_GET['page']);
	}
	else{
	    $currentPage = 1;
	}
	// On se connecte à là base de données
	require_once 'inc/fonctions.php';
	$db = dbConnect();;

	// On détermine le nombre total d'articles
	$sql = 'SELECT COUNT(*) AS nb_articles FROM `articles`;';

	// On prépare la requête
	$query = $db->prepare($sql);

	// On exécute
	$query->execute();

	// On récupère le nombre d'articles
	$result = $query->fetch();

	$nbArticles = (int) $result['nb_articles'];

	// On détermine le nombre d'articles par page
	$parPage = 5;

	// On calcule le nombre de pages total
	$pages = ceil($nbArticles / $parPage);

	// Calcul du 1er article de la page
	$premier = ($currentPage * $parPage) - $parPage;

	$sql = 'SELECT * FROM `articles` ORDER BY `dateCreation` DESC LIMIT :premier, :parpage;';

	// On prépare la requête
	$query = $db->prepare($sql);

	$query->bindValue(':premier', $premier, PDO::PARAM_INT);
	$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

	// On exécute
	$query->execute();

	// On récupère les valeurs dans un tableau associatif
	$articles = $query->fetchAll(PDO::FETCH_ASSOC);

?>
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
		<div class="card-deck">
			<?php 
				require_once 'inc/fonctions.php';
				$bdd = dbConnect();
				$categories = getList($bdd, 'Categorie');
				require_once 'inc/menu.php'; 
				require_once 'inc/entete.php';
				if ($bdd != null)
				{
					?>
				<ul class="pagination">
                    <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a href="./?page=<?= $currentPage - 1 ?>" class="page-link"><</a>
                    </li>
					<?php 
					$articles = getList($bdd);
					foreach ($articles as $article)
					{
			?>
				
					<div class="card bg-primary text-light">
						<h6><?= $article->titre ?></h6>
						<div class="card-body">
							<p class="card-text"><?= substr($article->contenu, 0, 300) . '...' ?></p>
						</div>
						<a href="article.php?id=<?= $article->id ?>" class="btn btn-dark">En savoir plus</a>
					</div>
				
			<?php
					}
				}
				else
				{
					echo "<p class='text-light'>Aucun article trouvé</p>";
				}
			?>

                <?php for($page = 1; $page <= $pages; $page++): ?>
                  <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                  <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                    </li>
                <?php endfor ?>
                  <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                  <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                    <a href="./?page=<?= $currentPage + 1 ?>" class="page-link">></a>
                </li>
            </ul>
		</div>
		<p class="text-light">
			<?php 
				//echo consultArticle($bdd);
			?>
		</p>
	</div>
    
	<footer class="fixed-bottom">© Copyright 2020</footer>
</body>
</html>