<template>
  <div>
    <h2>{{ titre }}</h2>
    <div class="container">
      <div class="col-md-12">
        <div class="row">
          <ul id="result">
            <li v-for="result in results">

              {{ result.title }}{{ result.readyInMinutes }}{{ result.image }}

           </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import App from "../App.vue";


export default {
   name: "ResultSearch",
 
  data() {
    return {
      titre:"liste de la recherche",
      results: [
        {
          id: '',
          title: '',
          readyInMinutes: '',
          servings: '',
          image: '',
          imageUrls: [],
        },
      ],
     };
  },
};
</script>

<style scoped>

</style>
