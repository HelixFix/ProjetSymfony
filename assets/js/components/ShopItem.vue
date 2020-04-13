<template>

    <div>

        <div v-bind:key="shop.siren" v-for="shop in shops"> <!-- Boucle table ID Todo -->
            <!-- <h3> {{ todo.title }} </h3> Affiche le titre de chaques éléments -->

        </div>

                <h3>{{ shop.enseigne1Etablissement }}</h3>
                <!-- <p>{{ shop.body }}</p> -->

    </div>

</template>

<script>

export default {

    name: "Shops",
    components: {
        
    },

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
        shop_id: '',
        pagination: {},  
    }
},


    

}

</script>

<style scoped>



</style>