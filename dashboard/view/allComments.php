<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <?php if (isset($message)) {  ?>
                <div class="alert alert-dismissible alert-secondary">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>

                    <?php echo $message; ?>

                </div>
            <?php } ?>

            <table class="table table-hover table-bordered table-sm bg-light">
                <thead class="bg-info text-white">
                    <th scope="col">Titre du chapitre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Date de publication</th>
                    <th scope="col">Commentaire</th>
                    <th scope="col">Nb signalement</th>
                    <th scope="col">Actions</th>
                </thead>
                <tbody>
                    <?php
                    if (empty($listComments)) { ?>
                        <tr>
                            <td colspan=6> Aucun commentaires</td>
                        </tr>
                        <?php } else {
                        foreach ($listComments as $comment) { ?>
                            <tr>
                                <td scope="row" data-label="Titre du chapitre"><?php echo $comment->getPost()->getTitle(); ?></td>
                                <td data-label="Auteur"><?php echo $comment->getUser()->getIdentifiant(); ?></td>
                                <td data-label="Date de publication"><?php echo date("d/m/Y H:i", strtotime($comment->getDateComment())); ?></td>
                                <td data-label="Commentaire"><?php echo htmlspecialchars($comment->getContent()); ?></td>
                                <td data-label="Nb signalement"><?php echo $ReportController->getCountReportedByComment($comment->getId())[0] ?></td>
                            
                                <td data-label="Action">
                                    <div class="btn-action">
                                        <a class="btn btn-sm btn-info btn-delete" href="index.php?action=viewReport&id=<?php echo $comment->getId(); ?>">Voir signalements</a>
                                        <a class="btn btn-sm btn-success btn-delete" href="index.php?action=deleteReport&id=<?php echo $comment->getId(); ?>">Valider</a>
                                        <a class="btn btn-sm btn-danger btn-delete" href="" data-toggle="modal" data-target="#modalDelete<?php echo $comment->getId(); ?>">Supprimer</a>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="modalDelete<?php echo $comment->getId(); ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <a class="waves-effect waves-light btn-small blue-grey" href="index.php?action=deleteComment&id=<?php echo $comment->getId(); ?>">Confirmer</a>
                                            <button type="button" class="waves-effect waves-light btn-small blue-grey" data-dismiss="modal">Annuler</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>