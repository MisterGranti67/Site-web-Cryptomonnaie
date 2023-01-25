<?php session_start(); ?>
<div class="top" style="z-index: 99999">
    <div class="navbar">
        <a href="" class="item logo"><img class="image" src="https://skylord.fr/logo.png" width="64px"></a>
        <div class="navbar_menu">
            <a class="item lien" href="">Acheter des cryptos</a>
            <a class="item lien" href="">Trader</a>
            <a class="item lien" href="">Accès aux rigs</a>
            <a class="item lien" href="">Production d'énergie</a>
            <a class="item lien" href="">Technicien informatique</a>
        </div>
        <?php if ((isset($_SESSION['pseudo'])) && (isset($_SESSION['code']))) { ?>
            <a class="item mon_wallet deconnexion" href="https://crypto.skylord.fr/deconnexion.php">Déconnexion</a>
        <?php } ?>
        <a class="item mon_wallet" href="">Mon Wallet</a>
        <span class="hamburger hamburger--collapse item" id="js-navbar-toggle">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </span>  
    </div>
</div>