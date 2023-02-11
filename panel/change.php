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
        <link href="../css/style-energie.css" rel="stylesheet">
        <link href="../css/style-change.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    </head>
    <body>
        <div id="chargement" class="chargement">
            <div class="centrer">
                <div class="lds-grid"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
            </div>
        </div>
        <div id="non_chargement" style="opacity: 0;">
            <?php include '../utils/header.php'; ?>
            <div class="exchange">
                <div class="container">
                    <div class="wrapper">
                        <div class="box box1">   
                            <div class="container-fluid coinBorder">
                                <div class="row text-center">
                                    <div class="col-sm-4" style="background-color:#24253A;">Coin</div>
                                    <div class="col-sm-2" style="background-color:#24253A;">24h Change</div>
                                    <div class="col-sm-2" style="background-color:#24253A;">24h Haut</div>
                                    <div class="col-sm-2" style="background-color:#24253A;">24h Bas</div>
                                <div class="col-sm-2" style="background-color:#24253A;"> 24h Volume</div>
                            </div>
                                <div class="row text-center">
                                    <div class="col-sm-4" style="background-color:#24253A;">
                                        <p id="selectedCoin" class="boldMe"><img src="https://s2.coinmarketcap.com/static/img/coins/32x32/1.png" class="iconImage"></img>Bitcoin</p>
                                    </div>
                                    <div class="col-sm-2" style="background-color:#24253A;" id ="selectedChange">+6%</div>
                                    <div class="col-sm-2" style="background-color:#24253A;" id="selectedHigh">7.2</div>
                                    <div class="col-sm-2" style="background-color:#24253A;" id="selectedLow">6.7</div>
                                    <div class="col-sm-2" style="background-color:#24253A;" id="selectedVolume">230</div>
                                </div>
                            </div>
                        </div>
                        <div class="box box2">
                                <div class="tableau_crypto" id='app'>
                                    <table>
                                        <thead class="thead-row">
                                            <tr>
                                                <th class="coinCell" scope="col"><input  placeholder="Coin" class="form-control" size="10" type="text" v-model="search"></input></th>  
                                                <th scope="col">Valeur</th>
                                                <th scope="col">Variation sur 24h</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tableCrypto" v-on:click = "selectCoin(product.id)" v-for="product in filteredCoins">  
                                                <td data-label="Nom" class="nom">
                                                    <img v-bind:src=product.icon> 
                                                    <h1>{{product.tag}}</h1>
                                                </td>
                                                <td data-label="Valeur">
                                                    <h1>{{product.price}} $</h1>
                                                </td>
                                                <td  v-if= "product.change[0]!='-'" data-label="Variation sur 24h">
                                                    <h1 style="color:#30ff67;">{{product.change}} %<h1>
                                                </td>
                                                <td v-else data-label="Variation sur 24h">
                                                    <h1 style="color:#ff5c30;">{{product.change}} %<h1>
                                                </td>
                                            </tr>                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>  

                            <div class="box box3">
                                <div class="row">
                                    <div class="col-sm-5 borderMe" style="background-color:#24253A;">
                                        <canvas id="ctx" style="width: 100%;" class="chartMe"></canvas>
                                    </div>
                                    <div class="col-sm-9 borderMe" style="background-color:#24253A;">
                                        <!-- <div class="box box12"> -->
                                        <div class="tableau_crypto tableau_crypto2">
                                            <table>
                                                <thead>
                                                    <tr class="thead">
                                                        <th scope="col">Nom</th>
                                                        <th scope="col">Montant</th>
                                                        <th scope="col">Valeur</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tableau_crypto">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="box box5">
                                <div class="container-fluid tradeWindow">
                                    <div class="row">
                                        <div class="col-sm-6 borderMe" style="background-color:#24253A;">
                                            <p class ="text-center" class="titre"><b>Achat</b></p>
                                            <div id="resultat_achat"></div>
                                            <table>
                                                <tr>
                                                    <th class ="text-right" style ="color:white;">Prix: </th>
                                                    <th><input class="padding form-control"  placeholder="0$" id="buyPrice" style="opacity:0.5;color:white;" readonly></th>
                                                </tr>
                                                <tr>
                                                    <th class ="text-right" style ="color:white;">Montant:</th>
                                                    <th>
                                                        <input size="105" class="padding form-control"  placeholder="0" id="buyAmount" list="massBuy" > 
                                                        <datalist id="massBuy">
                                                                <option value=300 id="buyOptionOne">
                                                                <option value=250 id="buyOptionTwo">
                                                                <option value=500 id="buyOptionThree">
                                                                <option value=650 id="buyOptionFour">
                                                        </datalist>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class ="text-right" style ="color:white;">Total:</th>
                                                    <th><input size="105"  id="buyTotal" class="padding form-control"  style="opacity:0.5;color:white;" placeholder="0$" readonly></th>   
                                                </tr>
                                            </table>
                                            <input class="btn button buyButton btn-success float-right"type="button"placeholder="0" value="Buy" onclick="buyCoin()">
                                        </div>
                                        <div class="col-sm-6 borderMe" style="background-color:#24253A;"><p class ="text-cente"><b>Vente</b> </p>
                                        <div id="resultat_vente"></div>
                                        <table>
                                            <tr>
                                                <th class ="text-right" style ="color:white;">Prix: </th>
                                                <th><input class="padding form-control"  placeholder="0$" id="sellPrice" style="opacity:0.5;color:white;" readonly></th>
                                            </tr>
                                            <tr>
                                                <th class ="text-right" style ="color:white;">Montant:</th>
                                                <th>
                                                    <input size="55" class="padding form-control"  placeholder="0" id="sellAmount" list="massSell">
                                                    <datalist id="massSell">
                                                        <option value=300 id="sellOptionOne">
                                                        <option value=250 id="sellOptionTwo">
                                                        <option value=500 id="sellOptionThree">
                                                        <option value=650 id="sellOptionFour">
                                                    </datalist>
                                                
                                                </th>
                                            </tr>
                                            <tr>
                                                <th class ="text-right" style ="color:white;">Total:</th>
                                                <th><input size="105" class="padding form-control" placeholder="0$"  id="sellTotal" style="opacity:0.5;color:white;"  readonly></th>
                                            </tr>
                                        </table>
                                        <input class="btn button sellButton float-right btn-danger" type="button"placeholder="0" value="Sell" onclick="sellCoin()">
                                    </div>
                                </div>
                            </div>
                            <div class="box box6 text-center" style="background-color:red;" > 
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
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
    <?php include '../utils/footer.php'; ?>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://kit.fontawesome.com/da8f9491f0.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/change.js"></script>
    <script>
            $(document).ready(async function(){
                document.getElementById("footer").style.display = 'none';
                var mon_pseudo='<?php echo $session_pseudo; ?>'
                var mon_code='<?php echo $session_code; ?>'
                pseudo = mon_pseudo;
                code = mon_code;
                const queryString = window.location.search;
                if (mon_pseudo != '') {
                    if (mon_code != '') {
                        var json_rig = 'https://apiv1.skylord.fr/api/checkconnect?pseudo=' + pseudo + '&code=' + code;
                        const api_rig = await fetch(json_rig);
                        const data_rig = await api_rig.json();
                        if (data_rig["Acces"] == "True"){
                            var json_money = 'https://apiv1.skylord.fr/api/joueur/money?pseudo=' + pseudo;
                            const api_money = await fetch(json_money);
                            const data_money = await api_money.json();
                            addWallet(data_money["Format"]);

                            var pseudo = 'https://apiv1.skylord.fr/api/crypto?pseudo=' + pseudo + '&code=' + code;
                            const api_crypto = await fetch(pseudo);
                            const api_binance = await fetch('https://api.binance.com/api/v1/ticker/24hr');

                            const data = await api_binance.json();
                            const data_crypto = await api_crypto.json();

                            var baseToText = { BTC: "Bitcoin", ETH: "Ethereum", LTC: "LiteCoin", SHIB: "Shiba", DOGE: "DogeCoin", XRP: "Ripple", DOT: "Polkadot", BNB: "BinanceCoin", ADA: "Cardano" };
                            var baseToNumber7Days = { BTC: "1", ETH: "279", LTC: "2", SHIB: "11939", DOGE: "5", XRP: "44", DOT: "12171", BNB: "825", ADA: "975"}
                            var valeur_solde = 0;
                            var maListe = [];
                            $('#tableau_crypto').html('');
                            if (data_crypto["Acces"] == "True"){
                                var numero = 0
                                for (let i = 2000; i > 0; i--) {
                                    if ((data[i].symbol == "BTCUSDT") || (data[i].symbol == "ETHUSDT") || (data[i].symbol == "SHIBUSDT") || (data[i].symbol == "LTCUSDT") || (data[i].symbol == "DOGEUSDT") || (data[i].symbol == "XRPUSDT") || (data[i].symbol == "DOTUSDT") || (data[i].symbol == "BNBUSDT") || (data[i].symbol == "ADAUSDT")){
                                        const nom_crypto = data[i].symbol.split('USDT');
                                        maListe[numero] = i

                                        var variation = "perte";
                                        if (data[i].priceChangePercent > 0) {
                                            variation = "gain";
                                        }

                                        valeur_solde = valeur_solde+(data_crypto[nom_crypto[0]]*data[i].lastPrice)
                                        var nom_crypto_img = nom_crypto[0].toLowerCase();
                                        var valeur_crypto = data_crypto[nom_crypto[0]]*data[i].lastPrice
                                        var valeur_crypto = valeur_crypto.toString().split('.');
                                        var tableau_crypto = "<tr><td data-label=\"Nom\" class=\"nom\"><img class=\"img\" src=\"../img/crypto/" + nom_crypto_img + "logo.png\"> <h1>" + nom_crypto[0] +"</h1></td><td data-label=\"Montant\"><h1>" + data_crypto[nom_crypto[0]] + "</h1></td><td data-label=\"Valeur\"><h1>≈" + valeur_crypto[0] + " $</h1></td></tr>"
                                        $(tableau_crypto).prependTo("#tableau_crypto");
                                        setWallet(numero,data_crypto[nom_crypto[0]]);
                                        numero = numero+1;
                                        
                                    }
                                    
                                }
                                document.getElementById("chargement").style.display = 'none';
                                document.getElementById("non_chargement").style.display = 'block';
                                document.getElementById("non_chargement").style.opacity = '1';
                                document.getElementById("footer").style.display = 'block';
                            } else {
                                document.body.innerHTML = "<p>ERREUR, Vous n'êtes plus connecté.</p>"; 
                                document.location.href="https://crypto.skylord.fr/deconnexion.php";
                            }
                        } else {
                            document.body.innerHTML = "<p>ERREUR, Vous n'êtes plus connecté.</p>"; 
                            document.location.href="https://crypto.skylord.fr/deconnexion.php";
                        }
                    }
                }
                mes_cryptos()
                async function mes_cryptos() {
                    pseudo = mon_pseudo;
                    code = mon_code;
                    if (mon_pseudo != '') {
                        if (mon_code != '') {
                            var json_rig = 'https://apiv1.skylord.fr/api/checkconnect?pseudo=' + pseudo + '&code=' + code;
                            const api_rig = await fetch(json_rig);
                            const data_rig = await api_rig.json();
                            if (data_rig["Acces"] == "True"){
                                var json_money = 'https://apiv1.skylord.fr/api/joueur/money?pseudo=' + pseudo;
                                const api_money = await fetch(json_money);
                                const data_money = await api_money.json();
                                addWallet(data_money["Format"]);

                                var pseudo = 'https://apiv1.skylord.fr/api/crypto?pseudo=' + pseudo + '&code=' + code;
                                const api_crypto = await fetch(pseudo);
                                const api_binance = await fetch('https://api.binance.com/api/v1/ticker/24hr');

                                const data = await api_binance.json();
                                const data_crypto = await api_crypto.json();

                                var baseToText = { BTC: "Bitcoin", ETH: "Ethereum", LTC: "LiteCoin", SHIB: "Shiba", DOGE: "DogeCoin", XRP: "Ripple", DOT: "Polkadot", BNB: "BinanceCoin", ADA: "Cardano" };
                                var baseToNumber7Days = { BTC: "1", ETH: "279", LTC: "2", SHIB: "11939", DOGE: "5", XRP: "44", DOT: "12171", BNB: "825", ADA: "975"}
                                var valeur_solde = 0;
                                if (data_crypto["Acces"] == "True"){
                                    $('#tableau_crypto').html('');
                                    for (let i = 0; i < 9; i++) {
                                        var numero = maListe[i];

                                        const nom_crypto = data[numero].symbol.split('USDT');
                                        
                                        var variation = "perte";
                                        if (data[numero].priceChangePercent > 0) {
                                            variation = "gain";
                                        }

                                        valeur_solde = valeur_solde+(data_crypto[nom_crypto[0]]*data[numero].lastPrice)
                                        var nom_crypto_img = nom_crypto[0].toLowerCase();
                                        var valeur_crypto = data_crypto[nom_crypto[0]]*data[numero].lastPrice
                                        var valeur_crypto = valeur_crypto.toString().split('.');
                                        var tableau_crypto = "<tr><td data-label=\"Nom\" class=\"nom\"><img class=\"img\" src=\"../img/crypto/" + nom_crypto_img + "logo.png\"> <h1>" + nom_crypto[0] +"</h1></td><td data-label=\"Montant\"><h1>" + data_crypto[nom_crypto[0]] + "</h1></td><td data-label=\"Valeur\"><h1>≈" + valeur_crypto[0] + " $</h1></td></tr>"
                                        $(tableau_crypto).prependTo("#tableau_crypto");
                                        setWallet(i,data_crypto[nom_crypto[0]]);
                                    }
                                    document.getElementById("chargement").style.display = 'none';
                                    document.getElementById("non_chargement").style.display = 'block';
                                    document.getElementById("non_chargement").style.opacity = '1';
                                    document.getElementById("footer").style.display = 'block';
                                } else {
                                    document.body.innerHTML = "<p>ERREUR, Vous n'êtes plus connecté.</p>"; 
                                    document.location.href="https://crypto.skylord.fr/deconnexion.php";
                                }
                            } else {
                                document.body.innerHTML = "<p>ERREUR, Vous n'êtes plus connecté.</p>"; 
                                document.location.href="https://crypto.skylord.fr/deconnexion.php";
                            }
                        }
                    }
                    // console.log("Actualisation réussie.")
                    setTimeout(mes_cryptos,5000);
                }
            })
            async function buyCoin() {
                var pseudo='<?php echo $session_pseudo; ?>'
                var code='<?php echo $session_code; ?>'
                var crypto = getActuelCrypto_Tag()
                var nombre = $("#buyAmount").val()
                if (!nombre){
                    var nombre = 0;
                }
                var json_rig = 'https://apiv1.skylord.fr/api/action/achat?pseudo=' + pseudo + '&code=' + code + "&crypto=" + crypto + "USDT&nombre=" + nombre;
                const api_rig = await fetch(json_rig);
                const data_rig = await api_rig.json();
                if (data_rig["Acces"] == "True"){
                    if (data_rig["Resultat"] == "01"){
                        $('#resultat_achat').html('<p style="color:#CEFF33">Vous avez bien acheté '+ nombre + ' ' + getActuelCrypto_Name() +'</p>');
                    } else if (data_rig["Resultat"] == "14"){
                        $('#resultat_achat').html('<p style="color:#FF6133">Vous n\'avez pas assez d\'argent.</p>');
                    } else if (data_rig["Resultat"] == "15"){
                        $('#resultat_achat').html('<p style="color:#FF6133">Vous ne pouvez acheter 0 '+ getActuelCrypto_Name() +'.</p>');
                    } else if (data_rig["Resultat"] == "16"){
                        $('#resultat_achat').html('<p style="color:#FF6133">Vous devez spécifier un nombre de '+ getActuelCrypto_Name() +' à acheter.</p>');
                    } else if (data_rig["Resultat"] == "17"){
                        $('#resultat_achat').html('<p style="color:#FF6133">Vous devez spécifier la crypto-monnaie à acheter.</p>');
                    } else {
                        $('#resultat_achat').html('<p style="color:#FF6133">Erreur inattendue.</p>');
                    }
                    $("#buyAmount").val('');
                    $("#buyTotal").val('');
                } else {
                    document.body.innerHTML = "<p>ERREUR, Vous n'êtes plus connecté.</p>"; 
                    document.location.href="https://crypto.skylord.fr/deconnexion.php";
                }

            }
            async function sellCoin() {
                var pseudo='<?php echo $session_pseudo; ?>'
                var code='<?php echo $session_code; ?>'
                var crypto = getActuelCrypto_Tag()
                var nombre = $("#sellAmount").val()
                if (!nombre){
                    var nombre = 0;
                }
                var json_rig = 'https://apiv1.skylord.fr/api/action/vente?pseudo=' + pseudo + '&code=' + code + "&crypto=" + crypto + "USDT&nombre=" + nombre;
                const api_rig = await fetch(json_rig);
                const data_rig = await api_rig.json();
                if (data_rig["Acces"] == "True"){
                    if (data_rig["Resultat"] == "01"){
                        $('#resultat_vente').html('<p style="color:#CEFF33">Vous avez bien vendu '+ nombre + ' ' + getActuelCrypto_Name() +'</p>');
                    } else if (data_rig["Resultat"] == "14"){
                        $('#resultat_vente').html('<p style="color:#FF6133">Vous n\'avez pas assez de '+ getActuelCrypto_Name() +'.</p>');
                    } else if (data_rig["Resultat"] == "15"){
                        $('#resultat_vente').html('<p style="color:#FF6133">Vous ne pouvez vendre 0 '+ getActuelCrypto_Name() +'.</p>');
                    } else if (data_rig["Resultat"] == "16"){
                        $('#resultat_vente').html('<p style="color:#FF6133">Vous devez spécifier un nombre de '+ getActuelCrypto_Name() +' à acheter.</p>');
                    } else if (data_rig["Resultat"] == "17"){
                        $('#resultat_vente').html('<p style="color:#FF6133">Vous devez spécifier la crypto-monnaie à acheter.</p>');
                    } else {
                        $('#resultat_achat').html('<p style="color:#FF6133">Erreur inattendue.</p>');
                    }
                    $("#sellAmount").val('');
                    $("#sellTotal").val('');
                } else {
                    document.body.innerHTML = "<p>ERREUR, Vous n'êtes plus connecté.</p>"; 
                    document.location.href="https://crypto.skylord.fr/deconnexion.php";
                }

            }
        </script>
    
</html>
<?php } else {
header("Location: /index.php");
}?>