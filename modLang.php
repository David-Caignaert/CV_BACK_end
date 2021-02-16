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
      <h6>Modifier une experience pro</h6>
    </div>
    <div class="card-body">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">Nom</span>
        </div>
        <input
                type="text"
                class="form-control"
                maxlength="32"
                id="nom"
                placeholder="nom"
              />
      </div>
    </div>
    <div class="card-body">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">Logo</span>
        </div>
        <input
                type="text"
                class="form-control"
                maxlength="32"
                id="logo"
                placeholder="logo"
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

    let languageProgrammation = null;
    let parametres = window.location.toString();
    let form = document.querySelector('#form').outerHTML;
    
    console.log('parametres',parametres);

    let parametreID = parametres.split('?');
    let idLanguageProgrammation = parametreID[1];
    console.log('id',idLanguageProgrammation);
    const params = new FormData();
    params.append('id',idLanguageProgrammation);
    
    axios.post("get/getLanguageProgrammation.php", params)
          .then((response) => {
            console.log('response',response);
            languageProgrammation = response.data;
            let formLanguageProgrammation = form;
            // Alimentation du formulaire
            document.querySelector("#nom").value = languageProgrammation.nom;
            document.querySelector("#logo").value = languageProgrammation.logo;
            
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
            params2.append('id',idLanguageProgrammation);
            params2.append('nom',document.querySelector("#nom").value);
            params2.append('logo',document.querySelector("#logo").value);
            // Ajax
            axios.post('update/updateLanguageProgrammation.php', params2)
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