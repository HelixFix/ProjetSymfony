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

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');


import Vue from 'vue'
import Shop from './Shop.vue'



// new Vue({
//     el: "#shop",
//     components: {ApiShop}
// })

new Vue({
    el: "#donation",
    components: {Donation},
    template: "<Donation/>"
    
})

try{
    $response = new Response();
    $response->headers->set('Authorization', 'Bearer 526c1976-308d-3df0-957a-416622680356');
    $response->send();
    return $this->redirect('https://api.insee.fr/entreprises/sirene/V3/siret?q=trancheEffectifsEtablissement:21');      
}
catch(\Exception $e){
    error_log($e->getMessage());
}