<?php 
session_start();
if ((isset($_SESSION['pseudo'])) && (isset($_SESSION['code']))) {
$session_pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:''; 
$session_code=(isset($_SESSION['code']))?$_SESSION['code']:'';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include '../utils/head_seo.php'; ?>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
        <title>Mon espace joueur - Crypto Skylord</title>
        <link href="../css/style-panel.css" rel="stylesheet">
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script src="https://kit.fontawesome.com/da8f9491f0.js" crossorigin="anonymous"></script>
        <script>
            $(document).ready(async function(){
                document.getElementById("footer").style.display = 'none';
                var mon_pseudo='<?php echo $session_pseudo; ?>'
                var mon_code='<?php echo $session_code; ?>'
                const queryString = window.location.search;
                
                if (mon_pseudo != '') {
                    if (mon_code != '') {
                        var pseudo = 'https://apiv1.skylord.fr/api/crypto?pseudo=' + mon_pseudo + '&code=' + mon_code;
                        const api_crypto = await fetch(pseudo);
                        const api_binance = await fetch('https://api.binance.com/api/v1/ticker/24hr');

                        const data = await api_binance.json();
                        const data_crypto = await api_crypto.json();

                        var baseToText = { BTC: "Bitcoin", ETH: "Ethereum", LTC: "LiteCoin", SHIB: "Shiba", DOGE: "DogeCoin", XRP: "Ripple", DOT: "Polkadot", BNB: "BinanceCoin", ADA: "Cardano" };
                        var baseToNumber7Days = { BTC: "1", ETH: "279", LTC: "2", SHIB: "11939", DOGE: "5", XRP: "44", DOT: "12171", BNB: "825", ADA: "975"}
                        var valeur_solde = 0;
                        if (data_crypto["Acces"] == "True"){
                            for (let i = 2000; i > 0; i--) {
                                if ((data[i].symbol == "BTCUSDT") || (data[i].symbol == "ETHUSDT") || (data[i].symbol == "SHIBUSDT") || (data[i].symbol == "LTCUSDT") || (data[i].symbol == "DOGEUSDT") || (data[i].symbol == "XRPUSDT") || (data[i].symbol == "DOTUSDT") || (data[i].symbol == "BNBUSDT") || (data[i].symbol == "ADAUSDT")){
                                    const nom_crypto = data[i].symbol.split('USDT');
                                    
                                    var variation = "perte";
                                    if (data[i].priceChangePercent > 0) {
                                        variation = "gain";
                                    }

                                    valeur_solde = valeur_solde+(data_crypto[nom_crypto[0]]*data[i].lastPrice)
                                    var nom_crypto_img = nom_crypto[0].toLowerCase();
                                    var valeur_crypto = data_crypto[nom_crypto[0]]*data[i].lastPrice
                                    var valeur_crypto = valeur_crypto.toString().split('.');
                                    var tableau_crypto = "<tr><td data-label=\"Nom\" class=\"nom\"><img src=\"../img/crypto/" + nom_crypto_img + "logo.png\"> <h1>" + nom_crypto[0] +"</h1><h2>" + baseToText[nom_crypto[0]] + "</h2></td><td data-label=\"Montant\"><h1>" + data_crypto[nom_crypto[0]] + "</h1></td><td data-label=\"Valeur\"><h1>≈" + valeur_crypto[0] + " $</h1></td><td data-label=\"Variation sur 24h\"><h1 class=\" " + variation + " \"> " + data[i].priceChangePercent + "%<h1></td><td data-label=\"Les 7 derniers jours\"><img src=\"https://www.coingecko.com/coins/" + baseToNumber7Days[nom_crypto[0]] + "/sparkline\" style=\"width:96px\" /></td><td data-label=\" \"><a href=\"https://crypto.skylord.fr/panel/change.php\">Trader</a></td></tr>"
                                    $(tableau_crypto).prependTo("#tableau_crypto");
                                    
                                }
                                
                            }
                            document.getElementById("solde").textContent = "≈" + valeur_solde + "$";
                            document.getElementById("info_pseudo").textContent = mon_pseudo;
                            document.getElementById("info_connexion").textContent = data_crypto["Date_heure"];
                            var valeur_img = "https://minotar.net/avatar/" + mon_pseudo;
                            $("#info_avatar").attr('src', valeur_img);
                            document.getElementById("chargement").style.display = 'none';
                            document.getElementById("non_chargement").style.display = 'block';
                            document.getElementById("footer").style.display = 'block';
                        } else {
                            document.body.innerHTML = "<p>ERREUR, Vous n'êtes plus connecté.</p>"; 
                            document.location.href="https://crypto.skylord.fr/deconnexion.php";
                        }
                    } 
                } 

                actualisation_all();

                async function actualisation_all() {
                    var mon_pseudo='<?php echo $session_pseudo; ?>'
                    var mon_code='<?php echo $session_code; ?>'
                    if (mon_pseudo != '') {
                        if (mon_code != '') {
                            var pseudo = 'https://apiv1.skylord.fr/api/crypto?pseudo=' + mon_pseudo + '&code=' + mon_code;
                            const api_crypto = await fetch(pseudo);
                            const api_binance = await fetch('https://api.binance.com/api/v1/ticker/24hr');

                            const data = await api_binance.json();
                            const data_crypto = await api_crypto.json();

                            var baseToText = { BTC: "Bitcoin", ETH: "Ethereum", LTC: "LiteCoin", SHIB: "Shiba", DOGE: "DogeCoin", XRP: "Ripple", DOT: "Polkadot", BNB: "BinanceCoin", ADA: "Cardano" };
                            var baseToNumber7Days = { BTC: "1", ETH: "279", LTC: "2", SHIB: "11939", DOGE: "5", XRP: "44", DOT: "12171", BNB: "825", ADA: "975"}
                            var valeur_solde = 0;
                            $('#tableau_crypto').html('');
                            if (data_crypto["Acces"] == "True"){
                                for (let i = 2000; i > 0; i--) {
                                    if ((data[i].symbol == "BTCUSDT") || (data[i].symbol == "ETHUSDT") || (data[i].symbol == "SHIBUSDT") || (data[i].symbol == "LTCUSDT") || (data[i].symbol == "DOGEUSDT") || (data[i].symbol == "XRPUSDT") || (data[i].symbol == "DOTUSDT") || (data[i].symbol == "BNBUSDT") || (data[i].symbol == "ADAUSDT")){
                                        const nom_crypto = data[i].symbol.split('USDT');
                                        
                                        var variation = "perte";
                                        if (data[i].priceChangePercent > 0) {
                                            variation = "gain";
                                        }

                                        valeur_solde = valeur_solde+(data_crypto[nom_crypto[0]]*data[i].lastPrice)
                                        var nom_crypto_img = nom_crypto[0].toLowerCase();
                                        var valeur_crypto = data_crypto[nom_crypto[0]]*data[i].lastPrice
                                        var valeur_crypto = valeur_crypto.toString().split('.');
                                        var tableau_crypto = "<tr><td data-label=\"Nom\" class=\"nom\"><img src=\"../img/crypto/" + nom_crypto_img + "logo.png\"> <h1>" + nom_crypto[0] +"</h1><h2>" + baseToText[nom_crypto[0]] + "</h2></td><td data-label=\"Montant\"><h1>" + data_crypto[nom_crypto[0]] + "</h1></td><td data-label=\"Valeur\"><h1>≈" + valeur_crypto[0] + " $</h1></td><td data-label=\"Variation sur 24h\"><h1 class=\" " + variation + " \"> " + data[i].priceChangePercent + "%<h1></td><td data-label=\"Les 7 derniers jours\"><img src=\"https://www.coingecko.com/coins/" + baseToNumber7Days[nom_crypto[0]] + "/sparkline\" style=\"width:96px\" /></td><td data-label=\" \"><a href=\"https://crypto.skylord.fr/panel/change.php\">Trader</a></td></tr>"
                                        $(tableau_crypto).prependTo("#tableau_crypto");
                                        
                                    }
                                    
                                }
                                document.getElementById("solde").textContent = "≈" + valeur_solde + "$";
                                document.getElementById("info_pseudo").textContent = mon_pseudo;
                                document.getElementById("info_connexion").textContent = data_crypto["Date_heure"];
                                var valeur_img = "https://minotar.net/avatar/" + mon_pseudo;
                                $("#info_avatar").attr('src', valeur_img);
                            } else {
                                document.body.innerHTML = "<p>ERREUR, Vous n'êtes plus connecté.</p>"; 
                                document.location.href="https://crypto.skylord.fr/deconnexion.php";
                            }
                        } 
                    } 
                    console.log("Actualisation réussie.");
                    setTimeout(actualisation_all,10000);
                }

            });
            
        </script>
    </head>
    <body>
        <div id="chargement" class="chargement">
            <div class="centrer">
                <div class="lds-grid"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
            </div>
        </div>
        <div id="non_chargement" style="display:none;">
            <?php include '../utils/header.php'; ?>
            <div class="informations">
                <div class="container">
                    <div class="details">
                        <img id="info_avatar" src="https://minotar.net/avatar/Moi" width="72px">
                        <div class="more_details">
                            <h1 class="titre" id="info_pseudo">Mois</h1>
                            <div class="sous_details">
                                <div class="coordonnes">
                                    <h2>Type d'utilisateur</h2>
                                    <p id="info_type">Joueur</p>
                                </div>
                                <div class="coordonnes">
                                    <h2>Date et heure de la dernière connexion</h2>
                                    <p id="info_connexion">00 00 0000 à 00:00</p>
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
                                <span id="solde">≈ 0.00000000$</span>
                            </div>

                            <div class="tableau_crypto">
                                <table>
                                    <thead>
                                        <tr class="thead home">
                                            <th scope="col">Nom</th>
                                            <th scope="col">Montant</th>
                                            <th scope="col">Valeur</th>
                                            <th scope="col">Variation sur 24h</th>
                                            <th scape="col">Les 7 derniers jours</th>
                                            <th scope="col"> </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableau_crypto" class="home">
                                        
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
        </div>
    </body>

    <?php include '../utils/footer.php'; ?>

</html>
<?php } else {
header("Location: /index.php");
}?>