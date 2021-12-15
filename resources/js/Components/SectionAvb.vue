<template>
    <section class="my-4">

        <h2 class="small font-bold text-primary">
            Math AvB
        </h2>

        <avb-options v-model="avb"/>

        <avb-comparativo
            class="mt-4"
            :galgos="selectedAvb"
            :avb="avb"
        ></avb-comparativo>

    </section>
</template>

<script>
import AvbOptions from "@/Components/AvbOptions";
import AvbComparativo from "@/Components/AvbComparativo";

export default {
    name: "SectionAvb",

    components: {
        AvbOptions,
        AvbComparativo
    },

    props: {
        indicadores: Array
    },

    data() {
        return {
            avb: []
        }
    },

    computed: {
        selectedAvb() {
            return this.indicadores.filter(item => {
                return this.avb.includes(item.ordem)
            })
        },
    },
}
</script>

<style scoped>

</style>
