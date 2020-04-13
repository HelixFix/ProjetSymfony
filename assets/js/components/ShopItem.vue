<template>

    <div>

        <div v-bind:key="shop.id" v-for="shop in shops"> <!-- Boucle table ID Todo -->
            <!-- <h3> {{ todo.title }} </h3> Affiche le titre de chaques éléments -->
            <ShopItem v-bind:shop="shop"/> <!-- Afficher TodoItem -->

        </div>

    </div>

</template>

<script>

export default {

    name: "Shops",
    components: {
        ShopItem // Utiliser ShopItem
    },
    props: ["shops"] // Propriétés de shops

    

}

</script>

<style scoped>



</style>