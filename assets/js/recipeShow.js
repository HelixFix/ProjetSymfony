

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

console.log('Hello Webpack Encore! Edit me in assets/js/recipeShow.js');


import Vue from 'vue'
import Show from './Show.vue'
// import VueResource from 'vue-resource'



// Vue.use(VueResource)


new Vue({
   el: "#show",
   //delimiters: ['${', '}'],
   // props: {
   //    recette: Number,
     
   //    },
   // components: {},
   template: "<RecipeShow/>",
   render: h=> h(Show),
})