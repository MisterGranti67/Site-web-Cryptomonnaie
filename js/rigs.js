async function changer_crypto(pseudo, code, id, nombre) {
    document.getElementById("chargement").style.display = '';
    document.getElementById("non_chargement").style.display = 'none';
    document.getElementById("footer").style.display = 'none';
    var json_groupe_allumer = 'https://apiv1.skylord.fr/api/rig/changercrypto?pseudo=' + pseudo + '&code=' + code + '&id=' + id + '&crypto=' + nombre;
    const api_groupe_allumer = await fetch(json_groupe_allumer);
    const data_groupe_allumer = await api_groupe_allumer.json();

    rigs(pseudo,code,id);

}

async function transfert_crypto(pseudo, code, id, nombre) {
    document.getElementById("chargement").style.display = '';
    document.getElementById("non_chargement").style.display = 'none';
    document.getElementById("footer").style.display = 'none';
    var json_groupe_allumer = 'https://apiv1.skylord.fr/api/rig/transfert?pseudo=' + pseudo + '&code=' + code + '&id=' + id + '&crypto=' + nombre;
    const api_groupe_allumer = await fetch(json_groupe_allumer);
    const data_groupe_allumer = await api_groupe_allumer.json();
    
    rigs(pseudo,code,id);

}


async function rigs(pseudo, code, id) {
    var json_rig = 'https://apiv1.skylord.fr/api/rig/all?pseudo=' + pseudo + '&code=' + code + '&id=' + id;
    const api_rig = await fetch(json_rig);
    const data_rig = await api_rig.json();
    if (data_rig["Acces"] == "True"){
        $('#list-cartegraphique').html('');
        for (let i = 0; i < data_rig["cartes_graphique"].length; i++) {
            var nombre = Number(data_rig["cartes_graphique"][i]["etat"])
            if (nombre < 50){
                if (nombre < 20){
                    var etat = "<span style=\"color:#11FF00;margin-left: 37px\">" + nombre + "%</span>"
                } else {
                    var etat = "<span style=\"color:#0A9200;margin-left: 37px\">" + nombre + "%</span><a href=\"#\" onclick=\"ajouter_au_technicien('"+ pseudo + "','"+ code + "', " + id + ", " + data_rig["cartes_graphique"][i]["id"] + ")\"><span class=\"reparation\">🔨</span></a>"
                }
            } else {
                if (nombre > 90){
                    var etat = "<span style=\"color:#990000;margin-left: 37px\">" + nombre + "%</span><a href=\"#\" onclick=\"ajouter_au_technicien('"+ pseudo + "','"+ code + "', " + id + ", " + data_rig["cartes_graphique"][i]["id"] + ")\"><span class=\"reparation\">🔨</span></a>"
                } else if (nombre > 70) {
                    var etat = "<span style=\"color:#FF3300;margin-left: 37px\">" + nombre + "%</span><a href=\"#\" onclick=\"ajouter_au_technicien('"+ pseudo + "','"+ code + "', " + id + ", " + data_rig["cartes_graphique"][i]["id"] + ")\"><span class=\"reparation\">🔨</span></a>"
                } else {
                    var etat = "<span style=\"color:#FF8E00;margin-left: 37px\">" + nombre + "%</span><a href=\"#\" onclick=\"ajouter_au_technicien('"+ pseudo + "','"+ code + "', " + id + ", " + data_rig["cartes_graphique"][i]["id"] + ")\"><span class=\"reparation\">🔨</span></a>"
                }
            }
            $('#list-cartegraphique').append('<p><span>'+ data_rig["cartes_graphique"][i]["type"] + '</span>' + etat + '</p>')
        }
        $('#list-cartemere').html('');
        $('#list-cartemere').append('<p>'+ data_rig["carte_mere"][0]["type"] + '</p>');
        $('#list-processeur').html('');
        $('#list-processeur').append('<p>'+ data_rig["processeur"][0]["type"] + '</p>');
        if (data_rig["etat"] == "false") {
            document.getElementById("allumer").classList.add("allumer");
            document.getElementById("allumer").classList.remove("eteindre");
            document.getElementById("allumer").textContent = "Allumer";
        } else {
            document.getElementById("allumer").classList.remove("allumer");
            document.getElementById("allumer").classList.add("eteindre");
            document.getElementById("allumer").textContent = "Éteindre";
        }

        const api_binance = await fetch('https://api.binance.com/api/v1/ticker/24hr');
        const data = await api_binance.json();
        var baseToText = { BTC: "Bitcoin", ETH: "Ethereum", LTC: "LiteCoin", SHIB: "Shiba", DOGE: "DogeCoin", XRP: "Ripple", DOT: "Polkadot", BNB: "BinanceCoin", ADA: "Cardano" };
        $('#tableau_crypto').html('');
        for (let i = 2000; i > 0; i--) {
            if ((data[i].symbol == "BTCUSDT") || (data[i].symbol == "ETHUSDT") || (data[i].symbol == "SHIBUSDT") || (data[i].symbol == "LTCUSDT") || (data[i].symbol == "DOGEUSDT") || (data[i].symbol == "XRPUSDT") || (data[i].symbol == "DOTUSDT") || (data[i].symbol == "BNBUSDT") || (data[i].symbol == "ADAUSDT")){
                const nom_crypto = data[i].symbol.split('USDT');
                const crypto_mine = data_rig["crypto_mine"][0]["id"].split('USDT');
                
                var variation = "perte";
                if (data[i].priceChangePercent > 0) {
                    variation = "gain";
                }
                nbCrypto = 0
                for (let j = 0; j < 9; j++) {
                    if (nom_crypto[0] == data_rig["cryptos"][j]["id"]){
                        nbCrypto = j
                        valeur_crypto = data_rig["cryptos"][j]["nombre"]*data[i].lastPrice
                    }
                }
                var nom_crypto_img = nom_crypto[0].toLowerCase();
                var valeur_crypto = valeur_crypto.toString().split('.');
                if (nom_crypto.toString() != crypto_mine.toString()){
                    var tableau_crypto = "<tr><td data-label=\"Nom\" class=\"nom\"><img src=\"../img/crypto/" + nom_crypto_img + "logo.png\"> <h1>" + nom_crypto[0] +"</h1><h2>" + baseToText[nom_crypto[0]] + "</h2></td><td data-label=\"Montant\"><h1>" + data_rig["cryptos"][nbCrypto]["nombre"] + "</h1></td><td data-label=\"Valeur\"><h1>≈" + valeur_crypto[0] + " $</h1></td><td data-label=\"Changer la crypto de minage\" onclick=\"changer_crypto('"+ pseudo + "','"+ code + "', " + id + "," + (nbCrypto+1) + ")\"><a href=\"#\">Changer</a> </td><td data-label=\"Transférer sur votre wallet\" onclick=\"transfert_crypto('"+ pseudo + "','"+ code + "', " + id + ", " + (nbCrypto+1) + ")\"><a href=\"#\">Transférer</a></td></tr>"
                } else {
                    var tableau_crypto = "<tr class=\"crypto_mine\"><td data-label=\"Nom\" class=\"nom\"><img src=\"../img/crypto/" + nom_crypto_img + "logo.png\"> <h1>" + nom_crypto[0] +"</h1><h2>" + baseToText[nom_crypto[0]] + "</h2></td><td data-label=\"Montant\"><h1>" + data_rig["cryptos"][nbCrypto]["nombre"] + "</h1></td><td data-label=\"Valeur\"><h1>≈" + valeur_crypto[0] + " $</h1></td><td data-label=\"Changer la crypto de minage\" onclick=\"changer_crypto('"+ pseudo + "','"+ code + "', " + id + "," + (nbCrypto+1) + ")\"><a href=\"#\">Changer</a> </td><td data-label=\"Transférer sur votre wallet\" onclick=\"transfert_crypto('"+ pseudo + "','"+ code + "', " + id + ", " + (nbCrypto+1) + ")\"><a href=\"#\">Transférer</a></td></tr>"
                }
                $(tableau_crypto).prependTo("#tableau_crypto");
                
            }
            
        }
        document.getElementById("numero").textContent = "RIG N°"+id;
        document.getElementById("chargement").style.display = 'none';
        document.getElementById("non_chargement").style.display = 'block';
        document.getElementById("footer").style.display = 'block';
    } else {
        document.body.innerHTML = "<p>ERREUR, Vous n'êtes plus connecté.</p>"; 
    }
}


async function ajouter_au_technicien(pseudo, code, idrig, idcarte) {
    var json_technicien_acces = 'https://apiv1.skylord.fr/api/technicien/ajouter?pseudo=' + pseudo + '&code=' + code + '&id=' + idcarte + '&origine=' + idrig;
    const api_technicien_acces = await fetch(json_technicien_acces);
    const data_technicien_acces = await api_technicien_acces.json();
    if (data_technicien_acces["Acces"] == "True"){
        rigs(pseudo,code,idrig);
        console.log(data_technicien_acces);
        if (data_technicien_acces["Resultat"] == "01"){
            document.getElementById("resultat").style.color = '#CEFF33';
            document.getElementById("resultat").textContent = "La carte graphique " + idcarte + " a bien été ajouté au technicien informatique !";
        } else if (data_technicien_acces["Resultat"] == "14"){
            document.getElementById("resultat").style.color = '#FF6133';
            document.getElementById("resultat").textContent = "Vous n'avez pas assez d'argent.";

        } else if (data_technicien_acces["Resultat"] == "29"){
            document.getElementById("resultat").style.color = '#FF6133';
            document.getElementById("resultat").textContent = "Cette carte graphique n'est pas dans la liste des cartes graphiques de votre rig.";

        } else if (data_technicien_acces["Resultat"] == "28"){
            document.getElementById("resultat").style.color = '#FF6133';
            document.getElementById("resultat").textContent = "Vous n'êtes pas le propriétaire de ce rig.";
        } else if (data_technicien_acces["Resultat"] == "26"){
            document.getElementById("resultat").style.color = '#FF6133';
            document.getElementById("resultat").textContent = "Vous n'avez plus de place disponible au technicien informatique.";
        }
    } else {
        document.body.innerHTML = "<p>ERREUR, Vous n'êtes plus connecté.</p>"; 
    }
}