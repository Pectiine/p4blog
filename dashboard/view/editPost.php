<div class="container">
  <div class="row">
    <div class="col-12">

      <?php if (isset($message)) {  ?>
        <div class="alert alert-dismissible alert-secondary">
          <button type="button" class="close" data-dismiss="alert">&times;</button>

          <?php echo $message; ?>

        </div>
      <?php } ?>


      <form action="index.php?action=updatePostBdd&id=<?php echo $post->getId(); ?>" method="POST">
        <div class="form-group">
          <label for="title">Title</label>
          <input class="form-control" id="title" placeholder="Title" type="text" name="title" value="<?php echo $post->getTitle(); ?>">
        </div>

        <div class="form-group">
          <label for="content">Contenu</label>
          <textarea class="tinyMCE" id="content" name="content"><?php echo $post->getContent(); ?></textarea>
          <input name="image" type="file" id="upload" class="d-none" onchange="">
        </div>

        <input type="submit" value="Mettre à jour" class="waves-effect waves-light btn-small blue-grey">
      </form>
    </div>
  </div>
</div>