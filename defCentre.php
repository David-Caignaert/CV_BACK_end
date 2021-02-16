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
      <h6>Suppression un centre d'interet</h6>
    </div>
    <div class="card-body">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">Intitule</span>
        </div>
        <input
                type="text"
                class="form-control"
                maxlength="32"
                id="intitule_centre_interet"
                placeholder="Intitule"
                disabled
              />
      </div>
    </div>
    <div class="alert alert-warning text-center">
      Voulez-vous vraiment supprimer ce centre d'interet ?
    </div>
    <div class="card-footer">
      <button type="button" class="btn btn-default float-left" id="cancel">
        Cancel
      </button>
      <button type="submit" class="btn btn-primary float-right">Valider</button>
    </div>
  </form>
  <script>
    
    let centre_interet = null;
    let parametres = window.location.toString();
    let form = document.querySelector('#form').outerHTML;
    
    console.log('parametres',parametres);

    let parametreID = parametres.split('?');
    let idCentreInteret = parametreID[1];
    console.log('id',idCentreInteret);
    const params = new FormData();
    params.append('id',idCentreInteret);
    
    axios.post("get/getCentreInteret.php", params)
          .then((response) => {
            console.log('response',response);
            centre_interet = response.data;
            let formCentre = form;
            // Alimentation du formulaire
            document.querySelector("#intitule_centre_interet").value = centre_interet.intitule;
            //formCentre = formCentre.replace('{{intitule}}',centre_interet.intitule);
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
            params2.append('id',idCentreInteret);
            // Ajax
            axios.post('delete/deleteCentreInteret.php', params2)
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