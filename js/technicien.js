async function technicien(pseudo, code) {
    var json_technicien_acces = 'https://apiv1.skylord.fr/api/technicien/check?pseudo=' + pseudo + '&code=' + code;
    const api_technicien_acces = await fetch(json_technicien_acces);
    const data_technicien_acces = await api_technicien_acces.json();
    if (data_technicien_acces["Acces"] == "True"){
        console.log(data_technicien_acces["mvp+"])
        var json_technicien = 'https://apiv1.skylord.fr/api/technicien/recup?pseudo=' + pseudo + '&code=' + code;
        const api_technicien = await fetch(json_technicien);
        const data_technicien = await api_technicien.json();

        console.log(data_technicien);
        $('#tableau_crypto').html('');
        for (let i = 0; i < data_technicien["technicien"].length; i++) {
            var tableau_crypto = "<tr class=\"crypto_mine\"><td data-label=\"Identifiant\"><h1> "+ data_technicien["technicien"][i]["id"] +" </h1></td><td data-label=\"Durée de réparation\"><h1>"+ data_technicien["technicien"][i]["Temps"] +" minute(s)</h1></td><td data-label=\"Dégradation\"><h1>"+ data_technicien["technicien"][i]["Dégradation"] +"%</h1></td><td data-label=\"Récupérer\" onclick=\"recupperer_technicien('"+ pseudo + "','"+ code + "', " + data_technicien["technicien"][i]["id"] + ")\"><a href=\"#\">Récupérer</a></td></tr>"
            $(tableau_crypto).prependTo("#tableau_crypto");
        }
        
        document.getElementById("numero").textContent = "Technicien informatique";
        document.getElementById("chargement").style.display = 'none';
        document.getElementById("non_chargement").style.display = 'block';
        document.getElementById("footer").style.display = 'block';
    } else {
        document.body.innerHTML = "<p>ERREUR, Vous n'êtes plus connecté.</p>"; 
    }
}