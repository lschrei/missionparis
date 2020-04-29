

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
}

//focus search
window.onload = function () {
    if (document.getElementById("search_open")) {
        document.getElementById("search_open").addEventListener("click", function () {
            document.getElementById("headerSearch").focus();
        });
    }
    // Système de like/dislike des articles

    if (document.getElementById("like_btn")) {
        document.getElementById("like_btn").addEventListener("click", likeDislike);
        document.getElementById("dislike_btn").addEventListener("click", likeDislike);
    }

    function likeDislike() {
        let address = window.location.href.split("/");
        let article_id = address[address.length - 1];

        let btn_id = this.id;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(btn_id).innerHTML = this.responseText;
                //desactiver les boutons like/dislake après click
                document.getElementById("like_btn").disabled = true;
                document.getElementById("dislike_btn").disabled = true;
            }
        };
        xhttp.open("GET", "/site/like_ajax/" + btn_id + "/" + article_id, true);
        xhttp.send();
    }
    if (document.getElementById("User")) {
        document.getElementById("User").focus();
    }

    //focus ajouter/modifier article
    if (document.getElementById('#summernote')) {
        $(document).ready(function () {
            $('#summernote').summernote();
        });
    }
    if (document.getElementById("Titre")) {
        document.getElementById("Titre").focus();
    }

    //focus ajouter categorie
    if (document.getElementById("Nom")) {
        document.getElementById("Nom").focus();
    }
}

//systeme d'autocompletion dans la barre de recherche à partir des titres des articles

function ac(value) {

    document.getElementById('datalist').innerHTML = '';  //vide le HTML de l'id datalist
    var valeurSearch = document.getElementById("headerSearch").value; //récupère la requête tapée par l'utilisateur 

    if (valeurSearch.length < 3)
        return;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var tags = JSON.parse(this.responseText);  //rends le json lisible par JS
            var n = tags.length;

            for (var i = 0; i < n; i++) {
                if (((tags[i]['Titre'].toLowerCase()).indexOf(value.toLowerCase())) > -1) {  //retour dans chaque elem du json via une entrée Titre, donc [i]['Titre']
                    var node = document.createElement("option");
                    var val = document.createTextNode(tags[i]['Titre']);
                    node.appendChild(val);

                    document.getElementById("datalist").appendChild(node); //injection des résultats 
                }
            }
        }
    };
    xhttp.open("GET", "/site/recherche_ajax/" + valeurSearch, true); //renvoie de la recherche sur recherche_ajax.php avec $params[1] comme champs de recherche
    xhttp.send();

}







