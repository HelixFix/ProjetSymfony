<template>
  <div class="container">
    <div class="col-md-12">
      <h2>Rechecher vos recettes</h2>

      <div class="row">
        <form
          action="/search"
          method="post"
          id="formRecipesSearch"
         
        >
          <input type="text" name="search" placeholder="Search..." required />

          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
<p>{{ results }}</p>
      <ResultSearch v-model="results" />
    </div>
  </div>
</template>

<script>
// const axios = require("axios").default;
import ResultSearch from "./components/ResultSearch.vue";

export default {
  name: "app",
  components: {
    ResultSearch
  },

  data() {
    return {
      results: [
        {
          id: "",
          title: "",
          readyInMinutes: "",
          servings: "",
          image: "",
          imageUrls: []
        }
      ]
    };
  },
   methods: {

      onSubmit: function(event) {

        axios
        .post('https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/search?query=burger')
        .then(response => (this.results = response.data))

      }

  //   submit() {
  //     fetch("/search", {
  //       method: "post",
  //       headers: {
  //         "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
  //       },
  //       body: "foo=bar&lorem=ipsum"
  //     })
  //       .then(json)
  //       .then(function(data) {
  //         console.log("Request succeeded with JSON response", data);
  //       })
  //       .catch(function(error) {
  //         console.log("Request failed", error);
  //       });
  //   }
  // }
  // methods: {
  //   onSubmit: function(event) {
  //     const formData = new FormData(document.getElementById("form"))
  //     fetch("/search", {
  //       method: "post",
  //       body: formData
  //     });
  //   },

  }
  //     .then(results => res.status(200).json(results))
  //     .then(data => console.log(data))
  //     .catch(err => console.error(err));
  // }
};
</script>

<style scoped></style>
