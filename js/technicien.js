async function technicien(pseudo, code) {
    var json_technicien_acces = 'https://apiv1.skylord.fr/api/technicien/check?pseudo=' + pseudo + '&code=' + code;
    const api_technicien_acces = await fetch(json_technicien_acces);
    const data_technicien_acces = await api_technicien_acces.json();
    if (data_technicien_acces["Acces"] == "True"){
        var json_technicien = 'https://apiv1.skylord.fr/api/technicien/check?pseudo=' + pseudo + '&code=' + code;
        const api_technicien = await fetch(json_technicien);
        const data_technicien = await api_technicien.json();
        if (data_technicien["premium"] == "1"){
            var json_technicien = 'https://apiv1.skylord.fr/api/technicien/recup?pseudo=' + pseudo + '&code=' + code;
            const api_technicien = await fetch(json_technicien);
            const data_technicien = await api_technicien.json();
        
            if (data_technicien["technicien"].length > 0){
                $('.tableau_crypto').html('<table><thead><tr class="thead"><th scope="col">Identifiant</th><th scope="col">Durée de réparation</th><th scope="col">Dégradation</th><th scope="col">Récupérer</th></tr></thead><tbody id="tableau_crypto"></tbody></table>');
                for (let i = 0; i < data_technicien["technicien"].length; i++) {
                    var tableau_crypto = "<tr class=\"crypto_mine\"><td data-label=\"Identifiant\"><h1> "+ data_technicien["technicien"][i]["id"] +" </h1></td><td data-label=\"Durée de réparation\"><h1>"+ data_technicien["technicien"][i]["Temps"] +" minute(s)</h1></td><td data-label=\"Dégradation\"><h1>"+ data_technicien["technicien"][i]["Dégradation"] +"%</h1></td><td data-label=\"Récupérer\" onclick=\"technicien_listcg('"+ pseudo + "','"+ code + "', " + data_technicien["technicien"][i]["id"] + ")\"><a href=\"#\">Récupérer</a></td></tr>"
                    $(tableau_crypto).prependTo("#tableau_crypto");
                }
            } else {
                $('.tableau_crypto').html('');
                document.getElementById("resultat2").style.color = '#FF6133';
                document.getElementById("resultat2").textContent = "Vous n'avez aucune carte graphique en réparation.";
            }
            document.getElementById("numero").textContent = "Technicien informatique";
            document.getElementById("chargement").style.display = 'none';
            document.getElementById("non_chargement").style.display = 'block';
            document.getElementById("footer").style.display = 'block';
        } else {
            document.location.href="https://crypto.skylord.fr/panel/home.php"
        }
    } else {
        document.body.innerHTML = "<p>ERREUR, Vous n'êtes plus connecté.</p>"; 
        document.location.href="https://crypto.skylord.fr/deconnexion.php";
    }
}


async function technicien_listcg(pseudo, code, id) {
    var json_technicien_acces = 'https://apiv1.skylord.fr/api/technicien/check?pseudo=' + pseudo + '&code=' + code;
    const api_technicien_acces = await fetch(json_technicien_acces);
    const data_technicien_acces = await api_technicien_acces.json();
    if (data_technicien_acces["Acces"] == "True"){
        var json_technicien = 'https://apiv1.skylord.fr/api/rig/nombrecg?pseudo=' + pseudo + '&code=' + code;
        const api_technicien = await fetch(json_technicien);
        const data_technicien = await api_technicien.json();

        $('.tableau_crypto').html('<table><thead><tr class="thead"><th scope="col">Identifiant</th><th scope="col">Nombre de carte graphique</th><th scope="col">Déplacer dans ce rig</th></tr></thead><tbody id="tableau_crypto"></tbody></table>');
        for (let i = 0; i < data_technicien["rigs"].length; i++) {
            if (data_technicien["rigs"][i]["etat"] == "false") {
                if (data_technicien["rigs"][i]["max"] > data_technicien["rigs"][i]["cartes"]) {
                    var tableau_crypto = "<tr class=\"crypto_mine\"><td data-label=\"Identifiant\"><a href=\"https://crypto.skylord.fr/panel/rigs.php?id="+data_technicien["rigs"][i]["id"]+"\"><h1> "+ data_technicien["rigs"][i]["id"] +" </h1></a></td><td data-label=\"Nombre de carte graphique\"><h1>"+ data_technicien["rigs"][i]["cartes"] +"/"+ data_technicien["rigs"][i]["max"] +"</h1></td><td data-label=\"Déplacer dans ce rig\" onclick=\"deplacer_technicien('"+ pseudo + "','"+ code + "'," + id +", " + data_technicien["rigs"][i]["id"] + ")\"><a href=\"#\">Déplacer</a></td></tr>"
                } else {
                    var tableau_crypto = "<tr class=\"crypto_mine\"><td data-label=\"Identifiant\"><a href=\"https://crypto.skylord.fr/panel/rigs.php?id="+data_technicien["rigs"][i]["id"]+"\"><h1> "+ data_technicien["rigs"][i]["id"] +" </h1></a></td><td data-label=\"Nombre de carte graphique\"><h1 style=\"color: #FF6133\">"+ data_technicien["rigs"][i]["cartes"] +"/"+ data_technicien["rigs"][i]["max"] +"</h1></td><td data-label=\"Déplacer dans ce rig\" style=\"color: #FF6133\">Impossible</td></tr>"
                } 
            } else {
                var tableau_crypto = "<tr class=\"crypto_mine\"><td data-label=\"Identifiant\"><a href=\"https://crypto.skylord.fr/panel/rigs.php?id="+data_technicien["rigs"][i]["id"]+"\"><h1> "+ data_technicien["rigs"][i]["id"] +" </h1></a></td><td data-label=\"Nombre de carte graphique\" style=\"color: #FF6133\">Vous devez éteindre ce rig</td><td data-label=\"Déplacer dans ce rig\" style=\"color: #FF6133\">Impossible</td></tr>"
            }
            $(tableau_crypto).prependTo("#tableau_crypto");
        }
        
        document.getElementById("numero").textContent = "Technicien informatique";
        document.getElementById("chargement").style.display = 'none';
        document.getElementById("non_chargement").style.display = 'block';
        document.getElementById("footer").style.display = 'block';
    } else {
        document.body.innerHTML = "<p>ERREUR, Vous n'êtes plus connecté.</p>"; 
        document.location.href="https://crypto.skylord.fr/deconnexion.php";
    }
}

async function deplacer_technicien(pseudo, code, idcarte, idrig) {
    var json_technicien_acces = 'https://apiv1.skylord.fr/api/technicien/deplace?pseudo=' + pseudo + '&code=' + code + '&idcarte=' + idcarte + '&idrig=' + idrig;
    const api_technicien_acces = await fetch(json_technicien_acces);
    const data_technicien_acces = await api_technicien_acces.json();
    if (data_technicien_acces["Acces"] == "True"){
        technicien(pseudo,code);
        if (data_technicien_acces["Resultat"] == "01"){
            document.getElementById("resultat").style.color = '#CEFF33';
            document.getElementById("resultat").textContent = "La carte graphique N°" + idcarte + " a bien été ajouté au rig N°" + idrig;
        } else if (data_technicien_acces["Resultat"] == "22"){
            document.getElementById("resultat").style.color = '#FF6133';
            document.getElementById("resultat").textContent = "Vous avez déjà atteint le nombre maximum de carte graphique dans le rig N°" + idrig;

        } else if (data_technicien_acces["Resultat"] == "21"){
            document.getElementById("resultat").style.color = '#FF6133';
            document.getElementById("resultat").textContent = "Il n'y a pas de carte graphique N°" + idcarte + " dans le Technicien Informatique";
        } else if (data_technicien_acces["Resultat"] == "23"){
            document.getElementById("resultat").style.color = '#FF6133';
            document.getElementById("resultat").textContent = "Vous devez être le seul et unique propriétaire de la carte graphique N°" + idcarte + " pour pouvoir la déplacer dans un rig. Afin d'éviter des problèmes de duplication.";
        }
    } else {
        document.body.innerHTML = "<p>ERREUR, Vous n'êtes plus connecté.</p>"; 
        document.location.href="https://crypto.skylord.fr/deconnexion.php";
    }
}