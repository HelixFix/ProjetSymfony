<template>
  <div class="hello">
    <h1>{{ msg }}</h1>

    <form v-on:submit.prevent="onSubmit" id="form">
      <input type="text" name="form" placeholder="Votre code postal"/>

      <input type="submit" />
    </form>

   

    <div class="card" style="width: 18rem;" v-for="shop in shops" :key="shop.siret">
      <!-- <span>{{ shop.adresseEtablissement.codePostalEtablissement }}</span> -->
      
  
        <div v-for="etablissement in shop.periodesEtablissement" :key="etablissement.dateDebut"> <!-- Niveau 1 : parent = etablissements -->


          <div v-if="etablissement.dateFin === null"> <!-- Toujours ouvert -->

            <div class="card-body" v-if="etablissement.enseigne1Etablissement"> <!-- Possède un nom -->
                    <img v-if="etablissement.enseigne1Etablissement === 'CARREFOUR CITY'" class="card-img-top" src="../images/05993171_NV_0001_photo.jpg" alt="Card image cap">

                <h5 class="card-title">{{ etablissement.enseigne1Etablissement }} </h5>
                

                <!-- <strong>Adresse:</strong> -->
                <p class="card-text">{{ shop.adresseEtablissement.numeroVoieEtablissement + " " + shop.adresseEtablissement.typeVoieEtablissement + " " +  shop.adresseEtablissement.libelleVoieEtablissement + " " +  shop.adresseEtablissement.codePostalEtablissement + " " +  shop.adresseEtablissement.libelleCommuneEtablissement}}</p>
                 <!-- Object pas besoin de faire une boucle -->
                <!-- <a href="https://www.google.com/search?q=" + {{ etablissement.enseigne1Etablissement }} ></a> -->
                

                <a v-bind:href="url + etablissement.enseigne1Etablissement + ' ' + shop.adresseEtablissement.typeVoieEtablissement + ' ' + shop.adresseEtablissement.libelleVoieEtablissement + ' ' + shop.adresseEtablissement.codePostalEtablissement + ' ' + shop.adresseEtablissement.libelleCommuneEtablissement" class="btn btn-primary"> Plus d'informations </a>
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

export default {
  name: "Shop",

  data() {
    return {
      shops: [],
      msg: "Magasins près de chez vous",
      url: "https://www.google.com/search?q="
    //   cp: $cp
    };
  },

  // define methods under the `methods` object
  methods: {
    onSubmit: function(event) {
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

div:empty {
    display: none;
}

</style>