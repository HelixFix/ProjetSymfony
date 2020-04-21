<template>

  <div class="hello">

    <div class="container">
        
        <h1>{{ msg }}</h1>



        <form class="" v-on:submit.prevent="onSubmit" id="form">

            <div class="error isa_info" v-if="!$v.cp.required">
              <i class="fa fa-info-circle"></i>
              Veuillez entrer un code postal
            </div>
            <div class="error isa_warning" v-if="!$v.cp.minLength">
              <i class="fa fa-warning"></i>
              Le code postal doit être composé de cinq {{$v.cp.$params.minLength.min}} chiffres.
            </div>
            <div class="error isa_warning" v-if="!$v.cp.maxLength">
              <i class="fa fa-warning"></i>
              Le code postal doit être composé de cinq {{$v.cp.$params.maxLength.max}} chiffres.
            </div>

            <div class="search">

            <div class="form-group form-inline md-form form-sm mt-0" :class="{ 'form-group--error': $v.cp.$error }" style="margin-bottom: 0px;">
            <i class="fas fa-map-marker-alt fa-2x" style="margin-left: 18px;margin-right: 18px;"></i>&nbsp;&nbsp;&nbsp;Trouvez votre magasin&nbsp;&nbsp;&nbsp;<i class="fas fa-long-arrow-alt-right "></i>&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="form-control mr-sm-2" style="width: 260px;" type="text" name="form" placeholder="Ex.: 68100" pattern="[0-9]{5}" v-model.trim="$v.cp.$model"/>
            
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" :disabled="submitStatus === 'PENDING'">Envoyer</button>

            </div>

            </div>
            

            <p class="typo__p isa_success" v-if="submitStatus === 'OK'">
              <i class="fa fa-check"></i>
              Merci pour votre soumission !
            </p>
            <p class="typo__p" style="color: red;" v-if="submitStatus === 'ERROR'">Veuillez remplir correctement le formulaire.</p>
            <p class="typo__p" v-if="submitStatus === 'PENDING'">Envoi...</p>
            <p class="typo__p" v-if="submitStatus === 'END'"></p>

        </form>

    <div class="row">
     
    <div class="" style="margin-top: 1em;" v-for="shop in shops" :key="shop.siret">
      <!-- <span>{{ shop.adresseEtablissement.codePostalEtablissement }}</span> -->
      
        <div class=""  v-for="etablissement in shop.periodesEtablissement" :key="etablissement.dateDebut"> <!-- Niveau 1 : parent = etablissements -->

            <div  class="" v-if="etablissement.dateFin === null"> <!-- Toujours ouvert -->

                <div v-if='etablissement.etatAdministratifEtablissement === "A"'> <!-- Toujours Actif -->

                    <div class="card card-body col-sm;  " v-if="etablissement.enseigne1Etablissement"> <!-- Possède un nom -->

                        <div class="d-flex flex-wrap align-items-center " style="width: 18rem; height: 347px;">
                        
                            <img v-if="etablissement.enseigne1Etablissement === 'CARREFOUR CITY'" class="card-img-top" style="margin-left: 1em;" src="../images/CarrefourCity.jpg" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'CARREFOUR EXPRESS'" class="card-img-top" style="margin-left: 1em;" src="../images/CarrefourExpress.jpg" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'PROXI SUPER'" class="card-img-top" style="margin-left: 1em;" src="../images/ProxiSuper.png" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'PROXI'" class="card-img-top" style="margin-left: 1em;" src="../images/Proxi.png" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'LIDL'" class="card-img-top" style="margin-left: 1em;" src="../images/Lidl.png" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'MATCH'" class="card-img-top" style="margin-left: 1em;" src="../images/Match.jpg" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'SUPERMARCHE MATCH'" class="card-img-top" style="margin-left: 1em;" src="../images/Match.jpg" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'DIA'" class="card-img-top" style="margin-left: 1em;" src="../images/Dia.jpg" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'AUCHAN SUPERMARCHE'" class="card-img-top" style="margin-left: 1em;" src="../images/Auchan.png" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'ALDI MARCHE'" class="card-img-top" style="margin-left: 1em;" src="../images/Aldi.png" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'ALDI MARCHE SARL'" class="card-img-top" style="margin-left: 1em;" src="../images/Aldi.png" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'INTERMARCHE'" class="card-img-top" style="margin-left: 1em;" src="../images/Intermarche.png" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'COOP'" class="card-img-top" style="margin-left: 1em;" src="../images/coop.jpg" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'MARCHE PLUS'" class="card-img-top" style="margin-left: 1em;" src="../images/MarchePlus.jpg" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'FRANPRIX'" class="card-img-top" style="margin-left: 1em;" src="../images/Franprix.png" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === '8 A HUIT'" class="card-img-top" style="margin-left: 1em;" src="../images/8aHuit.png" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'MUTEVELLI'" class="card-img-top" style="margin-left: 1em;" src="../images/Muteveli.jpeg" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'MUTEVELLI MARKET'" class="card-img-top" style="margin-left: 1em;" src="../images/Muteveli.jpeg" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'MUTEVELLI SUPERMARKET'" class="card-img-top" style="margin-left: 1em;" src="../images/Muteveli.jpeg" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'SIMPLY MARKET'" class="card-img-top" style="margin-left: 1em;" src="../images/SimplyMarket.png" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'SUMA'" class="card-img-top" style="margin-left: 1em;" src="../images/Suma.jpeg" alt="Card image cap">
                            <img v-else-if="etablissement.enseigne1Etablissement === 'ATAC'" class="card-img-top" style="margin-left: 1em;" src="../images/Atac.png" alt="Card image cap">
                            <img v-else class="card-img-top" style="margin-left: 1em;" src="../images/Default.jpg" alt="Card image cap">

                        </div>
                        
                        <h5 class="card-title" style="width: 330px;">{{ etablissement.enseigne1Etablissement }}</h5>
                        
                        <div class="card-text" style="width: 280px;">
                        <!-- <strong>Adresse:</strong> -->
                        <p style="margin-bottom: 0px;">{{ shop.adresseEtablissement.numeroVoieEtablissement + " " + shop.adresseEtablissement.typeVoieEtablissement + " " +  shop.adresseEtablissement.libelleVoieEtablissement}}</p>
                        <!-- Object pas besoin de faire une boucle -->
                        <p>{{ shop.adresseEtablissement.codePostalEtablissement + " " +  shop.adresseEtablissement.libelleCommuneEtablissement}}</p>
                        </div>

                        <a v-bind:href="url + etablissement.enseigne1Etablissement + ' ' + shop.adresseEtablissement.typeVoieEtablissement + ' ' + shop.adresseEtablissement.libelleVoieEtablissement + ' ' + shop.adresseEtablissement.codePostalEtablissement + ' ' + shop.adresseEtablissement.libelleCommuneEtablissement" class="btn btn-primary"> Plus d'informations </a>
                        
                    </div>
        
                </div>

            </div>
  
        </div>

    </div>

    </div>

    </div>

    <!-- </div> -->

    <!-- <Postal /> -->

    <!-- <Shops />  -->
</div>

</template>

<script>
// import Shops from './components/ShopItem'; // importer Shops.vue
// import Postal from './components/PostalForm'; // importer Shops.vue
import { required, minLength, maxLength } from 'vuelidate/lib/validators'

export default {
  name: "Shop",

  data() {
    return {
      shops: [],
      msg: "Magasins près de chez vous",
      url: "https://www.google.com/search?q=",
      map: "https://www.google.fr/maps?q=",
      cp: "",
      submitStatus: null,
      logoCarrefourCity: "../images/05993171_NV_0001_photo.jpg"
    //   cp: $cp
    };
  },
  validations: {
    cp: {
      required,
      minLength: minLength(5),
      maxLength: maxLength(5)
    },

  },


  // define methods under the `methods` object
  methods: {
    onSubmit: function(event) {
      console.log('submit!')
      this.$v.$touch()
      if (this.$v.$invalid) {
        this.submitStatus = 'ERROR'
            setTimeout(() => {
          this.submitStatus = 'END'
        }, 3000)
      } else {
        // do your submit logic here
        this.submitStatus = 'PENDING'
        setTimeout(() => {
          this.submitStatus = 'OK'
        }, 500)
        setTimeout(() => {
          this.submitStatus = 'END'
        }, 3000)
        console.log(setTimeout(this.submitStatus));
        
      }
    
      const formData = new FormData(document.getElementById("form"));
      fetch("/test", {
        method: "post",
        body: formData,
        success: true
      })
        .then(res => res.json())
        .then(data => {
          this.shops = data.etablissements; // Niveau 0
          console.log(this.shops);
        });
    }
  }

  //        const instance = axios.create({
  //         baseURL: 'https://api.insee.fr/entreprises/sirene/V3/,
  //         timeout: 1000,
  //         headers: {'Authorization': 'Bearer '+a6452ce6-b2d3-3292-bd24-c5de16d6d937}
  //         });

  //         instance.get('/path')
  //         .then(response => {
  //             return response.data;
  //         })

  //         const codePostal = formData
  //         const url = `/post/${codePostal}`;
  //         getPost(url)
  //         export const getPost = (funcParamURL) => {
  //         return axios.get(`${funcParamURL}`);
  // }
};
</script>

<style scoped>
.isa_info, .isa_success, .isa_warning, .isa_error {
margin: 10px 0px;
padding:12px;
 
}
.isa_info {
    color: #00529B;
    background-color: #BDE5F8;
}
.isa_success {
    color: #4F8A10;
    background-color: #DFF2BF;
}
.isa_warning {
    color: #9F6000;
    background-color: #FEEFB3;
}
.isa_error {
    color: #D8000C;
    background-color: #FFD2D2;
}
.isa_info i, .isa_success i, .isa_warning i, .isa_error i {
    margin:10px 22px;
    font-size:2em;
    vertical-align:middle;
}

.search {
  background: #e7e7e7;
  border: 1px solid #a0a0a0;
  padding: 20px;
  text-align: center;
  font-family: "Montserrat",Arial,Helvetica,sans-serif;
  font-size: 14px;
  color: #232323;
}

.row {
  margin-right: -8px;
  margin-left: -5px;
}

h1 {
  text-transform: uppercase ;
  font-weight: bold;
}

</style>

{% block stylesheets %}

{% endblock %}
