async function groupelectro(pseudo, code, id) {
    var json_groupelectro = 'https://apiv1.skylord.fr/api/groupelectro/all?pseudo=' + pseudo + '&code=' + code + '&id=' + id;
    const api_groupelectro = await fetch(json_groupelectro);
    const data_groupelectro = await api_groupelectro.json();
    if (data_groupelectro["Acces"] == "True"){
        $('#list-reservoir').html('');
        $('#list-reservoir').append('<p>'+ data_groupelectro["reservoir"][0]["actuel"] + '/'+ data_groupelectro["reservoir"][0]["max"] + 'L</p>');
        $('#list-moteur').html('');
        $('#list-moteur').append('<p>'+ data_groupelectro["moteur"][0]["nombre"] + '</p>');
        $('#list-production').html('');
        if (data_groupelectro["etat"] == "false") {
            $('#list-production').append('<p>0⚡</p>');
        } else {
            $('#list-production').append('<p>'+ data_groupelectro["puissance"][0]["nombre"] + '⚡</p>');
        }
        if (data_groupelectro["etat"] == "false") {
            document.getElementById("allumer").classList.add("allumer");
            document.getElementById("allumer").classList.remove("eteindre");
            document.getElementById("allumer").textContent = "Allumer";
        } else {
            document.getElementById("allumer").classList.remove("allumer");
            document.getElementById("allumer").classList.add("eteindre");
            document.getElementById("allumer").textContent = "Éteindre";
            
        }
        document.getElementById("numero").textContent = "Groupe électrogène N°"+id;
        document.getElementById("chargement").style.display = 'none';
        document.getElementById("non_chargement").style.display = 'block';
        document.getElementById("footer").style.display = 'block';
    } else {
        document.body.innerHTML = "<p>ERREUR, Vous n'êtes plus connecté.</p>"; 
        document.location.href="https://crypto.skylord.fr/deconnexion.php";
    }
}