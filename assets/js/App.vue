<template>
  <div class="container">
    <div class="col-md-12">
      <h2>Rechecher vos recettes</h2>

      <div class="row">
        <form
          action="/search"
          method="get"
          id="formRecipesSearch"
          @submit="submit"
        >
          <input type="text" name="search" placeholder="Search..." required />

          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
      <p>{{ results }}</p>
      <ResultSearch v-model="results"/>
    </div>

<Recipes />

  </div>

</template>

<script>
// const axios = require("axios").default;
import ResultSearch from "./components/ResultSearch.vue";
import Recipes from "./components/Recipes.vue";


export default {
  name: "app",
  components: {
    ResultSearch, Recipes
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
  //  methods: {


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
  methods: {

    submit(){

      const formData = new FormData(document.getElementById("formRecipesSearch"))
      fetch("/search", {
        method: "get",
        body: formData

      });
    },

  }
  //     .then(results => res.status(200).json(results))
  //     .then(data => console.log(data))
  //     .catch(err => console.error(err));
  // }
};
</script>

<style scoped></style>
