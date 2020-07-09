<p class="text-lg-center">Tout les billets</p>

<div class="container">
    <div class="container px-lg-5">
        <?php
        foreach ($listPosts as $post) { ?>

            <div class="card text-center">

                <div class="card-body">
                    <h4><?php echo $post->getTitle(); ?></h4><span class="badge badge-secondary"><?php echo date("d-m-Y", strtotime($post->getCreatedAt())); ?></span>
                    <p class="card-text"> <?php echo substr($post->getContent(), 0, 4000) . ", ..." ?></p>
                </div>
                <div class="card-footer text-muted">
                    <a href=" index.php?action=post&id=<?php echo $post->getId(); ?>" class="btn btn-secondary">Voir +</a>
                </div>
            </div>

        <?php } ?>
    </div>
</div>
