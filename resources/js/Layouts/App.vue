<template>
    <q-layout view="hhh lpR fFf">
        <the-header/>
        <slot/>
    </q-layout>
</template>

<script>
import TheHeader from "@/Components/TheHeader";

export default {
    name: "App",

    components: {
        TheHeader
    }
}
</script>

<style scoped>

</style>
