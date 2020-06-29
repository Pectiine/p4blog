<div class="container">
    <div class="row">
        <div class="col-12">
            <?php if (isset($message)) {  ?>
                <div class="alert alert-dismissible alert-secondary">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>

                    <?php echo $message; ?>

                </div>
            <?php } ?>
            <form action="index.php?action=login" method="POST">

                <div class="form-group">
                    <label for="identifiant">Identifiant</label>
                    <input class="form-control" id="identifiant" placeholder="Identifiant" type="text" name="identifiant" value="<?php if (isset($_POST['identifiant'])) echo $_POST['identifiant']; ?>">
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input class="form-control" id="password" placeholder="Mot de passe" type="password" name="password">
                </div>
                <input type="submit" value="Se connecter" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>