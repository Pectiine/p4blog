<div class="container">
    <?php
    if (isset($_SESSION["user"])) {
        echo "Bienvenue " . verifLoginById($_SESSION["user"])->getFirstName() . " " . verifLoginById($_SESSION["user"])->getLastName();
    }
    ?>
    <div id="header">
        <div class="header-content">
            <h2>Billet simple pour l'Alaska</h2>
            <p>Jean FORTEROCHE</p>
        </div>
    </div>
    <div class="row equal">
        <?php
        foreach ($listLastFivePosts as $post) { ?>
            <div class="col-12 col-lg-4 mb-3">
                <div class="card border-dark ">
                    <div class="card-header ">
                        <h4><?php echo $post->getTitle(); ?></h4><span class="badge badge-secondary"><?php echo date("d-m-Y", strtotime($post->getCreatedAt())); ?></span>
                    </div>
                    <div class="card-body">
                        <p><?php echo substr($post->getContent(), 0, 300) . ", ..." ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="index.php?action=post&id=<?php echo $post->getId(); ?>" class="btn btn-secondary">Voir +</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>