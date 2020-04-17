<template>
  <div class="container">
    <div class="col-md-12">
      <h2>Rechecher vos recettes</h2>

      <div class="row">
        <form id="formRecipesSearch" @submit.prevent="submit">
          <input type="text" name="search" placeholder="Search..." required />

          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
      <div v-if="submit" class="col-md-12">
        <div class="row">
          <h2>Resultat de la recheche</h2>
          <ul>
            <div class="col-md-4" v-for="result in results" :key="result.id">
              <div class="card" style="width: 18rem;">
                <a
                  ><img
                    class="card-img-top"
                    :src="result.image"
                    alt="Card image cap"
                /></a>
                <div class="card-body">
                  <a
                    ><h5 class="card-title">{{ result.title }}</h5></a
                  >
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
                <div
                  class="col-md-4"
                  v-for="recipe in recipes"
                  :key="recipe.id"
                >
                  <div class="card" style="width: 18rem;">
                    <img
                      class="card-img-top"
                      :src="recipe.image"
                      alt="Card image cap"
                    />
                    <div class="card-body">
                      <h5 class="card-title">{{ recipe.title }}</h5>
                    </div>
                  </div>
                </div>
              </ul>
            </div>
          </div>
        </div>
      </div>
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

      recipes: [],
    };
  },

  methods: {
    submit: function(event) {
      const formData = new FormData(
        document.getElementById("formRecipesSearch")
      );
      fetch("/searchResult", {
        method: "post",
        body: formData,
        success: true,
      })
        .then((res) => res.json())
        .then((data) => {
          this.results = JSON.parse(JSON.stringify(data.results));
          console.log(data.results);
        }).then((res)=> "erreur");
        
      // this.$emit("add-to-search", this.results);
    },
  },
  mounted() {
    fetch("/recipes")
      .then((res) => res.json())
      .then((data) => {
        this.recipes = JSON.parse(JSON.stringify(data.recipes));
      });
  },
};
</script>

<style scoped></style>
