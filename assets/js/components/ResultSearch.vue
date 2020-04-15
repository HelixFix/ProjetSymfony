<template>
  <div id="result">
    <h2>Resultat de la recheche</h2>

    <ul v-if="result">
      <div class="col-md-4" v-for="result in results">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" :src="result.image" alt="Card image cap" />

          <div class="card-body">
            <h5 class="card-title">{{ result.title }}</h5>
          </div>
        </div>
      </div>
    </ul>
  </div>
</template>
<script>
// import App from "../App.vue";

export default {
  name: "ResultSearch",

  data() {
    return {
      titre: "liste de la recherche",
      results: [],
      result: {
        id: "",
        title: "",
        readyInMinutes: "",
        servings: "",
        image: "",
        imageUrls: []
      }
    };
  },

  // methods: {
  //   SearchResult() {
  //     fetch("/search")
  //       .then(res => res.json())
  //       .then(data => {
  //         this.results = data;
  //         console.log(res.data);
  //       });
  //   }
  // }
};
</script>

<style scoped></style>
