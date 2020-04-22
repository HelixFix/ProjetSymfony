<template>
  <div class="container">
    <div class="col-md-12">
      <h2>Search your recipe</h2>
      <!-- Formulaire de recherche de recettes -->
      <div class="row">
        <form id="formRecipesSearch" class="searchBox" @submit.prevent="submit">
          <input
            id="input"
            class="searchInput"
            type="text"
            name="search"
            placeholder="Search..."
            required
          />

          <button class="searchButton" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>
      <!-- fin du formulaire-->

      <!-- Affiche des resultats de la recherche -->
      <div class="container">
        <div v-if="isDisplay" class="col-md-12">
          <div class="row">
            <h2>Search Result</h2>
            <ul>
              <div class="col-md-4" v-for="result in results" :key="result.id">
                <div class="card" style="width: 18rem;">
                  <a href="recipe.sourceUrl" target="_blank"
                    ><img
                      class="card-img-top"
                      :src="urlImage + result.image"
                      alt="image de la recette"
                  /></a>
                  <div class="card-body">
                    <a href="recipe.sourceUrl" target="_blank"
                      ><h5 class="card-title">{{ result.title }}</h5></a
                    >
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
                    <a :href="'/recipes/' + recipe.id"
                      ><img
                        class="card-img-top"
                        :src="recipe.image"
                        alt="Card image cap"
                        target="_blank"
                    /></a>
                    <div class="card-body">
                      <a :href="recipe.sourceUrl" target="_blank"
                        ><h5 class="card-title">{{ recipe.title }}</h5></a
                      >
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
          })
          .then((res) => "erreur");
    },
  },
};
</script>

<style>
body {
  background: lightgray;
}

.searchBox {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, 50%);
  background: #2f3640;
  height: 60px;
  border-radius: 40px;
  padding: 10px;
} 

.searchBox:hover > .searchInput {
  width: 240px;
  padding: 0 6px;
}

.searchBox:hover > .searchButton {
  background: white;
  color: #2f3640;
}

.searchButton {
  color: white;
  float: right;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #2f3640;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: 0.4s;
}

.searchInput {
  border: none;
  background: none;
  outline: none;
  float: left;
  padding: 0;
  color: white;
  font-size: 16px;
  transition: 0.4s;
  line-height: 40px;
  width: 0px;
}

@media screen and (max-width: 620px) {
  .searchBox:hover > .searchInput {
    width: 150px;
    padding: 0 6px;
  }
}
</style>
