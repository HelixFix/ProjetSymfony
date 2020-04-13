<template>
  <div>
    <h2>{{ title }}</h2>
    <div class="container">
      <div class="col-md-12">
        <div class="row">
          <ul id="result">
            <li v-for="result in results">
              {{ result.title }},{{ result.readyInMinutes }},{{ result.image }}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import App from "../App.vue";
import ResultSearch from "./ResultSearch";

export default {
//   name: "ResultSearch",
 
  data() {
    return {
      results: [
        {
          id: null,
          title: null,
          readyInMinutes: null,
          servings: null,
          image: null,
          imageUrls: [],
        },
      ],
    };
  },
};
</script>

<style scoped>

</style>
