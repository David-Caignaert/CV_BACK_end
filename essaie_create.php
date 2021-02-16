<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>
<body>
<label for="">centre d'interet</label>
<br><br>
  <form id="form">
    <label for="">Intitulé</label>
    <input id="intitule" type="text">
    <button type="submit">valider le centre d'ineret</button>
  </form>
  <br>
  <hr>
  <label for="">experience professionnelle</label>
  <br><br>
  <form id="form2">
    <label for="">date début</label>
    <input type="date" id="debut_exp">
    <br>
    <br>
    <label for="">date fin</label>
    <input type="date" id="fin_exp">
    <br><br>
    <label for="">Intiltulé de l'experience pro</label>
    <input type="text" name="" id="intitule_exp">
    <br><br>
    <label for="">lieu</label>
    <input type="text" name="" id="lieu_exp">
    <br><br>
    <label for="">Ville</label>
    <input type="text" id="ville_exp">
    <button type="submit">Valider l'experience professionnelle</button>
  </form>


  <br>
  <hr>
  <label for="">Fomation</label>
  <br><br>
  <form id="form3">
    <label for="">ville</label>
    <input type="text" id="ville_formation">
    <br>
    <br>
    <label for="">année</label>
    <input type="text" id="annee_formation">
    <br><br>
    <label for="">Intiltulé de la formation</label>
    <input type="text" name="" id="intitule_formation">
    <br><br>
    <label for="">lieu</label>
    <input type="text" name="" id="lieu_formation">
    <br><br>
    <button type="submit">Valider formation</button>
    </form>
  <br>
  <hr>


  <label for="">languague programmation</label>
  <br><br>
  <form id="form4">
  <label for="">nom</label>
  <input type="text" id="nom_language_programmation">
  <br>
  <br>
  <label for="">logo</label>
  <input type="text" id="logo_language_programmation">
  <br><br>
  <button type="submit">Valider language de programmation</button>
  </form>
  <br>
  <hr>


  <label for="">candidat</label>
  <br><br>
  <form id="form5">
  <label for="">nom</label>
  <input type="text" id="nom_candidat">
  <br>
  <br>
  <label for="">prenom</label>
  <input type="text" id="prenom_candidat">
  <br><br>
  <label for="">adresse</label>
  <input type="text" name="" id="adresse_candidat">
  <br><br>
  <label for="">mail</label>
  <input type="text" name="" id="mail_candidat">
  <br><br>
  <label for="">Ville</label>
  <input type="text" id="ville_candidat">
  <br><br>
  <label for="">date de naissance</label>
  <input type="text" id="date_naissance_candidat">
  <br><br>
  <label for="">info</label>
  <input type="text" id="info_candidat">
  <br><br>
  <label for="">code postal</label>
  <input type="text" id="code_postal_candidat">
  <br><br>
  <label for="">numero de téléphone</label>
  <input type="text" id="num_tel_candidat">
  <button type="submit">Valider candidat</button>
  </form>


  <script>
  document.querySelector("#form")
        .addEventListener("submit", function(event){
            // Stopper la propagation évènementielle
            event.preventDefault();
  const params = new FormData();
  params.append('intitule', document.querySelector('#intitule').value);
  
  axios.post('create/createCentreInteret.php',params)
  .then(Response =>{

  })
  .catch(function(error){
                console.log("ERREUR",error)
  });     
});
document.querySelector("#form2")
.addEventListener("submit", function(event){
  // Stopper la propagation évènementielle
  event.preventDefault();
  const params = new FormData();
  params.append('dateDebut', document.querySelector('#debut_exp').value);
  params.append('dateFin', document.querySelector('#fin_exp').value);
  params.append('intitule', document.querySelector('#intitule_exp').value);
  params.append('lieu', document.querySelector('#lieu_exp').value);
  params.append('ville', document.querySelector('#ville_exp').value);
  
  axios.post('create/createExperiencePro.php',params)
  .then(Response =>{
  })
  .catch(function(error){
    console.log("ERREUR",error)
  });     
});
document.querySelector("#form3")
      .addEventListener("submit", function(event){
          // Stopper la propagation évènementielle
          event.preventDefault();
const params = new FormData();
params.append('ville', document.querySelector('#ville_formation').value);
params.append('anneeObtention', document.querySelector('#annee_formation').value);
params.append('intitule', document.querySelector('#intitule_formation').value);
params.append('lieu', document.querySelector('#lieu_formation').value);

axios.post('create/createFormation.php',params)
.then(Response =>{
})
.catch(function(error){
              console.log("ERREUR",error)
});     
});
document.querySelector("#form4")
        .addEventListener("submit", function(event){
            // Stopper la propagation évènementielle
            event.preventDefault();
  const params = new FormData();
  params.append('nom', document.querySelector('#nom_language_programmation').value);
  params.append('logo', document.querySelector('#logo_language_programmation').value);
  
  axios.post('create/createLanguageProgrammation.php',params)
  .then(Response =>{

  })
  .catch(function(error){
                console.log("ERREUR",error)
  });     
});
document.querySelector("#form5")
.addEventListener("submit", function(event){
  // Stopper la propagation évènementielle
  event.preventDefault();
  const params = new FormData();
  params.append('nom', document.querySelector('#nom_candidat').value);
  params.append('prenom', document.querySelector('#prenom_candidat').value);
  params.append('adresse', document.querySelector('#adresse_candidat').value);
  params.append('mail', document.querySelector('#mail_candidat').value);
  params.append('ville', document.querySelector('#ville_candidat').value);
  params.append('dateNaissance', document.querySelector('#date_naissance_candidat').value);
  params.append('info', document.querySelector('#info_candidat').value);
  params.append('codePostal', document.querySelector('#code_postal_candidat').value);
  params.append('numTel', document.querySelector('#num_tel_candidat').value);
  
  axios.post('create/createCandidat.php',params)
  .then(Response =>{
    console.log('response',Response);
  })
  .catch(function(error){
    console.log("ERREUR",error)
  });     
});
  </script>
</body>
</html>