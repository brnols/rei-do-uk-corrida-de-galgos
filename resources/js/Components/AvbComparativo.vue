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

                <tr class="bg-white" v-for="galgo in galgos" :key="galgo.ordem">
                    <td class=" p-2 text-primary rounded-l-md">
                        <div class="inline-flex items-center gap-1 whitespace-nowrap">
                            {{ galgo.nome }}
                            <img :src="`/images/${galgo.metricas.sexo}.png`" alt="" class="w-3 h-3">
                        </div>
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
                    <td
                        v-for="(field, index) in fields"
                        :key="field"
                        class="p-2 text-center"
                        :class="{'rounded-r-md': index === fields.length}"
                    >
                        <img :src="`/images/${comparativo[field]}.png`" alt="" class="mx-auto" v-if="!!comparativo[field]">
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
        galgos     : Array,
        comparativo: Object
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

    methods: {
        corMetrica(metrica, galgo) {

            if (!metrica) {
                return 'text-yellow-600';
            }

            if (metrica !== galgo.ordem) {
                return 'text-red-600'
            }

            return 'text-green-600'
        }
    },
};
</script>
