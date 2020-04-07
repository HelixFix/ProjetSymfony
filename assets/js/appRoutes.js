import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

let router = new VueRouter({
  mode: "https://world.openfoodfacts.org/ https://world.openfoodfacts.org/api/v0/product/",
  routes: [
    {
      path: "/categories/show",
    //   component: require("./Product.vue").default,
      name: "product",
    },
  ],
});

export default router