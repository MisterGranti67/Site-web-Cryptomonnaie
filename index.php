<head>
    <link href="./css/style.css" rel="stylesheet">
</head>
<div class="container" id="container">
    <div class="form-container identifier-container">
        
        <form id="signinform" method="post" action="https://crypto.skylord.fr/dologin.php" role="form">
            <h1>Identifiez vous</h1>
            <div class="form-title">Éspace Crypto - Skylord</div>
            <div class="providerLinkingFeedback"></div>
            <input class="class-input" type="text" name="username" placeholder="Votre pseudo Minecraft" />
            <input class="class-input" type="password" name="password" placeholder="votre code de sécurité" />
            <!--<label for="chkbox"><input id="chkbox" type="checkbox" class="accepttos" name="rememberme" />Se souvenir de moi</label>-->
            <!--
            <div class="text-center margin-bottom">
                LE CAPTCHA
            </div>
            -->
            <button id="login" type="submit">Se connecter</button>
            <a href="https://crypto.skylord.fr/connexion/mot-de-passe/oublie" class="btn btn-link">J'ai oublié mon code de sécurité</a>
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