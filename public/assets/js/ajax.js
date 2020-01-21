console.log("Début chargement ajax.js");

/***
 *     █████╗      ██╗ █████╗ ██╗  ██╗
 *    ██╔══██╗     ██║██╔══██╗╚██╗██╔╝
 *    ███████║     ██║███████║ ╚███╔╝ 
 *    ██╔══██║██   ██║██╔══██║ ██╔██╗ 
 *    ██║  ██║╚█████╔╝██║  ██║██╔╝ ██╗
 *    ╚═╝  ╚═╝ ╚════╝ ╚═╝  ╚═╝╚═╝  ╚═╝
 *                                    
 */

function requeteXHR(route, dataPost, action){
    let reqXhr = new XMLHttpRequest();
    let data = dataPost;
    reqXhr.open('POST', "../back/public/"+route);
    reqXhr.addEventListener('load', function(){action(reqXhr.responseText)});
    reqXhr.send(data);
}

// afficherAccueil = function(retourXhr){
//     let film = JSON.parse(retourXhr);
//     contenuListeFilm = "";
//     for (let numFilm in film){
//         contenuListeFilm += "<article class='accueil'>"
//                         + "<h2>" + film[numFilm].titre + "</h2>"
//                         + "<p>Genre : " + film[numFilm].genre
//                         + " - Année de sortie : " + (new Date(film[numFilm].dateDeSortie)).getFullYear() + "</p>"
//                         + "<img src='assets/img/film/" + film[numFilm].affiche + "' />"
//                         + "</article>";
//     }
//     let listeFilm = document.getElementById("listeFilm");
//     listeFilm.className = "col-lg-8  offset-lg-2";
//     listeFilm.innerHTML = contenuListeFilm;
// }

// afficherListeFilm = function(retourXhr){
//     let film = JSON.parse(retourXhr);
//     contenuListeFilm = "";
//     for (let numFilm in film){
//         contenuListeFilm += "<article class='listeFilm'>"
//                         + "<h2>" + film[numFilm].titre + "</h2>"
//                         + "<p>Genre : " + film[numFilm].genre + "</p>"
//                         + "<p>Année de sortie : " + (new Date(film[numFilm].dateDeSortie)).getFullYear() + "</p>"
//                         + "<img src='assets/img/film/" + film[numFilm].affiche + "' />"
//                         + "</article>";
//     }
//     let listeFilm = document.getElementById("listeFilm");
//     listeFilm.className = "col-lg-8  offset-lg-2";
//     listeFilm.innerHTML = contenuListeFilm;
// }

// login = function(retourXhr){
//     console.log(retourXhr);
//     let retourLogin = JSON.parse(retourXhr);
//     if (retourLogin.authentification){
//         document.getElementById("popup-login").style.display = "none";
//     }else{
//         document.getElementById("erreur-login").innerHTML = "Dans l'cul Lulu...";
//     }
// }

// let routeSymfony = "";
// let donneesFormulaire = new FormData();
// donneesFormulaire.append('nom', 'Toto');
// donneesFormulaire.append('age', '12');

// document.getElementById("btn-accueil").addEventListener("click", function(){
//     requeteXHR(routeSymfony, donneesFormulaire, afficherAccueil)});

// document.getElementById("btn-listeFilm").addEventListener("click", function(){
//     requeteXHR(routeSymfony, donneesFormulaire, afficherListeFilm)});

// document.getElementById("btn-login").addEventListener("click", function(){
//     document.getElementById("popup-login").style.display = "block";});

// document.getElementById("btn-login-cancel").addEventListener("click", function(){
//     document.getElementById("popup-login").style.display = "none";});
    
// document.getElementById("btn-login-submit").addEventListener("click", function(evenement){
//     evenement.preventDefault();
//     let donneesFormulaire = new FormData(document.getElementById("form-login"));
//     requeteXHR("login", donneesFormulaire, login);});

// document.getElementById("btn-logout").addEventListener("click", function(){
//     requeteXHR("", donneesFormulaire, afficherAccueil)});

// requeteXHR(routeSymfony, donneesFormulaire, afficherAccueil);

let home = document.querySelector("#home-toggle");

let btnHome = document.querySelectorAll(".btn-home-toggle");

btnHome.forEach(function(btn){
    btn.addEventListener("click", function(evenement){
        evenement.preventDefault();
        if (home.getAttribute("checked")){home.removeAttribute("checked");}
        else {home.setAttribute("checked", "checked");}
        console.log("Toggle Home : "+home.getAttribute("checked"));
    });
});
console.log("Fin chargement ajax.js");