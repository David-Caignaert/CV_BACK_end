<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">        

  <title>Document</title>
</head>
<body>
  <form id="form">
    <div class="card-header">
      <h6>Modifier une formation</h6>
    </div>
    <div class="card-body">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">Ville</span>
        </div>
        <input
                type="text"
                class="form-control"
                maxlength="32"
                id="ville"
                placeholder="ville"
              />
      </div>
    </div>
    <div class="card-body">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">année</span>
        </div>
        <input
                type="text"
                class="form-control"
                maxlength="32"
                id="annee"
                placeholder="annee"
              />
      </div>
    </div>
    <div class="card-body">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">intitulé</span>
        </div>
        <input
                type="text"
                class="form-control"
                maxlength="32"
                id="intitule"
                placeholder="intitule"
              />
      </div>
    </div>
    <div class="card-body">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">Lieu</span>
        </div>
        <input
                type="text"
                class="form-control"
                maxlength="32"
                id="lieu"
                placeholder="lieu"
              />
      </div>
    </div>
    
    
    <div class="alert alert-warning text-center">
      Voulez-vous vraiment modifier cette experience pro ?
    </div>
    <div class="card-footer">
      <button type="button" class="btn btn-default float-left" id="cancel">
        Cancel
      </button>
      <button type="submit" class="btn btn-primary float-right">Valider</button>
    </div>
  </form>
  <script>

    let formation = null;
    let parametres = window.location.toString();
    let form = document.querySelector('#form').outerHTML;
    
    console.log('parametres',parametres);

    let parametreID = parametres.split('?');
    let idFormation = parametreID[1];
    console.log('id',idFormation);
    const params = new FormData();
    params.append('id',idFormation);
    
    axios.post("get/getFormation.php", params)
          .then((response) => {
            console.log('response',response);
            formation = response.data;
            let formFormation = form;
            // Alimentation du formulaire
            document.querySelector("#ville").value = formation.ville;
            document.querySelector("#annee").value = formation.anneeObtention;
            document.querySelector("#intitule").value = formation.intitule;
            document.querySelector("#lieu").value = formation.lieu;
            
    })
    .catch(function (error) {
      console.log("ERREUR", error);
    });
    document.querySelector("#form")
        .addEventListener("submit", function(event){
          console.log('bou');
            // Stopper la propagation évènementielle
            event.preventDefault(); 
            // parametres
            const params2 = new FormData();
            params2.append('id',idFormation);
            params2.append('ville',document.querySelector("#ville").value);
            params2.append('anneeObtention',document.querySelector("#annee").value);
            params2.append('intitule',document.querySelector("#intitule").value);
            params2.append('lieu',document.querySelector("#lieu").value);
            // Ajax
            axios.post('update/updateFormation.php', params2)
            .then((response) =>{    
              console.log('response',response);     
              document.location.href="http://localhost/CV_back_end/essaie_update.php"; 
              
            })
            .catch(function(error){
                console.log("ERREUR",error)
            });     
    });
  </script>
</body>
</html>