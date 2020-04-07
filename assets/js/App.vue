<template>
  <div class="container">
    <div class="col-md-12">
      <h2>Catégories</h2>
      <div class="row">
        <ul class="col-md-12">

          <li v-for="tag in tags">

            <a v-bind:href="tag.url" >{{ tag.name }}</a>

          </li>
        </ul>
        <h2>Liste des produits de la catégories {{ tag.name }}</h2>
        <ul class="col-md-12">

          <li v-for="tag in tags">
            
            
            <a v-bind:href="tag.url">

                <div>

                    <img>

                    <span>
                        
                </div>

            </a>

          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
const axios = require('axios').default;
export default {
  name: "App",

  data() {
    return {
      tags: [
      //     {
      //     "id": "2019",
      //     "products": 373003,
      //     "known": 0,
      //     "name": "2019",
      //     "url": "https://world.openfoodfacts.org/entry-date/2019"
      // },
      // {
      //     "url": "https://world.openfoodfacts.org/entry-date/2018",
      //     "id": "2018",
      //     "products": 326432,
      //     "known": 0,
      //     "name": "2018"
      // },
      // {
      //     "url": "https://world.openfoodfacts.org/entry-date/2017",
      //     "id": "2017",
      //     "products": 283995,
      //     "known": 0,
      //     "name": "2017"
      // }, {
        {
            "url": "https://world.openfoodfacts.org/category/plant-based-foods-and-beverages",
            "products": 135360,
            "id": "en:plant-based-foods-and-beverages",
            "name": "Plant-based foods and beverages",
            "known": 1
        },
        {
            "known": 1,
            "name": "Plant-based foods",
            "id": "en:plant-based-foods",
            "products": 116597,
            "url": "https://world.openfoodfacts.org/category/plant-based-foods"
        },
        {
            "url": "https://world.openfoodfacts.org/category/snacks",
            "known": 1,
            "name": "Snacks",
            "id": "en:snacks",
            "products": 64842
        },
      ]

    };
  },

  mounted: function() {
    this.list();
  },
  methods: {
    list: function() {
    
    let codeBarre = tags["products"]
      axios
        .get("https://world.openfoodfacts.org/ https://world.openfoodfacts.org/api/v0/product/".codeBarre.".json")
        .then((response) => (this.codeBarre = response));
    },
  },
};
</script>

<style></style>
