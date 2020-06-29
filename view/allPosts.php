<div class="container">
    <div>
        <?php
        foreach ($listPosts as $post) { ?>
            <div>
                <div>
                    <div>
                        <h5><?php echo $post->getTitle(); ?></h5><span class="badge badge-secondary"><?php echo date("d-m-Y", strtotime($post->getCreatedAt())); ?></span>
                    </div>
                    <div>
                        <p><?php echo substr($post->getContent(), 0, 300) . ", ..." ?></p>
                    </div>
                    <div>
                        <a href="index.php?action=post&id=<?php echo $post->getId(); ?>" class="btn btn-secondary">Voir +</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>