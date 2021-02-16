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
      <h6>Suppression une experience pro</h6>
    </div>
    <div class="card-body">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">date de début</span>
        </div>
        <input
                type="text"
                class="form-control"
                maxlength="32"
                id="date_debut"
                placeholder="date_debut"
                disabled
              />
      </div>
    </div>
    <div class="card-body">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">date de fin</span>
        </div>
        <input
                type="text"
                class="form-control"
                maxlength="32"
                id="date_fin"
                placeholder="date_fin"
                disabled
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
                disabled
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
                disabled
              />
      </div>
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
                disabled
              />
      </div>
    </div>
    
    <div class="alert alert-warning text-center">
      Voulez-vous vraiment supprimer cette experience pro ?
    </div>
    <div class="card-footer">
      <button type="button" class="btn btn-default float-left" id="cancel">
        Cancel
      </button>
      <button type="submit" class="btn btn-primary float-right">Valider</button>
    </div>
  </form>
  <script>

    let experiencePro = null;
    let parametres = window.location.toString();
    let form = document.querySelector('#form').outerHTML;
    
    console.log('parametres',parametres);

    let parametreID = parametres.split('?');
    let idExperiencePro = parametreID[1];
    console.log('id',idExperiencePro);
    const params = new FormData();
    params.append('id',idExperiencePro);
    
    axios.post("get/getExperiencePro.php", params)
          .then((response) => {
            console.log('response',response);
            experiencePro = response.data;
            let formExperiencePro = form;
            // Alimentation du formulaire
            document.querySelector("#date_debut").value = experiencePro.dateDebut;
            document.querySelector("#date_fin").value = experiencePro.dateFin;
            document.querySelector("#intitule").value = experiencePro.intitule;
            document.querySelector("#lieu").value = experiencePro.lieu;
            document.querySelector("#ville").value = experiencePro.ville;
            
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
            params2.append('id',idExperiencePro);
            // Ajax
            axios.post('delete/deleteExperiencePro.php', params2)
            .then((response) =>{    
              console.log('response',response);     
              document.location.href="http://localhost/CV_back_end/essaie_delate.php"; 
              
            })
            .catch(function(error){
                console.log("ERREUR",error)
            });     
    });
  </script>
</body>
</html>