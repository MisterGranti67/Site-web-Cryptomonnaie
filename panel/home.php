<!DOCTYPE html>
<html>
    <head>
        <title>Mon éspace joueur - Crypto Skylord</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
            * {
                font-family: 'Roboto';
            }
            body {
                margin: 0;
                font-family: sans-serif;
            }

            .top {
                position: fixed;
                top: 0;
                height:64px;
                width: 100%;
                background-color: #fff;
            }

            .top--scrolling {
                background-color: rgba(22, 22, 22, 0.85);
                transition: background-color .4s;
            }

            .top--open {
                background-color: rgba(22, 22, 22, 0.85);
                transition: background-color .4s;
            }

            .navbar {
                display: flex;
                justify-content: center;
                max-width: 1440px;
                margin: 0 auto;
                font-size: 12px;
                height: 64px;
                padding: 0 15px;
            }


            .item {
                color: #6A6A6A;
                text-decoration: none;
                line-height: 64px;
            }

            .navbar_menu{
                background-color: transparent;
                opacity: 0;
                transition: background-color 0s;
                margin-right: auto;
            }

            @media (min-width: 600px) {
                .navbar_menu {
                    opacity: 1;
                    display: flex;
                    flex-direction: row;
                    position: relative;
                    top: auto;
                    
                }
                .navbar_menu .lien {
                    margin-right: auto;
                    margin-left: 24px;
                    float: left;
                }

                .mon_wallet {
                    margin-top: auto;
                    margin-bottom: auto;
                    padding-top: 8px;
                    padding-bottom: 8px;
                    padding-left: 12px;
                    padding-right: 12px;
                    background-color: #FFD97D;
                    line-height: 29px;
                    height: 29px;
                    width: 82px;
                    text-align: center;
                    border-radius: 5px;
                }

                .navbar_menu .lien:last-child {
                    margin-right: 0;
                }

                .navbar_menu--active {
                    display: flex;
                    flex-direction: row;
                    justify-content: flex-end;
                    position: auto;
                    height: auto;
                    background: transparent;
                }

                .hamburger {
                    display: none;
                    padding: 5px auto;
                }
            }

            .container {
                max-width: 1024px;
                margin-left: auto;
                margin-right: auto;
            }

            .informations {
                margin-top: 64px;
                padding-top: 44px;
                padding-bottom: 44px;
                width: 100%;
                background-color: #FAFAFA;
            }

            .informations .details {
                height: 72px;
                margin-left: 32px;
            }
            .informations .details img {
                font-size: 16px;
                margin-left: 14px;
                float: left;
                border-radius: 50px;
            }
            .informations .more_details {
                font-size: 16px;
                margin-left: 14px;
                display: inline-block;
                float: left;
            }

            .informations .more_details h1 {
                font-size: 16px;
                margin-block-start: 0px;
                margin-block-end: 0px;
                margin-inline-start: 0px;
                margin-inline-end: 0px;
                font-weight: 400;
                font-style: normal;
            }

            .informations .sous_details {
                margin-top: 4px;
            }
            .informations .sous_details .coordonnes {
                display: inline-block;
                margin-right: 24px;
            }
            .informations .sous_details .coordonnes h2 {
                color: #6D6D6D;
                font-family: 'Roboto';
                font-style: normal;
                font-weight: 400;
                font-size: 12px;
                line-height: 14px;
            }

            .informations .sous_details .coordonnes p {
                color: #000;
                font-family: 'Roboto';
                font-style: normal;
                font-weight: 400;
                font-size: 12px;
                line-height: 14px;
            }

        </style>
    </head>
    <body>
        <div class="top">
            <div class="navbar">
                <a href="" class="item logo"><img class="image" src="https://skylord.fr/logo.png" width="64px"></a>
                <div class="navbar_menu">
                    <a class="item lien" href="">Acheter des cryptos</a>
                    <a class="item lien" href="">Trader</a>
                    <a class="item lien" href="">Accès aux rigs</a>
                    <a class="item lien" href="">Production d'énergie</a>
                </div>
                <a class="item mon_wallet" href="">Mon Wallet</a>
                <span class="hamburger hamburger--collapse item" id="js-navbar-toggle">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </span>  
            </div>
        </div>
        <div class="informations">
            <div class="container">
                <div class="details">
                    <img src="https://minotar.net/avatar/mrbaguette07" width="72px">
                    <div class="more_details">
                        <h1 class="titre">MrBaguette07</h1>
                        <div class="sous_details">
                            <div class="coordonnes">
                                <h2>Type d'utilisateur</h2>
                                <p>Joueur</p>
                            </div>
                            <div class="coordonnes">
                                <h2>Date et heure de la dernière connexion</h2>
                                <p>2023-01-18  20:20:19(192.168.1.1)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>