<template>
    <q-layout view="hHh lpR fFf">
        <the-header/>
        <q-page-container>
            <slot/>
        </q-page-container>
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
