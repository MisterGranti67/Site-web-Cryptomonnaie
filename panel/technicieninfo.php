<?php 
session_start();

if ((isset($_SESSION['pseudo'])) && (isset($_SESSION['code']))) {
    $session_pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:''; 
    $session_code=(isset($_SESSION['code']))?$_SESSION['code']:'';
    $session_code=(isset($_SESSION['code']))?$_SESSION['code']:'';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include '../utils/head_seo.php'; ?>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
        <title>Mon espace joueur - Crypto Skylord</title>
        <link href="../css/style-panel.css" rel="stylesheet">
        <link href="../css/style-technicien.css" rel="stylesheet">
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/technicien.js"></script>
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
                        technicien(mon_pseudo,mon_code,id);
                    }
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
            <div class="rigs_content">
                <div class="container">
                    <div class="zone">
                        <h1 id="numero">Technicien informatique</h1>

                        <div class="tableau_crypto">
                            <table>
                                <thead>
                                    <tr class="thead">
                                        <th scope="col">Identifiant</th>
                                        <th scope="col">Durée de réparation</th>
                                        <th scope="col">Dégradation</th>
                                        <th scope="col">Récupérer</th>
                                    </tr>
                                </thead>
                                <tbody id="tableau_crypto">
                                    
                                </tbody>
                            </table>
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
        </body>
    </body>

    <?php include '../utils/footer.php'; ?>

</html>
<?php 
    } else {
        header("Location: /index.php");
    }
?>