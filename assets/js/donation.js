/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

console.log('Hello Webpack Encore! Edit me in assets/js/donation.js');


import Vue from 'vue'
import Donation from './Donation.vue'
// import Card from './components/Card.vue'


// let card = {


//   template: '<div class="card bg-dark text-white"><img class="card-img" src="..." alt="Card image"><div class="card-img-overlay"><h5 class="card-title">Card title</h5><p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p><p class="card-text">Last updated 3 mins ago</p></div></div>'



// }


new Vue({
    el: "#donation",
    components: {
      Donation,
    },
    template: "<Donation/>",

    
})


