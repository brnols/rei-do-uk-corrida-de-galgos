<template>
    <section class="my-4">

        <h2 class="small font-bold text-primary">
            Math AvB
        </h2>

        <avb-options v-model="avb"/>

        <avb-comparativo
            class="mt-4"
            :galgos="selectedGalgos"
            :comparativo="comparativo"
        ></avb-comparativo>

        <avb-historico
            class="mt-4"
            :galgos="selectedGalgos"
        ></avb-historico>

    </section>
</template>

<script>
import AvbOptions from "@/Components/AvbOptions";
import AvbComparativo from "@/Components/AvbComparativo";
import AvbHistorico from "@/Components/AvbHistorico";

export default {
    name: "SectionAvb",

    components: {
        AvbOptions,
        AvbComparativo,
        AvbHistorico
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
        selectedGalgos() {
            return this.indicadores.filter(item => {
                return this.avb.includes(item.ordem)
            })
        },

        comparativo() {
            if(!this.selectedGalgos.length) {
                return {}
            }
            const nao_comparar = ["pick", "ultima_categoria"]
            const galgo1 = this.selectedGalgos[0];
            const galgo2 = this.selectedGalgos[1];

            let resultado = {};

            for (let metrica in galgo1.metricas) {

                if (nao_comparar.indexOf(metrica) != -1 || galgo1.metricas[metrica] === galgo2.metricas[metrica]) {
                    resultado[metrica] = null
                } else if (metrica == "rec_cansa" ){

                    if( galgo1.metricas[metrica] > galgo2.metricas[metrica]) {
                        resultado[metrica] = galgo1.ordem
                    } else {
                        resultado[metrica] = galgo2.ordem
                    }

                } else{
                        
                    if( galgo1.metricas[metrica] < galgo2.metricas[metrica]) {
                        resultado[metrica] = galgo1.ordem
                    } else {
                        resultado[metrica] = galgo2.ordem
                    }
                }
            }

            return resultado;
        },

    },
}
</script>

<style scoped>

</style>
