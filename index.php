<head>
    <link href="./css/style.css" rel="stylesheet">
</head>
<div class="container" id="container">
    <div class="form-container identifier-container">
        <?php
            session_start();
            if (isset($_POST['pseudo'])){
                $pseudo = stripslashes($_REQUEST['pseudo']);
                $code = stripslashes($_REQUEST['code']);
                $content = file_get_contents("https://apiv1.skylord.fr/api/checkconnect?pseudo=".$pseudo."&code=".$code."");
                $result  = json_decode($content);
                if ($result->Acces === "True"){
                    $_SESSION['pseudo'] = $pseudo;
                    $_SESSION['code'] = $code;
                    header("Location: /panel/home.php");
                }else{
                    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
                }
            }
        ?> 
        <form id="signinform" action="" method="post" name="login">
            <h1>Identifiez vous</h1>
            <div class="form-title">Espace Crypto - Skylord</div>
            <div class="providerLinkingFeedback">
            <?php if (! empty($message)) { ?>
                <p class="errorMessage"><?php echo $message; ?></p>
            <?php } ?>
            </div>
            <input class="class-input" type="text" name="pseudo" placeholder="Votre pseudo Minecraft" />
            <input class="class-input" type="password" name="code" placeholder="votre code de sécurité" />
            <!--<label for="chkbox"><input id="chkbox" type="checkbox" class="accepttos" name="rememberme" />Se souvenir de moi</label>-->
            <!--
            <div class="text-center margin-bottom">
                LE CAPTCHA
            </div>
            -->
            <button id="login" type="submit">Se connecter</button>

            <a href="https://skylord.fr" class="btn btn-link"><i class="fas fa-arrow-left"></i>Retour à l'accueil</a>
            
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-right">
                <h1>Bienvenue !</h1>
                <p>Enregistrez-vous et accèdez à votre compte crypto-monnaie en jeu, mais depuis le web !</p>
                <a><button class="ghost">/code [mot de passe] en jeu !</button></a>
            </div>
        </div>
    </div>
</div>