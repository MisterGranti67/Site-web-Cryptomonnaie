<script src="https://kit.fontawesome.com/da8f9491f0.js" crossorigin="anonymous"></script>
<div class="top" style="z-index: 99999">
    <div class="navbar">
        <a href="../panel/home.php" class="item logo"><img class="image" src="https://skylord.fr/logo.png" width="64px"></a>
        <div class="navbar_menu">
            <a class="item lien" href="../panel/change.php">Exchange</a>
            <a class="item lien" href="../panel/energie.php">Production d'énergie et Rigs</a>
            <a class="item lien" href="../panel/technicieninfo.php">Technicien informatique (Abonnement)</a>
        </div>
        <?php if ((isset($_SESSION['pseudo'])) && (isset($_SESSION['code']))) { ?>
            <a class="item mon_wallet deconnexion" href="https://crypto.skylord.fr/deconnexion.php">Déconnexion</a>
        <?php } ?>
        <a class="item mon_wallet" href="../panel/home.php">Mon Wallet</a>
        <div class="mobileButton">
            <button class="baguette-js--openNav">
                <i class="fas fa-bars"></i>
            </button>
        </div> 
    </div>
</div>
<div id="baguette-mobileNav">
    <div class="baguette-navHeader">
        Menu
        <button class="baguette-js--closeNav"><i class="fas fa-times"></i></button>
    </div>
    <div class="baguette-navLinks">
        <a class="link" href="../panel/change.php">Exchange</a>
        <a class="link" href="../panel/energie.php">Production d'énergie et Rigs</a>
        <a class="link" href="../panel/technicieninfo.php">Technicien informatique (Abonnement)</a>
        <a class="link" href="../panel/home.php"><i class="fa-solid fa-wallet"></i> Mon Wallet</a>
        <a class="link" href="https://crypto.skylord.fr/deconnexion.php"><i class="fa-solid fa-right-from-bracket"></i> Déconnexion</a>
    </div>
</div>
<script type="text/javascript" src="https://skylord.fr/js/index.js"></script>