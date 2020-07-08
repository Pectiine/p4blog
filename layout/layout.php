<!doctype html>
<html lang="fr">

<head>
    <title><?php echo $title ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <a class="navbar-brand" href="#">Jean Forteroche</a> <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href=" index.php?action=allPosts">Tous les billets</a>
                    </li>
                    <?php if (!isset($_SESSION["user"])) { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php?action=signIn">Se connecter</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php?action=signUp">S'inscrire</a>
                        </li>
                    <?php } ?>
                    <?php if (isset($_SESSION["user"]) && verifLoginById($_SESSION["user"])->getRole() == "admin") { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php?action=dashboard">Tableau de bord</a>
                        </li>
                    <?php } ?>
                    <?php if (isset($_SESSION["user"])) { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php?action=logOut">Déconnexion</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>
    <img id="banniere1" src="image/caribou.jpg" alt="caribou">
    <?php include($vue) ?>
    <footer class="text-white">
        <div class="container">
            <span class="text-muted">&copy; <?php echo date("Y"); ?> - Jean Forteroche site Openclassrooms par Sandra B</span>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>