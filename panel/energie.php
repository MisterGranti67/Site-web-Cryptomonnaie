<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
        <title>Mon éspace joueur - Crypto Skylord</title>
        <link href="../css/style-panel.css" rel="stylesheet">
        <link href="../css/style-energie.css" rel="stylesheet">
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script src="https://kit.fontawesome.com/da8f9491f0.js" crossorigin="anonymous"></script>
        <!-- <script>
            $(document).ready(async function(){
                const queryString = window.location.search;
                console.log(queryString);

                const urlParams = new URLSearchParams(queryString);
                console.log(urlParams.get('pseudo'));
                if (urlParams.get('pseudo') != null) {
                    if (urlParams.get('code') != null) {
                        // var pseudo = 'http://apiv1.skylord.fr:24466/api/money?joueur=' + urlParams.get('pseudo');
                        // const api_crypto = await fetch(pseudo);
                        const api_binance = await fetch('https://api.binance.com/api/v1/ticker/24hr');
                        const data = await api_binance.json();
                        // const data_crypto = await api_crypto.json();
                        // console.log(data_crypto)
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


            
        </script>  -->
    </head>
    <body>
        <div class="top">
            <div class="navbar">
                <a href="" class="item logo"><img class="image" src="https://skylord.fr/logo.png" width="64px"></a>
                <div class="navbar_menu">
                    <a class="item lien" href="">Acheter des cryptos</a>
                    <a class="item lien" href="">Trader</a>
                    <a class="item lien" href="">Accès aux rigs</a>
                    <a class="item lien active" href="">Production d'énergie</a>
                    <a class="item lien" href="">Technicien informatique</a>
                </div>
                <a class="item mon_wallet" href="">Mon Wallet</a>
                <span class="hamburger hamburger--collapse item" id="js-navbar-toggle">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </span>  
            </div>
        </div>

        <div class="energie_content">
            <div class="container">
                <div class="zone">
                    <div class="e71_323">
                        <div class="e71_3"></div>
                        <div class="e71_243">
                            <div class="e71_180">
                                <div class="e71_162"></div>
                                <div class="e71_164"></div>
                            </div>
                            <div class="e71_242">
                                <div class="e71_233">
                                <div class="e71_234"></div><span class="e71_235">ON</span>
                                </div>
                                <div class="e71_239">
                                <div class="e71_240"></div><span class="e71_241">OFF</span>
                                </div>
                            </div>
                        </div>
                        <div class="zone_groupe">
                            <div class="groupes_images">
                                <div class="zone_container">
                                    <div class="groupe_image"></div>
                                    <div class="groupe_image"></div>
                                </div>
                            </div>
                            <div class="groupe_text">
                                <div class="placement_groupe first">
                                    <div class="placement_groupe_text">
                                        <p class="placement_groupe_text_text off">OFF</p>
                                    </div>
                                </div>
                                <div class="placement_groupe">
                                    <div class="placement_groupe_text">
                                        <p class="placement_groupe_text_text off">OFF</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="zone_panneaux_solaires">
                            <div class="panneaux_solaires_images">
                                <div class="zone_container">
                                    <div class="panneaux_solaire_image"></div>
                                    <div class="panneaux_solaire_image"></div>
                                    <div class="panneaux_solaire_image"></div>
                                    <div class="panneaux_solaire_image"></div>
                                    <div class="panneaux_solaire_image"></div>
                                    <div class="panneaux_solaire_image"></div>
                                </div>
                            </div>
                            <div class="panneaux_solaires_text">
                                <div class="placement_panneaux_solaire first">
                                    <div class="zone_panneau_solaire">
                                        <p class="zone_panneau_solaire_text">ON</p>
                                    </div>
                                </div>
                                <div class="placement_panneaux_solaire">
                                    <div class="zone_panneau_solaire">
                                        <p class="zone_panneau_solaire_text">ON</p>
                                    </div>
                                </div>
                                <div class="placement_panneaux_solaire">
                                    <div class="zone_panneau_solaire">
                                        <p class="zone_panneau_solaire_text">ON</p>
                                    </div>
                                </div>
                                <div class="placement_panneaux_solaire">
                                    <div class="zone_panneau_solaire">
                                        <p class="zone_panneau_solaire_text">ON</p>
                                    </div>
                                </div>
                                <div class="placement_panneaux_solaire">
                                    <div class="zone_panneau_solaire">
                                        <p class="zone_panneau_solaire_text">ON</p>
                                    </div>
                                </div>
                                <div class="placement_panneaux_solaire">
                                    <div class="zone_panneau_solaire">
                                        <p class="zone_panneau_solaire_text off">OFF</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="zone_rigs">
                            <div class="zone_rigs_images">
                                <div class="zone_container">
                                    <div class="zone_rigs_images_image"></div>
                                    <div class="zone_rigs_images_image"></div>
                                    <div class="zone_rigs_images_image"></div>
                                    <div class="zone_rigs_images_image"></div>
                                    <div class="zone_rigs_images_image"></div>
                                    <div class="zone_rigs_images_image"></div>
                                    <div class="zone_rigs_images_image"></div>
                                    <div class="zone_rigs_images_image"></div>
                                </div>
                            </div>
                            <div class="zone_rigs_text">
                                <div class="placement_rigs first">
                                    <div class="placement_rigs_text">
                                        <p class="placement_rigs_text_text off">OFF</p>
                                    </div>
                                </div>
                                <div class="placement_rigs">
                                    <div class="placement_rigs_text">
                                        <p class="placement_rigs_text_text off">OFF</p>
                                    </div>
                                </div>
                                <div class="placement_rigs">
                                    <div class="placement_rigs_text">
                                        <p class="placement_rigs_text_text">ON</p>
                                    </div>
                                </div>
                                <div class="placement_rigs">
                                    <div class="placement_rigs_text">
                                        <p class="placement_rigs_text_text">ON</p>
                                    </div>
                                </div>
                                <div class="placement_rigs">
                                    <div class="placement_rigs_text">
                                        <p class="placement_rigs_text_text">ON</p>
                                    </div>
                                </div>
                                <div class="placement_rigs">
                                    <div class="placement_rigs_text">
                                        <p class="placement_rigs_text_text">ON</p>
                                    </div>
                                </div>
                                <div class="placement_rigs">
                                    <div class="placement_rigs_text">
                                        <p class="placement_rigs_text_text">ON</p>
                                    </div>
                                </div>
                                <div class="placement_rigs">
                                    <div class="placement_rigs_text">
                                        <p class="placement_rigs_text_text">ON</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="e71_277">
                            <div class="e71_278"></div>
                        </div>
                        <div class="e71_322">
                            <div class="e71_318">
                                <div class="e71_279"></div>
                                <div class="e71_281"></div>
                                <div class="e71_283"></div>
                                <div class="e71_284"></div>
                                <div class="e71_285"></div>
                                <div class="e71_286"></div>
                                <div class="e71_287"></div>
                                <div class="e71_288"></div>
                            </div>
                            <div class="e71_319">
                                <div class="e71_295"></div>
                                <div class="e71_297"></div>
                                <div class="e71_299"></div>
                            </div>
                            <div class="e71_320">
                                <div class="e71_301"></div>
                                <div class="e71_303"></div>
                                <div class="e71_306"></div>
                                <div class="e71_307"></div>
                                <div class="e71_308"></div>
                                <div class="e71_309"></div>
                            </div>
                            <div class="e71_321">
                                <div class="e71_314"></div>
                                <div class="e71_316"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="discord">
            <div class="container">
                <div class="acces-discord">
                    <div class="gauche">
                        <img src="../img/wumpus.png">
                    </div>
                    <div class="droite">
                        <h1>Rejoins-nous, et créons un lien unique !</h1>
                        <h2>Rejoignez une communauté de plusieurs milliers de personnes</h2>
                        <div class="margin"></div>
                        <p>Skylord est une communauté regroupant plusieurs milliers d’utilisateurs à travers toute la France.</p>
                        <p>C’est notre pôle principale, ce discord nous sert à annoncer les prochaines mises à jours, évènements sondages et même des concours exclusifs !</p>
                        <div class="bouton">
                            <a class="bouton">Rejoindre le discord</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
    <footer>
        <div class="footer-menu">
            <div class="container">
                <div class="total-haut-footer">
                    <div class="gauche">
                        <a href="https://skylord.fr">
                            <img src="https://skylord.fr/logo.png">
                        </a>
                    </div>
                    <div class="droite">
                        <ul class="menu">
                            <li>Nos CGU</li>
                            <li>Nos CGV</li>
                            <li>Mentions légales</li>
                            <li>Vote et Gagne</li>
                            <li>Boutique</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bas-footer">
            <div class="container">
                <div class="total-bas-footer">
                    <div class="gauche">
                        <h1>Skylord</h1>
                        <p>©(Copyright) 2023. Tous les droits réservés</p>
                    </div>
                    <div class="droite">
                        <ul class="menu">
                            <li><a href="https://www.tiktok.com/@play.skylord.fr"><i class="fa-brands fa-tiktok"></i></a></li>
                            <li><a href="https://twitter.com/SkylordFR"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="https://discord.gg/skylord"><i class="fa-brands fa-discord"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</html>