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
    <header>
        <nav class="nav-wrapper blue-grey">
            <a class="brand-logo" href="index.php">Jean FORTEROCHE</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li>
                    <a href="index.php">Accueil</a>
                </li>
                <li>
                    <a href=" index.php?action=allPosts">Tous les billets</a>
                </li>
                <?php if (!isset($_SESSION["user"])) { ?>
                    <li>
                        <a>Se connecter</a>
                    </li>
                <?php } ?>
                <?php if (isset($_SESSION["user"]) && verifLoginById($_SESSION["user"])->getRole() == "admin") { ?>
                    <li>
                        <a href=" index.php?action=dashboard">Tableau de bord</a>
                    </li>
                <?php } ?>
                <?php if (isset($_SESSION["user"])) { ?>
                    <li>
                        <a class=" waves-effect waves-light btn" href="index.php?action=logOut">Déconnexion</a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </header> 
    <img id="banniere1" src="image/road.jpg" alt="caribou">
    <?php include($vue) ?>
    <footer class="page-footer blue-grey">
        <div class="container">
            <span class="text-muted">&copy; <?php echo date("Y"); ?> - Jean Forteroche site Openclassrooms par Sandra B</span>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>