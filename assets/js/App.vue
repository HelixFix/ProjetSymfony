<template>
  <div class="container">
    <div class="col-md-12">
      <h2>Rechecher vos recettes</h2>

      <div class="row">
        <form
          action="/search"
          id="formRecipesSearch"
          @submit="submit"
        >
          <input type="text" name="search" placeholder="Search..." required />

          <button class="btn btn-success" type="submit"
          >Search</button>
        </form>
      </div>
      <div class="col-md-12">
        <div class="row">
          <div id="result">
          {{ results }}
              <ResultSearch @add-to-search="submit"/>
           
          </div>
        </div>
      </div>
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
    ResultSearch,
    Recipes
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
     submit() {
        const formData = new FormData(document.getElementById("formRecipesSearch"));
        fetch("/search",{
          method:"post",
          body: formData,
          success : true
        })
     .then(res => res.json())
     .then(data => {
       this.results = data;
      console.log(data)
     })
      this.$emit('add-to-search', this.results)
    }
  }

};
</script>

<style scoped></style>
