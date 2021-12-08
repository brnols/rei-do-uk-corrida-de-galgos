<template>
    <q-layout view="hHh lpR fFf" class="pb-12 sm:pb-0">
        <the-header></the-header>

        <q-page-container class="md:container md:mx-auto px-4 pb-10 absolute-center">
            <slot/>
        </q-page-container>
    </q-layout>
</template>

<script>
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import TheHeader from "@/Components/TheHeader";


export default {
    components: {
        TheHeader,
        BreezeResponsiveNavLink,
    },

    data: () => ({
        logged: false,
    }),

    methods: {},
};
</script>
<style scoped>
.app {
    max-width: 1200px;
    margin: auto;
}
</style>
