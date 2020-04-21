

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');


import Vue from 'vue'
import Show from './Show.vue'
// import VueResource from 'vue-resource'



// Vue.use(VueResource)

import Show from './Show.vue'
new Vue({
   el: "#show",
   // components: {},
   template: "<RecipeShow/>",
   render: h=> h(Show),
   data:{

       

   }
})