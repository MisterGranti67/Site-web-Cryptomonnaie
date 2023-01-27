<?php 
session_start();
if ((isset($_SESSION['pseudo'])) && (isset($_SESSION['code']))) {
$session_pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:''; 
$session_code=(isset($_SESSION['code']))?$_SESSION['code']:'';
$session_code=(isset($_SESSION['code']))?$_SESSION['code']:'';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
        <title>Mon éspace joueur - Crypto Skylord</title>
        <link href="../css/style-panel.css" rel="stylesheet">
        <link href="../css/style-rigs.css" rel="stylesheet">
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/rigs.js"></script>
        <script src="https://kit.fontawesome.com/da8f9491f0.js" crossorigin="anonymous"></script>
        <script>
            $(document).ready(async function(){
                document.getElementById("footer").style.display = 'none';
                var mon_pseudo='<?php echo $session_pseudo; ?>'
                var mon_code='<?php echo $session_code; ?>'
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const id = urlParams.get('id');

                if (mon_pseudo != '') {
                    if (mon_code != '') {
                        rigs(mon_pseudo,mon_code,id);
                    }
                } 
            });
            async function Allumer_rig(pseudo, code) {
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const id = urlParams.get('id');
                document.getElementById("chargement").style.display = '';
                document.getElementById("non_chargement").style.display = 'none';
                document.getElementById("footer").style.display = 'none';
                var json_rigs_allumer = 'https://apiv1.skylord.fr/api/rig/simple/action?pseudo=' + pseudo + '&code=' + code + '&id=' + id;
                const api_rigs_allumer = await fetch(json_rigs_allumer);
                const data_rigs_allumer = await api_rigs_allumer.json();

                rigs(pseudo,code,id);

                document.getElementById("chargement").style.display = 'none';
                document.getElementById("non_chargement").style.display = 'block';
                document.getElementById("footer").style.display = 'block';

            }
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
            <div class="rigs_content">
                <div class="container">
                    <div class="zone">
                        <h1 id="numero">RIG N°0</h1>

                        <div onclick="Allumer_rig('<?php echo $session_pseudo; ?>','<?php echo $session_code; ?>')" class="eteindre" id="allumer">
                            Éteindre
                        </div>

                        <div class="informations">
                            <h1>Carte mère</h1>
                            <div class="spearation"></div>
                            <div class="list-cartemere" id="list-cartemere">
                                
                            </div>
                            <h1 style="margin-top: 15px">Processeur(s)</h1>
                            <div class="spearation"></div>
                            <div class="list-processeur" id="list-processeur">

                            </div>
                            <h1 style="margin-top: 15px">Carte(s) graphique(s)</h1>
                            <div class="spearation"></div>
                            <div class="list-cartegraphique" id="list-cartegraphique">

                            </div>
                        </div>

                        <img src="../img/energie/crypto_rig_all.png" class="rig">

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
        </section>
        </div>
    </body>

    <?php include '../utils/footer.php'; ?>

</html>
<?php } else {
header("Location: /index.php");
}?>