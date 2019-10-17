document.getElementById("envoyer").addEventListener("click", validation);//  verification lors du clic sur le bouton envoyer le formulaire

var  verifDesc = new RegExp('/^[0-9a-zA-Zàâéèëêïîôùüç \-"()=,._%[\]`\';:!?*$€#&°<>+-\/]{1,300}$/');
var  verifLibelle = new RegExp('/^[a-zA-Z0-9àâéèëêïîôùüç -]{1,60}$/');
var  verifRef = new RegExp('/^[0-9a-zA-Zàâéèëêïîôùüç-]{1,60}$/');
var  verifPrice = new RegExp('/^[0-9]{1,6}(.[0-9]{1,2})?$/');
var  verifColor = new RegExp('/^[a-zZA-Z]{1,25}/');
var  verifStk = new RegExp('/^[0-9]{1,6}$/');
var  verifDate = new RegExp('/^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/');

function validation(event) // foncton validation = verification de la presence ou non des données
{     
    // Verifi le champs reférence
    if ((!verifRef.test(reference.value)) || (reference.value == "")){
                document.getElementById('reference').innerHTML = "Veuillez indiquer une référence valide !";
                event.preventDefault();
           }
     else{
               document.getElementById('erreurReference').innerHTML = "";
           }
    // Verifi le champs catégorie
    if ((!verifRef.test(categorie.value)) || (categorie.value == "")){
                document.getElementById('erreurCategorie').innerHTML = "Veuillez indiquer une catégorie valide !";
                event.preventDefault();
           }
     else{
               document.getElementById('erreurCategorie').innerHTML = "";
           }
    // Verifi le champs libellé
    if ((!verifLibelle.test(libelle.value)) || (libelle.value == "")){
                document.getElementById('erreurLibelle').innerHTML = "Veuillez indiquer un libellé valide !";
                event.preventDefault();
           }
     else{
               document.getElementById('erreurLibelle').innerHTML = "";
           }
    // Verifi le champs description
    if ((!verifDesc.test(description.value)) || (description.value == "")){
                document.getElementById('erreurDesc').innerHTML = "Description invalide !";
                event.preventDefault();
           }
     else{
               document.getElementById('erreurDesc').innerHTML = "";
           }
    // Verifi le champs Prix
    if ((!verifPrice.test(prix.value)) || (prix.value == "")){
                document.getElementById('erreurPrix').innerHTML = "Veuillez indiquer un prix valide !";
                event.preventDefault();
           }
     else{
               document.getElementById('erreurPrix').innerHTML = "";
           }
    // Verifi le champs stock
    if ((!verifStk.test(stock.value)) || (stock.value == "")){
                document.getElementById('erreurStock').innerHTML = "Veuillez indiquer un stock valide !";
                event.preventDefault();
           }
     else{
               document.getElementById('erreurStock').innerHTML = "";
           }
    // Verifi le champs date couleur
    if ((!verifColor.test(couleur.value)) || (couleur.value == "")){
                document.getElementById('erreurCouleur').innerHTML = "Veuillez indiquer une couleur valide !";
                event.preventDefault();
           }
     else{
               document.getElementById('erreurCouleur').innerHTML = "";
           }
}