<template>

    <div v-for="shop in shops" :key="shop.siren"> 

        <h1>{{ shop.enseigne1Etablissement }}</h1>

    </div>


</template>

<script>

export default {
    name: "ShopItem",
    props: ["shops"], // Propriétés


    data() {
        return {
            shops: [],
            shop:{
                siren: '',
                enseigne1Etablissement: '',
                numeroVoieEtablissement: '',
                typeVoieEtablissement: '',
                libelleVoieEtablissement: '',


            }, 
            // shop_id: '',
            // pagination: {},  
        }
    },

}

</script>

<style scoped>



</style>