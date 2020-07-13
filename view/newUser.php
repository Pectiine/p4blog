<title> S'inscrire </title>
<h2 class="text-lg-center">S'inscrire</h2>

<div class="container">
    <div class="row">
        <div class="col-12">
            <?php if (isset($message)) {  ?>
                <div class="alert alert-dismissible alert-secondary">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $message; ?>
                </div>
            <?php } ?>
            <form action="index.php?action=addUser" method="POST" onsubmit="return verifForm(this)">
                <div class="form-group">
                    <label for="lastName">Nom</label>
                    <input class="form-control" id="lastName" placeholder="Nom" type="text" name="lastName" onKeyUp="verifLastName(this)" required>
                </div>
                <div class="form-group">
                    <label for="firstName">Prénom</label>
                    <input class="form-control" id="firstName" placeholder="Prénom" type="text" name="firstName" onKeyUp="verifFirstName(this)" required>
                </div>
                <div class="form-group">
                    <label for="identifiant">Identifiant</label>
                    <input class="form-control" id="identifiant" placeholder="Identifiant" type="text" name="identifiant" onKeyUp="verifIdentifiant(this)" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input class="form-control" id="password" placeholder="Mot de passe" type="password" name="password" onKeyUp="verifPassword(this)" required>
                </div>

                <div class="form-group">
                    <label for="mail">Mail</label>
                    <input class="form-control" id="mail" aria-describedby="emailHelp" placeholder="Enter email" type="text" name="mail" onKeyUp="verifMail(this)" required>
                    <input readonly="" class="form-control-plaintext" id="staticEmail" value="email@example.com" type="text">
                </div>
                <input type="submit" value="S'inscrire" class="btn btn-success">
            </form>

        </div>
    </div>
</div>