<?php 
session_start();
if ((isset($_SESSION['pseudo'])) && (isset($_SESSION['code']))) {
$session_pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:''; 
$session_code=(isset($_SESSION['code']))?$_SESSION['code']:'';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
        <title>Mon éspace joueur - Crypto Skylord</title>
        <link href="../css/style-panel.css" rel="stylesheet">
        <link href="../css/style-energie.css" rel="stylesheet">
        <link href="../css/style-change.css" rel="stylesheet">
        <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'> -->
        <!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

        <script>
            $(document).ready(async function(){
                document.getElementById("footer").style.display='none';
                var mon_pseudo='<?php echo $session_pseudo; ?>'
                var mon_code='<?php echo $session_code; ?>'
 
                document.getElementById("footer").style.display='block';
            });
        </script>
        
    </head>
    <body>
        <?php include '../utils/header.php'; ?>
        <div class="container">
            <div class="wrapper">
                <div class="box box1">   
                    <div class="container-fluid coinBorder" style="margin-top:6%;">
                        <div class="row text-center">
                            <div class="col-sm-4" style="background-color:#24253A;">Coin</div>
                            <div class="col-sm-2" style="background-color:#24253A;">24h Change</div>
                            <div class="col-sm-2" style="background-color:#24253A;">24h High</div>
                            <div class="col-sm-2" style="background-color:#24253A;">24h Low</div>
                        <div class="col-sm-2" style="background-color:#24253A;"> 24h Volume</div>
                    </div>
                        <div class="row text-center">
                            <div class="col-sm-4" style="background-color:#24253A;">
                                <p id="selectedCoin" class="boldMe"><img src="https://s2.coinmarketcap.com/static/img/coins/32x32/1567.png" class="iconImage"></img>Nano</p>
                            </div>
                            <div class="col-sm-2" style="background-color:#24253A;" id ="selectedChange">+6%</div>
                            <div class="col-sm-2" style="background-color:#24253A;" id="selectedHigh">7.2</div>
                            <div class="col-sm-2" style="background-color:#24253A;" id="selectedLow">6.7</div>
                            <div class="col-sm-2" style="background-color:#24253A;" id="selectedVolume">230</div>
                        </div>
                    </div>
                </div>
                <div class="box box2">
                    <h2 class="text-center">Markets</h2>
                        <div class="tableau_crypto" id='app'>
                            <table>
                                <thead class="thead-row">
                                    <tr>
                                        <th class="coinCell" scope="col"><input  placeholder="Coin" class="form-control" size="10" type="text" v-model="search"></input></th>  
                                        <th scope="col">Valeur</th>
                                        <th scope="col">Volume</th>
                                        <th scope="col">Variation sur 24h</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="test" v-on:click = "selectCoin(product.id)" v-for="product in filteredCoins">  
                                        <td data-label="Nom" class="nom">
                                            <img v-bind:src=product.icon> 
                                            <h1>{{product.tag}}</h1>
                                        </td>
                                        <td data-label="Valeur">
                                            <h1>{{product.price}} $</h1>
                                        </td>
                                        <td data-label="Volume">
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
                        <canvas id="ctx" style="height:200px;" class="chartMe"></canvas>
                    </div>
                    <div class="box box5">
                        <div class="container-fluid tradeWindow">
                            <div class="row">
                                <div class="col-sm-6 borderMe" style="background-color:#24253A;">
                                    <p class ="text-center"><b><i>Market Buy</i></b></p>
                                    <table>
                                        <tr>
                                            <th class ="text-right" style ="color:white;">Price: </th>
                                            <th><input class="padding form-control"  placeholder="0" id="buyPrice" style="background-color:gray;color:white;" readonly></th>
                                        </tr>
                                        <tr>
                                            <th class ="text-right" style ="color:white;">Amount:</th>
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
                                            <th><input size="105"  id="buyTotal" class="padding form-control"  style="background-color:gray;color:white;" placeholder="$0" readonly></th>   
                                        </tr>
                                    </table>
                                    <input class="btn button buyButton btn-success float-right"type="button"placeholder="0" value="Buy" style="background-color:#30ff67;" onclick="buyCoin()">
                                </div>
                                <div class="col-sm-6 borderMe" style="background-color:#24253A;"><p class ="text-cente"><b><i>Market Sell </i></b> </p>
                                <table>
                                    <tr>
                                        <th class ="text-right" style ="color:white;">Price: </th>
                                        <th><input class="padding form-control"  placeholder="0" id="sellPrice" style="background-color:gray;color:white;" readonly></th>
                                    </tr>
                                    <tr>
                                        <th class ="text-right" style ="color:white;">Amount:</th>
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
                                        <th><input size="105" class="padding form-control" placeholder="0"  id="sellTotal" style="background-color:gray;color:white;"  readonly></th>
                                    </tr>
                                </table>
                                <input class="btn button buyButton float-right btn-danger"type="button"placeholder="0" style="background-color: #ff5c30;" value="Sell" onclick="sellCoin()">
                            </div>
                        </div>
                    </div>
                    <div class="box box6 text-center" style="background-color:red;" > 
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
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js'></script>
    <script src="https://kit.fontawesome.com/da8f9491f0.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/change.js"></script>
    <?php include '../utils/footer.php'; ?>

</html>
<?php } else {
header("Location: /index.php");
}?>