<!DOCTYPE html>
<html>
    <head>
        <title>Mon éspace joueur - Crypto Skylord</title>
        <link href="../css/style-panel.css" rel="stylesheet">
        <script type="text/javascript" src="../js/jquery.js"></script>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
        <script>
            $(document).ready(async function(){
                const queryString = window.location.search;
                console.log(queryString);

                const urlParams = new URLSearchParams(queryString);
                console.log(urlParams.get('pseudo'));
                if (urlParams.get('pseudo') != null) {
                    if (urlParams.get('code') != null) {
                        var pseudo = 'http://apiv1.skylord.fr:24466/api/money?joueur=' + urlParams.get('pseudo');
                        const api_crypto = await fetch(pseudo);
                        const api_binance = await fetch('https://api.binance.com/api/v1/ticker/24hr');
                        const data = await api_binance.json();
                        const data_crypto = await api_crypto.json();
                        console.log(data_crypto)
                        var baseToText = { BTC: "Bitcoin", ETH: "Ethereum", LTC: "LiteCoin", SHIB: "Shiba", DOGE: "DogeCoin", XRP: "Ripple", DOT: "Polkadot", BNB: "BinanceCoin", ADA: "Cardano" };
                        for (let i = 2000; i > 0; i--) {
                            if ((data[i].symbol == "BTCUSDT") || (data[i].symbol == "ETHUSDT") || (data[i].symbol == "SHIBUSDT") || (data[i].symbol == "LTCUSDT") || (data[i].symbol == "DOGEUSDT") || (data[i].symbol == "XRPUSDT") || (data[i].symbol == "DOTUSDT") || (data[i].symbol == "BNBUSDT") || (data[i].symbol == "ADAUSDT")){
                                const nom_crypto = data[i].symbol.split('USDT');
                                var str = "<tr><td data-label=\"Nom\" class=\"nom\"><img src=\"../img/crypto/" + nom_crypto[0] + "logo.png\"> <h1>" + nom_crypto[0] +"</h1><h2>" + baseToText[nom_crypto[0]] + "</h2></td><td data-label=\"Montant\"><h1>1</h1></td><td data-label=\"Valeur\"><h1>19 000$</h1></td><td data-label=\"Variation sur 24h\"><h1 class=\"perte\"> " + data[i].priceChangePercent + "%<h1></td><td data-label=\" \"><a href=\"\">Trader</a></td></tr>"
                                $(str).prependTo("#tableau_crypto");
                            }
                        }
                    }
                }
            });


            
        </script> 
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

        <div class="content">
            <div class="container">
                <div class="flex-container">
                    <div class="flex-items crypto">
                        <div class="mon_solde">
                            <h1>Solde estimé</h1>
                            <span>0.00 BTC</span><span>≈ 0.00000000$</span>
                        </div>

                        <div class="tableau_crypto">
                            <table>
                                <thead>
                                    <tr class="thead">
                                        <th scope="col">Nom</th>
                                        <th scope="col">Montant</th>
                                        <th scope="col">Valeur</th>
                                        <th scope="col">Variation sur 24h</th>
                                        <th scope="col"> </th>
                                    </tr>
                                </thead>
                                <tbody id="tableau_crypto">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="flex-items notification">
                        <h1>Les dernières notifications</h1>
                        <div class="notification_recu">
                            <a href="">2023-01-18 - Votre groupe électrogène #1 n'a plus d'essence</a>
                        </div>
                        <div class="notification_recu">
                            <a href="">2023-01-18 - Votre groupe électrogène #1 n'a plus d'essence</a>
                        </div>
                        <div class="notification_recu">
                            <a href="">2023-01-18 - Votre groupe électrogène #1 n'a plus d'essence</a>
                        </div>
                        <div class="notification_recu">
                            <a href="">2023-01-18 - Votre groupe électrogène #1 n'a plus d'essence</a>
                        </div>
                        <div class="notification_recu">
                            <a href="">2023-01-18 - Votre groupe électrogène #1 n'a plus d'essence</a>
                        </div>
                        <div class="notification_recu">
                            <a href="">2023-01-18 - Votre groupe électrogène #1 n'a plus d'essence</a>
                        </div>
                        <div class="notification_recu">
                            <a href="">2023-01-18 - Votre groupe électrogène #1 n'a plus d'essence</a>
                        </div>
                        <div class="notification_recu">
                            <a href="">2023-01-18 - Votre groupe électrogène #1 n'a plus d'essence</a>
                        </div>
                        <div class="notification_recu">
                            <a href="">2023-01-18 - Votre groupe électrogène #1 n'a plus d'essence</a>
                        </div>
                        <div class="notification_recu">
                            <a href="">2023-01-18 - Votre groupe électrogène #1 n'a plus d'essence</a>
                        </div>
                        <div class="notification_recu">
                            <a href="">2023-01-18 - Votre groupe électrogène #1 n'a plus d'essence</a>
                        </div>
                        <div class="notification_recu">
                            <a href="">2023-01-18 - Votre groupe électrogène #1 n'a plus d'essence</a>
                        </div>
                        <div class="notification_recu">
                            <a href="">2023-01-18 - Votre groupe électrogène #1 n'a plus d'essence</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>