<div class="container">
  <div>
    <div>
      <div class="post-content">
        <h3><?php echo $post->getTitle(); ?></h3>
        <?php if (isset($_SESSION['user']) && $UserController->verifLoginById($_SESSION["user"])->getRole() == "admin") { ?>
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
<section id="comment" class="bg-dark p-4 mt-4 text-white">
  <div class="container">
    <div class="row">
      <h5 class="text-white">Commentaires</h5>
      <?php if (isset($message)) {  ?>
        <div class="alert alert-dismissible alert-secondary">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <?php echo $message; ?>
        </div>
      <?php } ?>
      <?php
      if (empty($listComments)) echo " ";
      foreach ($listComments as $comment) { ?>
        <div class="col-12 py-3">
          <blockquote class="blockquote">
            <p class="mb-0"><?php echo htmlspecialchars($comment->getContent()); ?></p>
            <footer class="blockquote-footer">
              <?php echo $comment->getUser()->getRole() == "admin" ? $comment->getUser()->getFirstName() . " " . $comment->getUser()->getLastName() : $comment->getUser()->getIdentifiant(); ?>
              <cite title="Source Title"><?php echo date("d-m-Y H:i", strtotime($comment->getDateComment())); ?></cite></footer>
          </blockquote>
          <?php if (isset($_SESSION["user"]) && $UserController->verifLoginById($_SESSION["user"])->getRole() == "lecteur") { ?>
            <a href="" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#modalReport<?php echo $comment->getId(); ?>">Signaler</a>
          <?php } ?>
        </div>

        <div class="modal fade" id="modalReport<?php echo $comment->getId(); ?>" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Signalement du commentaire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php if ($ReportController->verifReport($comment->getId())[0] > 0) { ?>
                <div class="modal-body text-dark">
                  <p>Vous avez déjà signalé le commentaire.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="waves-effect waves-light btn-small blue-grey" data-dismiss="modal">Fermer</button>
                </div>
              <?php } else { ?>
                <form action="index.php?action=addReport&id=<?php echo $comment->getId(); ?>&idPost=<?php echo $post->getId() ?>" method="POST">
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="message" class="text-dark">Message</label>
                      <textarea class="form-control" id="message" name="message"></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-sm btn-success" value="Signaler">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Annuler</button>
                  </div>
                </form>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="modal fade" id="modalDelete<?php echo $comment->getId(); ?>" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Confirmer la suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body text-dark">
                Confirmez-vous la suppression du commentaire ?
              </div>
              <div class="modal-footer">
                <a class="btn btn-sm btn-success" href="index.php?action=deleteComment&idComment=<?php echo $comment->getId(); ?>&idPost=<?php echo $post->getId() ?>">Confirmer</a>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Annuler</button>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <div class="col-12 pl-0 text-white">
        <?php
        if (isset($_SESSION["user"])) { ?>
          <form action="index.php?action=addComment" method="POST">
            <div class="form-group">
              <label for="comment">Laisser un commentaire</label>
              <textarea class="form-control" id="comment" placeholder="Votre texte ici..." name="comment" required></textarea>
            </div>
            <input type="submit" value="Commenter" class="btn btn-secondary">
            <input type="hidden" value="<?php echo $post->getId() ?>" name="idPost">
          </form>
        <?php } else { ?>
          <p class="h5 text-white">Pour laisser un commentaire, veuillez vous <a href="index.php?action=signUp" class="text-warning">inscrire</a> ou bien vous <a href="index.php?action=signIn" class="text-warning">connecter</a> !</p>

        <?php } ?>
      </div>
    </div>
  </div>
</section>