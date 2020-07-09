<!doctype html>
<html lang="fr">

<head>
	<title><?php echo $title ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="p4/dashboard/css/style.css" rel="stylesheet">
	<script src="https://cdn.tiny.cloud/1/v8acqaqi0ectq8n4tdw47j5bsgtsb1qlhpj8hzwapzqzvp3q/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script>tinymce.init({selector: '.tinyMCE'});</script>
</head>

<body>
	<header>

		<nav class="navbar navbar-dark bg-dark">

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button><a class="navbar-brand" href="#">Dashboard</a>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item <?php if ($action == "accueil") echo 'item-active' ?>">
						<a class="nav-link" href="index.php?action=accueil">Accueil</a>
					</li>
					<li class="nav-item <?php if ($action == "addPost") echo 'item-active' ?>">
						<a class="nav-link" href="index.php?action=addPost">Publier un billet</a>
					</li>
					<li class="nav-item <?php if ($action == "allPosts") echo 'item-active' ?>">
						<a class="nav-link" href="index.php?action=allPosts">Tous les billets</a>
					</li>
					<li class="nav-item <?php if ($action == "allComments") echo 'item-active' ?>">
						<a class="nav-link" href="index.php?action=allComments">Tous les commentaires</a>
					</li>
				
					<li class="nav-item">
						<a class="nav-link" href="../index.php">Aller sur le site</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?action=logOut">Se déconnecter</a>
					</li>
				</ul>
		</nav>
	</header>



	<div class="container">
		<?php include($vue) ?>
	</div>





	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>