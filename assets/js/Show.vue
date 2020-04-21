<template>
  <div class="container">
    <h1>voici la page Recipe show</h1>

    <div class="col-md-12">
      <div class="container">
        <div class="row">

          <h2></h2>

          <img />
          </div>
        </div>
    </div>
  </div>
</template>
<script>
export default {
  // data() {
  //   return {
  //     recipeShow: [],
  //   };
  // },
  created: function() {
    
    let id = parseInt(window.location.href.split("/").pop());
    
    if (Number.isInteger(id)) {
      fetch("/recipeData/" + id)
        .then((res) => res.json())
        .then((data) => {

         this.recipeShow = data;

        });
    }
  },
};
</script>
