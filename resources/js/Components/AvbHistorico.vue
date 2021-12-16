<template>
    <div class="flex flex-nowrap gap-2">
        <base-card v-for="galgo in galgos" :key="galgo.ordem" class="w-1/2">

            <!-- Card Header -->
            <div class="flex flex-nowrap justify-between items-center">
                <div class="flex flex-nowrap items-center gap-2">
                    <img :src="`/images/img-${galgo.ordem}.png`" class="object-contain">
                    <span class="text-lg whitespace-nowrap text-primary">
                        {{ galgo.nome }}
                    </span>
                    <img :src="`/images/${galgo.metricas.sexo}.png`" class="w-4 h-4">
                </div>
                <img :src="`/images/galgo-${galgo.ordem}.png`" class="object-contain">
            </div>

            <!-- Info -->
            <div class="text-primary font-bold my-2">
                <span>BRT: {{ galgo.metricas.brt }}</span> |
                <span>MÊS / ANO NASCIMENTO: {{ galgo.metricas.data_nascimento }}</span>
            </div>

            <!-- Table -->
            <div class="bg-white rounded-md p-1">
                <table>
                    <thead>
                        <tr>
                            <th class="text-primary text-xs p-2">
                                Trap
                            </th>
                            <th v-for="column in columns" :key="column.header" class="text-primary text-xs p-2">
                                {{ column.header}}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(historico, index) in galgo.historico" :key="index">
                            <td>
                                <img :src="`/images/${historico.trap}.png`" class="mx-auto">
                            </td>
                            <td v-for="column in columns" :key="columns.value" class="text-primary text-xs p-2 text-center">
                                {{ historico[column.value] }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </base-card>
    </div>
</template>

<script>
export default {
    name: "AvbHistorico",

    props: {
        galgos: Array
    },

    data() {
        return {
            columns: [
                {
                    header: "Grad",
                    value : 'grade'
                },
                {
                    header: "Data",
                    value : 'data'
                },
                {
                    header: "Dis",
                    value : 'distancia'
                },
                {
                    header: "Peso",
                    value : 'peso'
                },
                {
                    header: "Split",
                    value : 'split'
                },
                {
                    header: "Lar",
                    value : 'lar'
                },
                {
                    header: "Bends",
                    value : 'bends'
                },
                {
                    header: "Fin Rec",
                    value : 'fin_rec'
                },
                {
                    header: "Tempo",
                    value : 'tempo'
                },
            ]
        }
    },
}
</script>

<style scoped>

</style>
