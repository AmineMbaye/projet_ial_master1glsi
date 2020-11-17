<div id="">
	<ul class="nav nav-tabs bg-dark fixed-top justify-content-center">
		<li><a class="nav-link text-left" href="index.php">Tout</a></li>
		<?php foreach ($categories as $categorie): ?>
			<li><a class="nav-link" data-toggle="" href="article.php?categorie=<?= $categorie->id ?>"><?= $categorie->libelle ?></a></li>
		<?php endforeach ?>
	</ul>
</div>
<br>
<br>