<template>
    <div>
        <h2>Welcome vue</h2>
        <button @click="counter++"> Click me {{ counter }}</button>
    </div>
</template>

<script>
export default {
    data: () => ({
        counter: 0
})
}
</script>

<style>

</style>