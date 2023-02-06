async function technicien(pseudo, code, id) {
    var json_technicien_acces = 'https://apiv1.skylord.fr/api/technicien/check?pseudo=' + pseudo + '&code=' + code;
    const api_technicien_acces = await fetch(json_technicien_acces);
    const data_technicien_acces = await api_technicien_acces.json();
    if (data_technicien_acces["Acces"] == "True"){
        console.log(data_technicien_acces["mvp+"])
        var json_technicien = 'https://apiv1.skylord.fr/api/technicien/recup?pseudo=' + pseudo + '&code=' + code;
        const api_technicien = await fetch(json_technicien);
        const data_technicien = await api_technicien.json();

        
        document.getElementById("numero").textContent = "Technicien informatique";
        document.getElementById("chargement").style.display = 'none';
        document.getElementById("non_chargement").style.display = 'block';
        document.getElementById("footer").style.display = 'block';
    } else {
        document.body.innerHTML = "<p>ERREUR, Vous n'êtes plus connecté.</p>"; 
    }
}