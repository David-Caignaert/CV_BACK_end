<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">        
  
  </head>
<body>
<h1>effacer un centre d'interet</h1>
  <table class='table'>
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Intitulé</th>
      </tr>
    </thead>
    <tbody class='liste_centre_interet'>
      <tr class='ligne_centre_interet'>
        <td>{{id_centre}}</td>
        <td>{{intitule_centre}}</td>
        <td><a href="defCentre.php?{{id_sup_centre}}"><i class="far fa-trash-alt"></i></button></a></td>
      </tr>
    </tbody>
  </table>
  <hr>
  <h1>effacer une experience pro</h1>
  <table class='table'>
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Date de début</th>
        <th scope="col">Date de fin</th>
        <th scope="col">Intitulé</th>
        <th scope="col">Lieu</th>
        <th scope="col">Ville</th>

      </tr>
    </thead>
    <tbody class='liste_experience_pro'>
      <tr class='ligne_experience_pro'>
        <td>{{id_experience}}</td>
        <td>{{dateDebut_experience}}</td>
        <td>{{dateFin_experience}}</td>
        <td>{{intitule_experience}}</td>
        <td>{{lieu_experience}}</td>
        <td>{{ville_experience}}</td>
        <td><a href="defExp.php?{{id_sup_experience}}"><i class="far fa-trash-alt"></i></button></a></td>
      </tr>
    </tbody>
  </table>
  <hr>

  <h1>effacer une formation</h1>
  <table class='table'>
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Ville</th>
        <th scope="col">Année</th>
        <th scope="col">Intitulé</th>
        <th scope="col">Lieu</th>

      </tr>
    </thead>
    <tbody class='liste_formation'>
      <tr class='ligne_formation'>
        <td>{{id_formation}}</td>
        <td>{{ville_formation}}</td>
        <td>{{annee_formation}}</td>
        <td>{{intitule_formation}}</td>
        <td>{{lieu_formation}}</td>
        
        <td><a href="defForm.php?{{id_sup_formation}}"><i class="far fa-trash-alt"></i></button></a></td>
      </tr>
    </tbody>
  </table>
  <hr>

  <h1>effacer un language de programmation</h1>
  <table class='table'>
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nom</th>
        <th scope="col">Logo</th>

      </tr>
    </thead>
    <tbody class='liste_language'>
      <tr class='ligne_language'>
        <td>{{id_language}}</td>
        <td>{{nom_language}}</td>
        <td>{{logo_language}}</td>
        
        <td><a href="defLang.php?{{id_sup_language}}"><i class="far fa-trash-alt"></i></button></a></td>
      </tr>
    </tbody>
  </table>
  <hr>

<!--   <h1>effacer un candidat</h1>
  <table class='table'>
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Adresse</th>
        <th scope="col">Mail</th>
        <th scope="col">Ville</th>
        <th scope="col">Date de naissance</th>
        <th scope="col">Info</th>
        <th scope="col">code postal</th>
        <th scope="col">numero de tel</th>

      </tr>
    </thead>
    <tbody class='liste_candidat'>
      <tr class='ligne_candidat'>
        <td>{{id_candidat}}</td>
        <td>{{nom_candidat}}</td>
        <td>{{prenom_candidat}}</td>
        <td>{{adresse_candidat}}</td>
        <td>{{mail_candidat}}</td>
        <td>{{ville_candidat}}</td>
        <td>{{date_naissance_candidat}}</td>
        <td>{{info_candidat}}</td>
        <td>{{codePostal_candidat}}</td>
        <td>{{numTel_candidat}}</td>
        
        <td><a href="defcand.php?{{id_sup_candidat}}"><i class="far fa-trash-alt"></i></button></a></td>
      </tr>
    </tbody>
  </table>
  <hr> -->
  <script>
  ////////////////////////CENTRE INTERET/////////////////////////
    let listeCentreIneret = new Array();
    axios.get('listeCentreInteret.php')
    .then(response_centre => {
      listeCentreIneret = response_centre.data;
      console.log('listeCentreInteret',listeCentreIneret);
      let ligne_centre_interet = document.querySelector('.ligne_centre_interet').outerHTML;
      let contenu_centre = '';
      for(let i=0;i<listeCentreIneret.length;i++)
      {
        let ligneCentre = ligne_centre_interet;
        ligneCentre = ligneCentre.replace('{{id_centre}}', listeCentreIneret[i].id);
        ligneCentre = ligneCentre.replace('{{id_sup_centre}}',listeCentreIneret[i].id);        
        ligneCentre = ligneCentre.replace('{{intitule_centre}}',listeCentreIneret[i].intitule);
        contenu_centre+= ligneCentre;
      }
      document.querySelector('.liste_centre_interet').innerHTML = contenu_centre;
    })
  ///////////////////////////EXPERIENCE PRO////////////////////////
    let listeExperiencePro = new Array();
    axios.get('listeExperiencesPro.php')
    .then(response_exp => {
      listeExperiencePro = response_exp.data;
      console.log('listeExperiencePro',listeExperiencePro);
      let ligne_experience_pro = document.querySelector('.ligne_experience_pro').outerHTML;
      let contenu_exerience = '';
      for(let i=0;i<listeExperiencePro.length;i++)
      {
        let ligne_exp = ligne_experience_pro;
        ligne_exp = ligne_exp.replace('{{id_experience}}', listeExperiencePro[i].id);
        ligne_exp = ligne_exp.replace('{{id_sup_experience}}', listeExperiencePro[i].id);
        ligne_exp = ligne_exp.replace('{{dateDebut_experience}}',listeExperiencePro[i].dateDebut);        
        ligne_exp = ligne_exp.replace('{{dateFin_experience}}',listeExperiencePro[i].dateFin);
        ligne_exp = ligne_exp.replace('{{intitule_experience}}',listeExperiencePro[i].intitule);
        ligne_exp = ligne_exp.replace('{{lieu_experience}}',listeExperiencePro[i].lieu);
        ligne_exp = ligne_exp.replace('{{ville_experience}}',listeExperiencePro[i].ville);
        contenu_exerience+= ligne_exp;
      }
      document.querySelector('.liste_experience_pro').innerHTML = contenu_exerience;
    })
  //////////////////////////////FORMATION/////////////////////
    $listeFormation = new Array();
      axios.get('listeFormations.php')
      .then(response_exp => {
        listeFormation = response_exp.data;
        console.log('listeFormation',listeFormation);
        let ligne_formation = document.querySelector('.ligne_formation').outerHTML;
        let contenu_form = '';
        for(let i=0;i<listeFormation.length;i++)
        {
          let ligne_form = ligne_formation;
          ligne_form = ligne_form.replace('{{id_formation}}', listeFormation[i].id);
          ligne_form = ligne_form.replace('{{id_sup_formation}}', listeFormation[i].id);
          ligne_form = ligne_form.replace('{{ville_formation}}',listeFormation[i].ville);        
          ligne_form = ligne_form.replace('{{annee_formation}}',listeFormation[i].anneeObtention);
          ligne_form = ligne_form.replace('{{intitule_formation}}',listeFormation[i].intitule);
          ligne_form = ligne_form.replace('{{lieu_formation}}',listeFormation[i].lieu);
          contenu_form+= ligne_form;
        }
        document.querySelector('.liste_formation').innerHTML = contenu_form;
      })


  ///////////////////////////LANGUAGE PROGRAMMATION//////////////////
    $listeLanguage = new Array();
    axios.get('listeLanguagesProgrammation.php')
    .then(response_exp => {
      listeLanguage = response_exp.data;
      console.log('listeLanguage',listeLanguage);
      let ligne_Language = document.querySelector('.ligne_language').outerHTML;
      let contenu_lang = '';
      for(let i=0;i<listeLanguage.length;i++)
      {
        let ligne_lang = ligne_Language;
        ligne_lang = ligne_lang.replace('{{id_language}}', listeLanguage[i].id);
        ligne_lang = ligne_lang.replace('{{id_sup_language}}', listeLanguage[i].id);
        ligne_lang = ligne_lang.replace('{{nom_language}}',listeLanguage[i].nom);        
        ligne_lang = ligne_lang.replace('{{logo_language}}',listeLanguage[i].logo);
        
        contenu_lang+= ligne_lang;
      }
      document.querySelector('.liste_language').innerHTML = contenu_lang;
    })
  //////////////////////////////CANDIDAT/////////////////////////////
/*     $listeCandidat = new Array();
      axios.get('listeCandidats.php')
      .then(response_exp => {
        listeCandidat = response_exp.data;
        console.log('listeCandidat',listeCandidat);
        let ligne_candidat = document.querySelector('.ligne_candidat').outerHTML;
        let contenu_cand = '';
        for(let i=0;i<listeCandidat.length;i++)
        {
          let ligne_cand = ligne_candidat;
          ligne_cand = ligne_cand.replace('{{id_candidat}}', listeCandidat[i].id);
          ligne_cand = ligne_cand.replace('{{id_sup_candidat}}', listeCandidat[i].id);
          ligne_cand = ligne_cand.replace('{{nom_candidat}}',listeCandidat[i].nom);        
          ligne_cand = ligne_cand.replace('{{prenom_candidat}}',listeCandidat[i].prenom);
          ligne_cand = ligne_cand.replace('{{adresse_candidat}}',listeCandidat[i].adresse);
          ligne_cand = ligne_cand.replace('{{mail_candidat}}',listeCandidat[i].mail);
          ligne_cand = ligne_cand.replace('{{ville_candidat}}',listeCandidat[i].ville);
          ligne_cand = ligne_cand.replace('{{date_naissance_candidat}}',listeCandidat[i].dateNaissance);
          ligne_cand = ligne_cand.replace('{{info_candidat}}',listeCandidat[i].info);
          ligne_cand = ligne_cand.replace('{{codePostal_candidat}}',listeCandidat[i].codePostal);
          ligne_cand = ligne_cand.replace('{{numTel_candidat}}',listeCandidat[i].numTel);

          contenu_cand+= ligne_cand;
        }
        document.querySelector('.liste_candidat').innerHTML = contenu_cand;
      }) */
  </script>
</body>
</html>