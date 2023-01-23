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
        <div class="top" style="z-index:9">
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
                    <div class="zone_eolienne">
                        <div class="zone_eolienne_images">
                            <div class="zone_container">
                                <div class="zone_eolienne_image off" id="ei1"></div>
                                <div class="zone_eolienne_image" id="ei2"></div>
                            </div>
                        </div>
                        <div class="zone_eolienne_text">
                            <div class="zone_eolienne_placement first">
                                <div class="placement_text">
                                    <p class="placement_text_text off" id="et1">OFF</p>
                                </div>
                            </div>
                            <div class="zone_eolienne_placement">
                                <div class="placement_text">
                                    <p class="placement_text_text" id="et2">ON</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="zone_groupe">
                        <div class="groupes_images">
                            <div class="zone_container">
                                <div class="groupe_image off" id="gi1"></div>
                                <div class="groupe_image off" id="gi2"></div>
                            </div>
                        </div>
                        <div class="groupe_text">
                            <div class="placement_groupe first">
                                <div class="placement_text">
                                    <p class="placement_text_text off" id="gt1">OFF</p>
                                </div>
                            </div>
                            <div class="placement_groupe">
                                <div class="placement_text">
                                    <p class="placement_text_text off" id="gt2">OFF</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="zone_panneaux_solaires">
                        <div class="panneaux_solaires_images">
                            <div class="zone_container">
                                <div class="panneaux_solaire_image" id="psi1"></div>
                                <div class="panneaux_solaire_image" id="psi2"></div>
                                <div class="panneaux_solaire_image" id="psi3"></div>
                                <div class="panneaux_solaire_image" id="psi4"></div>
                                <div class="panneaux_solaire_image" id="psi5"></div>
                                <div class="panneaux_solaire_image off" id="psi6"></div>
                            </div>
                        </div>
                        <div class="panneaux_solaires_text">
                            <div class="placement_panneaux_solaire first">
                                <div class="placement_text">
                                    <p class="placement_text_text" id="pst1">ON</p>
                                </div>
                            </div>
                            <div class="placement_panneaux_solaire">
                                <div class="placement_text">
                                    <p class="placement_text_text" id="pst2">ON</p>
                                </div>
                            </div>
                            <div class="placement_panneaux_solaire">
                                <div class="placement_text">
                                    <p class="placement_text_text" id="pst3">ON</p>
                                </div>
                            </div>
                            <div class="placement_panneaux_solaire">
                                <div class="placement_text">
                                    <p class="placement_text_text" id="pst4">ON</p>
                                </div>
                            </div>
                            <div class="placement_panneaux_solaire">
                                <div class="placement_text">
                                    <p class="placement_text_text" id="pst5">ON</p>
                                </div>
                            </div>
                            <div class="placement_panneaux_solaire">
                                <div class="placement_text">
                                    <p class="placement_text_text off" id="pst6">OFF</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="zone_rigs">
                        <div class="zone_rigs_images">
                            <div class="zone_container">
                                <div class="zone_rigs_images_image off" id="ri1"></div>
                                <div class="zone_rigs_images_image off" id="ri2"></div>
                                <div class="zone_rigs_images_image" id="ri3"></div>
                                <div class="zone_rigs_images_image" id="ri4"></div>
                                <div class="zone_rigs_images_image" id="ri5"></div>
                                <div class="zone_rigs_images_image" id="ri6"></div>
                                <div class="zone_rigs_images_image" id="ri7"></div>
                                <div class="zone_rigs_images_image" id="ri8"></div>
                            </div>
                        </div>
                        <div class="zone_rigs_text">
                            <div class="placement_rigs first">
                                <div class="placement_text">
                                    <p class="placement_text_text off" id="rt1">OFF</p>
                                </div>
                            </div>
                            <div class="placement_rigs">
                                <div class="placement_text">
                                    <p class="placement_text_text off" id="rt2">OFF</p>
                                </div>
                            </div>
                            <div class="placement_rigs">
                                <div class="placement_text">
                                    <p class="placement_text_text" id="rt3">ON</p>
                                </div>
                            </div>
                            <div class="placement_rigs">
                                <div class="placement_text">
                                    <p class="placement_text_text" id="rt4">ON</p>
                                </div>
                            </div>
                            <div class="placement_rigs">
                                <div class="placement_text">
                                    <p class="placement_text_text" id="rt5">ON</p>
                                </div>
                            </div>
                            <div class="placement_rigs">
                                <div class="placement_text">
                                    <p class="placement_text_text" id="rt6">ON</p>
                                </div>
                            </div>
                            <div class="placement_rigs">
                                <div class="placement_text">
                                    <p class="placement_text_text" id="rt7">ON</p>
                                </div>
                            </div>
                            <div class="placement_rigs">
                                <div class="placement_text">
                                    <p class="placement_text_text" id="rt8">ON</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="zone_network_wallet">
                        <div class="zone_network_wallet_image"></div>
                    </div>
                        <svg
                        width="736"
                        height="563"
                        viewBox="0 0 736 563"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        style="margin-top: 112px;  margin-left: 84px; height: 562px;"
                        preserveAspectRatio="none"
                        >
                        <path d="M735.608 5.5H646.501V485" stroke="#FF00D6"></path>
                        <path d="M735.608 85.5L646.501 85.5" stroke="#FF00D6"></path>
                        <path d="M735.608 165.5H646.501" stroke="#FF00D6"></path>
                        <path d="M735.608 244.5L646.496 243.5" stroke="#FF00D6"></path>
                        <path d="M735.608 329.5H646.501" stroke="#FF00D6"></path>
                        <path d="M735.608 408.5L646.506 409.52" stroke="#FF00D6"></path>
                        <path d="M735.608 484.5H646.501" stroke="#FF00D6"></path>
                        <path d="M735.608 562.5H646.5V485" stroke="#FF00D6"></path>
                        <path d="M646.108 484.5H307.108" stroke="#FF00D6"></path>
                        <path d="M441.657 36.4969L408.608 36.4969L408.608 460.5L408.608 484.5" stroke="#FF00D6"></path>
                        <path d="M441.108 168.5L408.596 168.5" stroke="#FF00D6"></path>
                        <path d="M274.608 0.500031H231.108L231.108 445" stroke="#FF00D6"></path>
                        <path d="M274.608 64.4998L230.596 64.4998" stroke="#FF00D6"></path>
                        <path d="M274.608 128.5H230.608" stroke="#FF00D6"></path>
                        <path d="M274.608 192.5L230.596 192.5" stroke="#FF00D6"></path>
                        <path d="M274.608 256.5L230.608 256.5" stroke="#FF00D6"></path>
                        <path d="M274.608 324.5L230.619 324.5" stroke="#FF00D6"></path>
                        <path d="M67.6078 31.4991L30.6078 31.4991L30.6078 482.5L148.608 482.5" stroke="#FF00D6"></path>
                        <path d="M67.6078 166.5H30.6078" stroke="#FF00D6"></path>
                    </svg>
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
                            <a href="https://discord.gg/skylord" class="bouton">Rejoindre le discord</a>
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