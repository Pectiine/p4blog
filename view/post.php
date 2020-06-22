<div class="container">
  <div>
    <div>
      <div class="post-content">
        <h1><?php echo $post->getTitle(); ?></h1>
        <?php if (isset($_SESSION['user']) && verifLoginById($_SESSION["user"])->getRole() == "admin") { ?>
          <?php } ?>
          <h6 class="text-muted">Publié le : <?php echo date("d-m-Y", strtotime($post->getCreatedAt())); ?></h6>
          <?php
          if (!empty($post->getUpdateAt())) {
            echo "<h6 class='text-muted'>Modifié le : " . date("d-m-Y", strtotime($post->getUpdateAt())) . "</h6>";
          }
          ?>
          <?php echo $post->getContent(); ?>
          </div>
      </div>
    </div>
  </div>