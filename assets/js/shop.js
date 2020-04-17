/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import "../css/app.css";

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

console.log("Hello Webpack Encore! Edit me in assets/js/app.js");

import Vue from "vue";
import Shop from "./Shop.vue";
import axios from "axios";

new Vue({
  el: "#shop",
  template: "<Shop></Shop>",
  components: { Shop },
});

// axios.defaults.baseURL = 'https://api.insee.fr/entreprises/sirene/V3/siret?q';
// axios.defaults.headers.common['Authorization'] = "Bearer a6452ce6-b2d3-3292-bd24-c5de16d6d937";
// axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';

// axios.get('https://api.insee.fr/entreprises/sirene/V3/')
//   .then((response) => {
//     console.log(response.data);
//     console.log(response.status);
//     console.log(response.statusText);
//     console.log(response.headers);
//     console.log(response.config);
//   });

//   //
//   const AuthStr = 'Bearer '.concat(USER_TOKEN);
//   axios.get(URL, { headers: { Authorization: AuthStr } }).then(response => {
//           // If request is good...
//           console.log(response.data);
//         })
//         .catch((error) => {
//           console.log('error 3 ' + error);
//         });

// new Vue({
//     el: '#shop',
//     data () {
//       return {
//         info: null
//       }
//     },
//     mounted () {
//       axios
//         .get('https://api.coindesk.com/v1/bpi/currentprice.json')
//         .then(response => (this.info = response))
//     }
//   })
