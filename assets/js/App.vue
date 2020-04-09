<template>
  <div class="container">
    <div class="col-md-12">
      <h2>Rechecher vos recettes</h2>
      <div class="row">
       <form action="/test" method="POST" id="form">
        <input type="text" name="search" placeholder="Search...">
        <button class="btn btn-success" type="submit">Search</button>
       </form>
      </div>
      <ResultSearch/>
    </div>
  </div>
</template>

<script>
// const axios = require("axios").default;
import ResultSearch from "./components/ResultSearch.vue"
export default {
  name: "App",
  component:{ResultSearch},
  data() {
    return {


    };
  },
   methods: {
    onSubmit: function(event) {
      const formData = new FormData(document.getElementById("form"))
      fetch("/search", {
        method: "post",
        body: formData
      });
    },
    
  }
};
</script>

<style>

</style>
