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
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/energie.js"></script>
        <script src="https://kit.fontawesome.com/da8f9491f0.js" crossorigin="anonymous"></script>
        <script>
            $(document).ready(async function(){
                document.getElementById("footer").style.display = 'none';
                var mon_pseudo='<?php echo $session_pseudo; ?>'
                var mon_code='<?php echo $session_code; ?>'
                const queryString = window.location.search;

                if (mon_pseudo != '') {
                    if (mon_code != '') {
                        energie(mon_pseudo,mon_code);
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
            <div class="energie_content">
                <div class="container">
                    <div class="zone">
                        <h1>Votre production d'énergie</h1>
                        <h2 style="color: red" id="message"></h2>
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
                                        <p class="placement_text_text off" onclick="Allumer_rig('<?php echo $session_pseudo; ?>','<?php echo $session_code; ?>',1)" id="rt1">OFF</p>
                                    </div>
                                </div>
                                <div class="placement_rigs">
                                    <div class="placement_text">
                                        <p class="placement_text_text off" onclick="Allumer_rig('<?php echo $session_pseudo; ?>','<?php echo $session_code; ?>',2)" id="rt2">OFF</p>
                                    </div>
                                </div>
                                <div class="placement_rigs">
                                    <div class="placement_text">
                                        <p class="placement_text_text" onclick="Allumer_rig('<?php echo $session_pseudo; ?>','<?php echo $session_code; ?>',3)" id="rt3">ON</p>
                                    </div>
                                </div>
                                <div class="placement_rigs">
                                    <div class="placement_text">
                                        <p class="placement_text_text" onclick="Allumer_rig('<?php echo $session_pseudo; ?>','<?php echo $session_code; ?>',4)" id="rt4">ON</p>
                                    </div>
                                </div>
                                <div class="placement_rigs">
                                    <div class="placement_text">
                                        <p class="placement_text_text" onclick="Allumer_rig('<?php echo $session_pseudo; ?>','<?php echo $session_code; ?>',5)" id="rt5">ON</p>
                                    </div>
                                </div>
                                <div class="placement_rigs">
                                    <div class="placement_text">
                                        <p class="placement_text_text" onclick="Allumer_rig('<?php echo $session_pseudo; ?>','<?php echo $session_code; ?>',6)" id="rt6">ON</p>
                                    </div>
                                </div>
                                <div class="placement_rigs">
                                    <div class="placement_text">
                                        <p class="placement_text_text" onclick="Allumer_rig('<?php echo $session_pseudo; ?>','<?php echo $session_code; ?>',7)" id="rt7">ON</p>
                                    </div>
                                </div>
                                <div class="placement_rigs">
                                    <div class="placement_text">
                                        <p class="placement_text_text" onclick="Allumer_rig('<?php echo $session_pseudo; ?>','<?php echo $session_code; ?>',8)" id="rt8">ON</p>
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
                            style="margin-top: 32px;  margin-left: 84px; height: 562px;"
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
        </section>
        </div>
    </body>

    <?php include '../utils/footer.php'; ?>

</html>
<?php } else {
header("Location: /index.php");
}?>