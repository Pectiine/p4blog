<div class="container">
  <div class="row">
    <div class="col-12">
      <?php if (isset($message)) {  ?>
        <div class="alert alert-dismissible alert-secondary">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <?php echo $message; ?>
        </div>
      <?php } ?>
      <form action="index.php?action=addPostBdd" method="POST">
        <div class="form-group">
          <label for="title">Titre</label>
          <input class="form-control" id="title" placeholder="Titre" type="text" name="title">
        </div>

        <div class="form-group">
          <label for="content">Contenu</label>
          <textarea class="tinyMCE" id="content" name="content"></textarea>
        </div>
        <input type="submit" value="Envoyer" class="waves-effect waves-light btn-small blue-grey">
      </form>

    </div>
  </div>
</div>