<template>
  <div class="container">
    <div class="col-md-12">
      <h2>Rechecher vos recettes</h2>

      <div class="row">
        <form id="formRecipesSearch" @submit="submit">
          <input type="text" name="search" placeholder="Search..." required />

          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
      <div class="col-md-12">
        <div class="row">
          <h2>Resultat de la recheche</h2>
          <ul v-if="result">
            <div class="col-md-4" v-for="result in results" :key="result.id">
              <div class="card" style="width: 18rem;">
                <img
                  class="card-img-top"
                  :src="result.image"
                  alt="Card image cap"
                />
                <p>{{ result.id }}</p>
                <div class="card-body">
                  <h5 class="card-title">{{ result.title }}</h5>
                </div>
              </div>
            </div>
          </ul>
        </div>
      </div>

      <div>
        <h2>liste des Recettes</h2>
        <div class="container">
          <div class="col-md-12">
            <div class="row">
              <ul v-for="recipe in recipes" :key="recipe.id">
                <li>
                  <p>{{ recipe.id }}</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
//  const axios = require("axios").default;


export default {
  name: "app",

  data() {
    return {
      results: [],
      recipes: []
    };
  },

   methods: {
  //     submit(){

  //         let key ="?apiKey=336da2ca084c4d70a0f4f966b6d76c85";
  //         axios.get('https://api.spoonacular.com/recipes/search?query=burger')
  //       .then(response => {
  //         var self = this;
  //         parseString(response.data, function (err, result) {
  //           self.events = result
  //         });
  //       })
  //     },
    submit: function(event) {
      const formData = new FormData(
        document.getElementById("formRecipesSearch")
      );
      fetch("/search", {
        method: "post",
        body: formData,
        success: true
      })
        .then(res => res.json())
        .then(data => {
          this.results = data.results;
          console.log(this.results);
        });
      // this.$emit("add-to-search", this.results);
  },

    mounted() {
      fetch("/")
        .then(res => res.json())
        .then(data => {
          this.recipes = data.recipes;
          console.log(this.recipes);
        });
    } }
};
</script>

<style scoped></style>
