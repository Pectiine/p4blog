<div class="container">
    <div>
        <?php
        foreach ($listPosts as $post) { ?>
            <div>
                <div>
                    <div>
                        <h4><?php echo $post->getTitle(); ?></h4><span class="badge badge-info"><?php echo date("d-m-Y", strtotime($post->getCreatedAt())); ?></span>
                    </div>
                    <div>
                        <p><?php echo substr($post->getContent(), 0, 300) . ", ..." ?></p>
                    </div>
                    <div>
                        <a href="index.php?action=post&id=<?php echo $post->getId(); ?>" class=" waves-effect waves-light btn-small blue-grey">Voir +</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>