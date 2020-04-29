<template>
  <div class="container">
    <h1>{{ recipeShow.title }}</h1>

    <div class="col-md-12">
      <div class="container">
        <div class="row">
          <div class="container col-md-6 mt-3">
            <div class="col-md-12">
              <img
                class="imgRecette"
                :src="recipeShow.image"
                style="width:300px height:300px"
              />
            </div>
          </div>
          <div class="container col-md-6">
            <ul class="container mb-0">
              <li
                class="col-md-12 mb-0"
                v-for="ingredients in recipeShow.extendedIngredients"
              >
                <p>
                  {{ ingredients.name
                  }}<img :src="urlIngredientsImage + ingredients.image" />
                </p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div>
        {{ recipeShow.instructions }}
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      recipeShow: [],
      extendedIngredients: [],
      urlIngredientsImage: "https://spoonacular.com/cdn/ingredients_100x100/",
    };
  },

  created: function() {
    let id = parseInt(window.location.href.split("/").pop());

    if (Number.isInteger(id)) {
      fetch("/recipeData/" + id)
        .then((res) => res.json())
        .then((data) => {
          this.recipeShow = data;

          console.log(this.recipeShow);
        });
    }
  },
  
};
</script>

<style scoped>
img.imgRecette {
  width: 300px;
  height: 300px;
}
</style>
