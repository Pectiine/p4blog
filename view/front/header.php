<header>
    <div id="titleheader">
        <h1>Jean FORTEROCHE</h1>
    </div>
  <nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
           <ul>
            <li><a href="./index.php">Accueil</a></li>
            <li><a href="?action=posts">Posts</a></li>
            <?php
            if (!empty($_SESSION['username'])) {
                echo '<li><a href="?action=management">Gestion</a></li>';
                echo '<li><a href="?action=disconnect">Déconnexion</a></li>';
            } else {
                echo '<li><a href="?action=connect">S\'identifier</a></li>';
            }?>
        </ul>
    </div>
</nav>
</header>

