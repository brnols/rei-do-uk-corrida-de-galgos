<template>
    <base-card class="overflow-x-auto">
        <table class="w-full border-separate" style="border-spacing: 0 1rem">

            <thead>
            <tr class="text-primary">
                <th v-for="header in headers" class="text-xs px-2 whitespace-nowrap">
                    {{ header }}
                </th>
            </tr>
            </thead>

            <tbody>

            <template v-if="galgos.length">

                <tr class="bg-white rounded-3xl" v-for="galgo in galgos" :key="galgo.ordem">
                    <td class="p-2 text-primary text-center rounded-l-md">
                        {{ galgo.nome }}
                    </td>
                    <td v-for="field in fields"
                        class="p-2 text-center"
                        :class="[corMetrica(comparativo[field], galgo)]"
                    >
                        {{ galgo.metricas[field] }}
                    </td>
                </tr>

                <!-- Row comparativa -->
                <tr class="bg-white rounded-3xl">
                    <td class="p-2 text-primary font-bold text-center rounded-l-md">
                        Comparação
                    </td>
                    <td class="p-2 text-center" v-for="field in fields" :key="field">
                        <img :src="`/images/${comparativo[field]}.png`" alt="" class="mx-auto">
                    </td>
                </tr>

            </template>

            <!-- AVB não selecionado -->
            <tr v-show="!galgos.length">
                <td colspan="999" class="text-center font-bold p-4">
                    Selecione uma opção acima
                </td>
            </tr>

            </tbody>
        </table>
    </base-card>
</template>

<script>


export default {
    name: "AvbComparativo",

    props: {
        galgos: Array,
    },

    data: function () {
        return {
            headers: [
                "Trap / Galgo /Sexo",
                "Pick",
                "BRT",
                "Split",
                "UT",
                "PN",
                "AN",
                "M",
                "Peso",
                "idade",
                "S.C.",
                "A",
                "R",
                "SF",
                "Cat",
                "VM",
                "FM",
                "O.TP",
                "Over",
            ],

            fields: [
                "pick",
                "brt",
                "split",
                "ut",
                "pn",
                "an",
                "m",
                "peso",
                "idade",
                "sc",
                "a",
                "r",
                "sf",
                "cat",
                "vm",
                "fm",
                "otp",
                "over"
            ]
        }
    },

    computed: {
        comparativo() {
            const galgo1 = this.galgos[0];
            const galgo2 = this.galgos[1];

            let resultado = {};

            for (let metrica in galgo1.metricas) {
                if(galgo1.metricas[metrica] === galgo2.metricas[metrica]) {
                    resultado[metrica] = null
                }
                else if (galgo1.metricas[metrica] > galgo2.metricas[metrica]) {
                    resultado[metrica] = galgo1.ordem
                }
                else {
                    resultado[metrica] = galgo2.ordem
                }
            }

            return resultado;
        }
    },

    methods: {
        corMetrica(metrica, galgo) {

            if(!metrica) {
                return 'text-yellow-600';
            }

            if(metrica !== galgo.ordem) {
                return 'text-red-600'
            }

            return 'text-green-600'
        }
    },
};
</script>
