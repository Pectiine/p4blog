<div class="container">
    <div class="row equal">
        <div class="col-12">
            <?php if (isset($_SESSION["user"])) {
                echo "Bienvenue " . $UserController->verifLogin($_SESSION["user"])->getFirstName() . " " .  $UserController->verifLogin($_SESSION["user"])->getLastName();
            } ?>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nombre de chapitres publiés</h4>

                    <p class="card-text"><?php echo $PostController->getCountPost()[0]; ?> Chapitres</p>
                    <a href="index.php?action=allPosts" class="waves-effect waves-light btn-small blue-grey">Voir les Chapitres</a>
                    <a href="index.php?action=addPost" class="waves-effect waves-light btn-small blue-grey">Publier</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nombre de lecteurs inscrits</h4>
                    <p class="card-text"><?php echo $UserController->getCountUser()[0]; ?> Lecteurs</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Commentaires </h4>
                    <a href="index.php?action=allComments" class=" waves-effect waves-light btn-small blue-grey">Voir tout les commentaires</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>