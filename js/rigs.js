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
                    var etat = "<span style=\"color:#0A9200;margin-left: 37px\">" + nombre + "%</span><span class=\"reparation\">🔨</span>"
                }
            } else {
                if (nombre > 90){
                    var etat = "<span style=\"color:#990000;margin-left: 37px\">" + nombre + "%</span><span class=\"reparation\">🔨</span>"
                } else if (nombre > 70) {
                    var etat = "<span style=\"color:#FF3300;margin-left: 37px\">" + nombre + "%</span><span class=\"reparation\">🔨</span>"
                } else {
                    var etat = "<span style=\"color:#FF8E00;margin-left: 37px\">" + nombre + "%</span><span class=\"reparation\">🔨</span>"
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
        document.getElementById("numero").textContent = "RIG N°"+id;
        document.getElementById("chargement").style.display = 'none';
        document.getElementById("non_chargement").style.display = 'block';
        document.getElementById("footer").style.display = 'block';
    } else {
        document.body.innerHTML = "<p>ERREUR, Vous n'êtes plus connecté.</p>"; 
    }
}