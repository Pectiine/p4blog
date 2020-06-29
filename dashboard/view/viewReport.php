<div class="container">
    <div class="row">
        <div class="col-12">

            <h1>Le commentaire Signalé</h1>
            <a href="index.php?action=deleteReport&id=<?php echo $comment->getId(); ?>" class="badge badge-pill badge-success">Valider</a>
            <a href="" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#modalDeleteComment">Supprimer</a>
            <blockquote class="blockquote">
                <p class="mb-0"><?php echo htmlspecialchars($comment->getContent()); ?></p>
                <footer class="blockquote-footer">
                    <?php echo $comment->getUser()->getRole() == "admin" ? $comment->getUser()->getFirstName() . " " . $comment->getUser()->getLastName() : $comment->getUser()->getIdentifiant(); ?>
                    <cite title="Source Title"><?php echo date("d-m-Y H:i", strtotime($comment->getDateComment())); ?></cite></footer>
            </blockquote>

            <h1>Les signalements</h1>

            <?php foreach ($listReport as $report) { ?>
                <blockquote class="blockquote">
                    <p class="mb-0"><?php echo htmlspecialchars($report->getMessage()); ?></p>
                    <footer class="blockquote-footer">
                        <?php echo $report->getUser()->getFirstName() . " " . $report->getUser()->getLastName() ?>
                        <cite title="Source Title"><?php echo date("d-m-Y H:i", strtotime($report->getReportingDate())); ?></cite></footer>
                </blockquote>
            <?php } ?>

            <div class="modal fade" id="modalDeleteComment" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirmer la suppression</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Confirmez-vous la suppression du commentaire ?
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-sm btn-success" href="index.php?action=deleteComment&id=<?php echo $comment->getId(); ?>">Confirmer</a>
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>