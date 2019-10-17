document.getElementById("envoyer").addEventListener("click", validation);//  verification lors du clic sur le bouton envoyer le formulaire

var verifLetter = new RegExp("^[a-zA-Zàâéèëêïîôùüç -]{1,60}$");
var verifEmail = new RegExp("^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$");
var verifCodePostal = new RegExp("^[0-9]{5}$");
var verifAdresse = new RegExp("[0-9]{1,3}(?:(?:[,. ]){1}[-a-zA-Zàâäéèêëïîôöùûüç]+)+");
var verifSex = new RegExp("^[femme-hommeFemmeHomme]{1,5}$");

function validation(event) // foncton validation = verification de la presence ou non des données
{     
    // Verifi le champs nom
    if ((!verifLetter.test(nom.value)) || (nom.value == "")){
                document.getElementById('erreurNom').innerHTML = "Veuillez entrer un Nom.";
                event.preventDefault();
           }
     else{
               document.getElementById('erreurNom').innerHTML = "";
           }
    // Verifi le champs prénom
    if ((!verifLetter.test(prenom.value)) || (prenom.value == "")){
                document.getElementById('erreurPrenom').innerHTML = "Veuillez entrer un Prénom.";
                event.preventDefault();
           }
     else{
               document.getElementById('erreurPrenom').innerHTML = "";
           }
    // Verifi le champs date de naissance 
    if (date.value == ""){
                document.getElementById('erreurDate').innerHTML = "Date invalide.";
                event.preventDefault();
           }
     else{
               document.getElementById('erreurDate').innerHTML = "";
           }  
    // Verifi le champs de sexe
    if ((!verifSex.test(sexe.value)) || (sexe.value == "")){
      document.getElementById('erreurSexe').innerHTML = "Entrer un sexe.";
      event.preventDefault();
    }
    else{
      document.getElementById('erreurSexe').innerHTML = "";
    }
    // Verifi le champs ville
    if ((!verifLetter.test(ville.value)) || (ville.value == "")){
                document.getElementById('erreurVille').innerHTML = "Ville invalide.";
                event.preventDefault();
           }
     else{
               document.getElementById('erreurVille').innerHTML = "";
           }
    // Verifi le champs adresse
    if ((!verifAdresse.test(adresse.value)) || (adresse.value == "")){
                document.getElementById('erreurAdresse').innerHTML = "Adresse invalide.";
                event.preventDefault();
           }
     else{
               document.getElementById('erreurAdresse').innerHTML = "";
           }
    // Verifi le champs code postal
    if ((!verifCodePostal.test(codePostal.value)) || (codePostal.value == "")){
                document.getElementById('erreurCodePostal').innerHTML = "Code postal invalide.";
                event.preventDefault();
           }
     else{
               document.getElementById('erreurCodePostal').innerHTML = "";
           }
    // Verifi le champs email
    if ((!verifEmail.test(email.value)) || (email.value == "")){
                document.getElementById('erreurEmail').innerHTML = "Email invalide.";
                event.preventDefault();
           }
     else{
               document.getElementById('erreurEmail').innerHTML = "";
           } 
    // Verifi le champs condition
    if (check.checked == ""){
                document.getElementById('erreurCheck').innerHTML = "Merci d'accepter les conditions !";
                event.preventDefault();
           }
     else{
               document.getElementById('erreurCheck').innerHTML = "";
           } 
}































