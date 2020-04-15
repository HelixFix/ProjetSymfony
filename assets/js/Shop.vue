<template>
  <div class="hello">
    <h1>{{ msg }}</h1>

    <form v-on:submit.prevent="onSubmit" id="form">
      <input type="text" name="form" />

      <input type="submit" />
    </form>

    <!-- <div v-for="shop in shops" :key="shop.siret"> -->
      <!-- <h1>{{ shop.siret }}</h1> -->

      <li v-for="shop in shops" :key="shop.siret">

        <span>{{ shop.siret }}</span>
        <span>

          <strong>Nom:</strong>
          <strong v-for="etablissement in shop.periodesEtablissement" :key="etablissement.enseigne1Etablissement">{{ shop.enseigne1Etablissement }}</strong>

        </span>
        <!-- <span class="price">{{ pproduct.price }} zł</span> -->
      </li>

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
      msg: "Welcome to Your Vue.js App"
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
          this.shops = data.etablissements;
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