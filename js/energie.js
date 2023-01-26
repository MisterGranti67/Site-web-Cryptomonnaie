async function Allumer_rig(pseudo, code, nombre) {
    document.getElementById("chargement").style.display = '';
    document.getElementById("non_chargement").style.display = 'none';
    document.getElementById("footer").style.display = 'none';
    var json_rigs = 'https://apiv1.skylord.fr/api/rigs/simple?pseudo=' + pseudo + '&code=' + code;
    const api_rigs = await fetch(json_rigs);
    const data_rigs = await api_rigs.json();

    var json_rigs_allumer = 'https://apiv1.skylord.fr/api/rig/simple/action?pseudo=' + pseudo + '&code=' + code + '&id=' + data_rigs["rigs"][nombre-1]["id"];
    const api_rigs_allumer = await fetch(json_rigs_allumer);
    const data_rigs_allumer = await api_rigs_allumer.json();

    energie(pseudo,code);


    document.getElementById("chargement").style.display = 'none';
    document.getElementById("non_chargement").style.display = 'block';
    document.getElementById("footer").style.display = 'block';

}
async function energie(pseudo, code) {
    var json_rigs = 'https://apiv1.skylord.fr/api/rigs/simple?pseudo=' + pseudo + '&code=' + code;
    const api_rigs = await fetch(json_rigs);
    const data_rigs = await api_rigs.json();

    var json_energie = 'https://apiv1.skylord.fr/api/energie/simple?pseudo=' + pseudo + '&code=' + code;
    const api_energie = await fetch(json_energie);
    const data_energie = await api_energie.json();
    if (data_energie["Acces"] == "True"){
        numb = 1;
        for (let i = 0; i < 8; i++) {
            if (data_rigs["rigs"][i]["etat"] == "false") {
                var rt = document.getElementById(String("rt"+numb));
                var ri = document.getElementById(String("ri"+numb));
                rt.textContent = "OFF";
                rt.classList.add("off");
                ri.classList.add("off");
            } else {
                var rt = document.getElementById(String("rt"+numb));
                var ri = document.getElementById(String("ri"+numb));
                rt.textContent = "ON";
                rt.classList.remove("off");
                ri.classList.remove("off");
            }
            numb=numb+1;
        }
        numb = 1;
        for (let i = 0; i < 2; i++) {
            if (data_energie["eoliennes"].length <= i) {
                var rt = document.getElementById(String("et"+numb));
                var ri = document.getElementById(String("ei"+numb));
                rt.textContent = "OFF";
                rt.classList.add("off");
                ri.classList.add("off");
            } else {
                // console.log(data_energie["eoliennes"][i])
                if (data_energie["eoliennes"][i]["etat"] == "100") {
                    var et = document.getElementById(String("et"+numb));
                    var ei = document.getElementById(String("ei"+numb));
                    et.textContent = "🔨";
                    et.classList.add("reparer");
                    ei.classList.add("off");
                } else {
                    var et = document.getElementById(String("et"+numb));
                    var ei = document.getElementById(String("ei"+numb));
                    et.textContent = "ON";
                    et.classList.remove("off");
                    ei.classList.remove("off");
                }
            }
            numb=numb+1;
        }
        numb = 1;
        for (let i = 0; i < 6; i++) {
            if (data_energie["panneaux_solaires"].length <= i) {
                var pst = document.getElementById(String("pst"+numb));
                var psi = document.getElementById(String("psi"+numb));
                pst.textContent = "OFF";
                pst.classList.add("off");
                psi.classList.add("off");
            } else {
                if (data_energie["panneaux_solaires"][i]["etat"] == "100") {
                    var pst = document.getElementById(String("pst"+numb));
                    var psi = document.getElementById(String("psi"+numb));
                    pst.textContent = "🔨";
                    pst.classList.add("reparer");
                    psi.classList.add("off");
                } else {
                    var pst = document.getElementById(String("pst"+numb));
                    var psi = document.getElementById(String("psi"+numb));
                    pst.textContent = "ON";
                    pst.classList.remove("off");
                    psi.classList.remove("off");
                }
            }
            numb=numb+1;
        }
        numb = 1;
        for (let i = 0; i < 2; i++) {
            if (data_energie["groupes_electrogene"].length <= i) {
                var gt = document.getElementById(String("gt"+numb));
                var gi = document.getElementById(String("gi"+numb));
                gt.textContent = "OFF";
                gt.classList.add("off");
                gi.classList.add("off");
            } else {
                // console.log(data_energie["eoliennes"][i])
                if (data_energie["groupes_electrogene"][i]["etat"] == "false") {
                    var gt = document.getElementById(String("gt"+numb));
                    var gi = document.getElementById(String("gi"+numb));
                    gt.textContent = "OFF";
                    gt.classList.add("off");
                    gi.classList.add("off");
                } else {
                    var gt = document.getElementById(String("gt"+numb));
                    var gi = document.getElementById(String("gi"+numb));
                    gt.textContent = "ON";
                    gt.classList.remove("off");
                    gi.classList.remove("off");
                }
            }
            numb=numb+1;
        }
        document.getElementById("chargement").style.display = 'none';
        document.getElementById("non_chargement").style.display = 'block';
        document.getElementById("footer").style.display = 'block';
    } else {
        document.body.innerHTML = "<p>ERREUR, Vous n'êtes plus connecté.</p>"; 
    }
}