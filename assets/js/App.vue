<template>

    <div class="container">

        <div class="col-md-12">
            <h2>liste des derniers produits ajoutés</h2>
            <div class="row">

                <ul>

                    <li v-for="product in products" :key="product.id" >{{ product[key] }}</li>

                </ul>

            </div>

        </div>

    </div>

</template>

<script>
export default {

  name: "App",

 data() {
    
    return{

        products : [key]




    //   products:[

    //         {
    //         "id": "2019",
    //         "products": 373003,
    //         "known": 0,
    //         "name": "2019",
    //         "url": "https://world.openfoodfacts.org/entry-date/2019"
    //     },
    //     {
    //         "url": "https://world.openfoodfacts.org/entry-date/2018",
    //         "id": "2018",
    //         "products": 326432,
    //         "known": 0,
    //         "name": "2018"
    //     },
    //     {
    //         "url": "https://world.openfoodfacts.org/entry-date/2017",
    //         "id": "2017",
    //         "products": 283995,
    //         "known": 0,
    //         "name": "2017"
    //     },
          
    //   ]

    }
  },

mounted:function(){
        this.list() 
  },
  methods:{
        list:function(){
            


        }
     },
};
</script>

<style>

</style>