<!doctype html>
<html lang="fr">

<head>
	<title><?php echo $title ?></title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<link href="css/style.css" rel="stylesheet">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>

	<div id="wrapper">
		<nav class="nav-wrapper blue-grey">
			<ul id="sidebar-content">
				<li class="nav-item <?php if ($action == "accueil") echo 'item-active' ?>">
					<a class="nav-link" href="index.php?action=accueil">Accueil</a>
				</li>
				<li class="nav-item <?php if ($action == "addPost") echo 'item-active' ?>">
					<a class="nav-link" href="index.php?action=addPost">Publier un chapitre</a>
				</li>
				<li class="nav-item <?php if ($action == "allPosts") echo 'item-active' ?>">
					<a class="nav-link" href="index.php?action=allPosts">Tous les billets</a>
				</li>
				<li class="nav-item <?php if ($action == "allComments") echo 'item-active' ?>">
					<a class="nav-link" href="index.php?action=allComments">Tous les commentaires</a>
				</li>
				<li class="nav-item <?php if ($action == "allCommentsReported") echo 'item-active' ?>">
					<a class="nav-link" href="index.php?action=allCommentsReported">Commentaires signalés</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../index.php">Aller sur le site</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?action=logOut">Se déconnecter</a>
				</li>
			</ul>
		</nav>
		<div class="wrapper-content">
			<?php include($vue) ?>
		</div>
		<footer class="footer">
			<div class="container">
				<span class="text-muted">&copy; <?php echo date("Y"); ?> - Jean Forteroche</span>
			</div>
		</footer>

	</div>
	<script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>