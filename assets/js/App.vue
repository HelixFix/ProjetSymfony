<template>
  <div class="container">
    <div class="col-md-12">
      <h2>Search your recipe</h2>
      <!-- Formulaire de recherche de recettes -->
      <div class="row">
        <form id="formRecipesSearch" @submit.prevent="submit">
          <input
            id="input"
            type="text"
            name="search"
            placeholder="Search..."
            required
          />

          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
      <!-- fin du formulaire-->

      <!-- Affiche des resultats de la recherche -->
      <div class="container">
        <div v-if="isDisplay" class="col-md-12">
          <div class="row">
            <h2>Search Result</h2>
            <ul>
              <div class="col-md-4">
                <div v-for="result in results" :key="result.id">
                  <div class="card" style="width: 18rem;">
                    <a
                      ><img
                        class="card-img-top"
                        :src="urlImage + result.image"
                        alt="Card image cap"
                    /></a>
                    <div class="card-body">
                      <a
                        ><h5 class="card-title">{{ result.title }}</h5></a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </ul>
          </div>
        </div>
      </div>
      <!-- fin de l'affichage des résultats -->

      <!-- Affichage de la recette aléatoire -->
      <div>
        <h2>recipes suggestions</h2>
        <div class="container">
          <div class="col-md-12">
            <ul>
              <div class="row">
                <div
                  class="col-md-4"
                  v-for="recipe in recipes"
                  :key="recipe.id"
                >
                  <div class="card" style="width: 18rem;">
                    <a :href="recipe.sourceUrl" target="_blank"
                      ><img
                        class="card-img-top"
                        :src="recipe.image"
                        alt="Card image cap"
                        target="_blank"
                        
                    /></a>
                    <div class="card-body">
                      <a :href="recipe.sourceUrl" target="_blank"><h5 class="card-title">{{ recipe.title }}</h5></a>
                    </div>
                  </div>
                </div>
              </div>
            </ul>
          </div>
        </div>
      </div>
      <!-- Fin de l'affichage de la recette aléatoire -->
    </div>
  </div>
</template>

<script>
export default {
  name: "app",

  data() {
    return {
      results: [
        {
          id: "",
          title: "",
          readyInMinutes: 0,
          servings: 0,
          image: "",
          imageUrls: [],
        },
      ],
      urlImage: "https://spoonacular.com/recipeImages/",
      recipes: [],

      isDisplay: false,
    };
  },

  created: function() {
    fetch("/recipes")
      .then((res) => res.json())
      .then((data) => {
        this.recipes = data;
        console.log(data);
      });
  },

  // mounted: function(){

  //     console.log(recipes);
  //     for (let i = 0; i < this.recipes.length; i++) {
  //       this.recipes[i].push(0,1);
  //       for (let j = 0; j < this.recipes[i].recipe.length; j++) {
  //         this.recipes[i].recipe[j].push(0,1);
  //       }
  //     }
  //   },

  methods: {
    submit: function(event) {
      // function du formulaire lors de la soumission
      const formData = new FormData(
        document.getElementById("formRecipesSearch"),
        document.getElementById(input)
      );
      (this.isDisplay = true),
        fetch("/searchResult", {
          method: "POST",
          body: formData,
          success: true,
        })
          .then((res) => res.json())
          .then((data) => {
            this.results = JSON.parse(JSON.stringify(data.results));
            console.log(data.results);
          })
          .then((res) => "erreur");
    },
  },
};
</script>

<style scoped></style>
