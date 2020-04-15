<template>

  <div>
    <h2>{{ titre }}</h2>
    <div class="container">
      <div class="col-md-12">
        <div class="row">
          <ul id="result" v-for="recipe in recipes">

            <li v-bind:src="recipes.image">

              {{ recipe.id }}

           </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

</template>

<script>

import Recipes from "../App.vue";

export default {

    name: 'Recipes',

    data(){

        return{

            api: 'https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/random',

            titre:"Recettes Aléatoire",
            recipes:[],
            

        }
    },
    mounted(){

   this.$http.get('https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/random')
   .then((response) => {

   this.recipes = response.data

        console.log('success', response)

   }, (response) =>{

       console.log('erreur', response);
   })

    }
}

</script>

<style scoped></style>
