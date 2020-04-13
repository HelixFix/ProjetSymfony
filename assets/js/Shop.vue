<template>

  <div class="hello">

    <h1>{{ msg }}</h1>

    <Postal />

    <Shops v-bind:shops="shops"/> <!-- -->

    </div>

</template>

<script>

import Shops from './components/ShopItem'; // importer Shops.vue
import Postal from './components/PostalForm'; // importer Shops.vue

export default {

  name: "Shop",
   components: {
      Shops, // Enregistrer Shops
      Postal // Enregistrer Postal

  },

  data() {

    return {
      msg: "Welcome to Your Vue.js App"

    };

  },
//     data () {

//       return {
// // Like a fake REST API
//           shops: [
//               {
//                   id: 1,
//                   title: "Todo One",
//                   completed: false
//               },
//               {
//                   id: 2,
//                   title: "Todo Two",
//                   completed: true
//               },
//               {
//                   id: 3,
//                   title: "Todo Three",
//                   completed: false
//               }
//           ]
//       }
//   },
  // define methods under the `methods` object
  methods: {

    onSubmit: function(event) {

      const formData = new FormData(document.getElementById("form"));
      fetch("/test", {

        method: "post",
        body: formData,
        success: true

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