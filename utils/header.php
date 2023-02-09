<div class="top" style="z-index: 99999">
    <div class="navbar">
        <a href="../panel/home.php" class="item logo"><img class="image" src="https://skylord.fr/logo.png" width="64px"></a>
        <div class="navbar_menu">
            <a class="item lien" href="../panel/change.php">Exchange</a>
            <a class="item lien" href="../panel/energie.php">Production d'énergie et Rigs</a>
            <a class="item lien" href="../panel/technicieninfo.php">Technicien informatique (Fonctionnalité Premium)</a>
        </div>
        <?php if ((isset($_SESSION['pseudo'])) && (isset($_SESSION['code']))) { ?>
            <a class="item mon_wallet deconnexion" href="https://crypto.skylord.fr/deconnexion.php">Déconnexion</a>
        <?php } ?>
        <a class="item mon_wallet" href="../panel/home.php">Mon Wallet</a>
        <span class="hamburger hamburger--collapse item" id="js-navbar-toggle">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </span>  
    </div>
</div>