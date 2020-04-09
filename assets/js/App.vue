<template>
  <div class="container">
    <div class="col-md-12">
      <h2>Rechecher vos recettes</h2>
      <div class="row">
       <form
        action="search/id"
        method="get"
        id="formRecipesSearch">

        <input
          type="text"
          name="search"
          placeholder="Search..."
          required>

        <button class="btn btn-success" type="submit">Search</button>
       </form>
      </div>
      <div id="app">
      <ResultSearch/>
      </div>
    </div>
  </div>
</template>

<script>
// const axios = require("axios").default;
import ResultSearch from "./components/ResultSearch.vue";

export default {
  name: "app",
  components:{
    ResultSearch
    },
  
  data() {
    return {


    };
  },
   methods: {
    checkForm: function(event) {
      const formData = new FormData(document.getElementById("formRecipesSearch").value)
      fetch("/search", {
        method: "get",
        body: formData
      });
    },
    
  }
};
</script>

<style scoped>

</style>
