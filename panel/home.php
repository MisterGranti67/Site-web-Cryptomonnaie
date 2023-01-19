<!DOCTYPE html>
<html>
    <head>
        <title>Mon éspace joueur - Crypto Skylord</title>
        <style>
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
                max-width: 1024px;
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
                height: 160px;
                width: 100%;
                background-color: #FAFAFA;
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
        <section class="informations">
            <div class="container">

            </div>
        </section>
    </body>
</html>