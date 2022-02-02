<template>
    <base-card class="overflow-x-auto">
        <table class="w-full border-separate" style="border-spacing: 0 1rem">

            <thead>
            <tr class="text-primary">
                <th v-for="header in headers" class="text-xs px-2 whitespace-nowrap" :key="header">
                    {{ header }}
                    <span v-if="hasCard(header)">
                        <q-icon
                            class="cursor"
                            @click="open(header)"
                            size="xs"
                            name="fas fa-question-circle"
                        />
                    </span>
                </th>
            </tr>
            </thead>

            <tbody>

            <template v-if="galgos.length">

                <tr class="bg-white" v-for="galgo in galgos" :key="galgo.ordem">
                    <td class=" p-2 text-primary rounded-l-md">
                        <div class="inline-flex justify-center items-center gap-1 whitespace-nowrap">
                            <img :src="`/images/${galgo.ordem}.png`" alt="" class="mx-auto">
                            {{ galgo.nome }}
                            <img :src="`/images/${galgo.metricas.sexo}.png`" alt="" class="w-3 h-3">
                        </div>
                    </td>
                    <td v-for="field in fields"
                        v-bind:key="field"
                        class="p-2 text-center last:rounded-r-md"
                        :class="[corMetrica(comparativo[field], galgo)]"
                    >
                        {{ galgo.metricas[field] }}
                    </td>
                </tr>

                <!-- Row comparativa -->
                <tr class="bg-white rounded-3xl">
                    <td class="p-2 text-primary font-bold rounded-l-md">
                        Comparação
                    </td>
                    <td
                        v-for="(field, index) in fields"
                        :key="field"
                        class="p-2 text-center"
                        :class="{'rounded-r-md': index + 1 === fields.length }"
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

        <q-dialog
            v-if="card.title != ''"
            v-model="dialog"
            persistent
            transition-show="scale"
            transition-hide="scale"
        >
            <q-card class="card-dialog">
            <q-card-section class="row items-center q-py-none">
                <q-space />
                <q-btn icon="close" flat round dense v-close-popup />
            </q-card-section>
            <q-card-section class="q-py-none">
                <h2 class="font-bold text-h6 text-primary">{{ card.title }}</h2>
            </q-card-section>

            <q-card-section>
                <p class="text-primary">{{ card.text }}</p>
            </q-card-section>
            <q-card-section align="center">
                <img src="/images/img-card.png" alt="cavalos" />
            </q-card-section>
            </q-card>
        </q-dialog>

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
                "APN",
                "M",
                "Peso",
                "idade",
                "S.C.",
                "R",
                "RF",
                "Cat",
                "FM",
            ],

            fields: [
                "pick",
                "brt",
                "split",
                "ut",
                "pn",
                "apn",
                "media",
                "peso",
                "idade",
                "dias_sem_correr",
                "rec_cansa",
                "rec_final",
                "ultima_categoria",
                "fm",
            ],
            dialog: false,
            card: {},
            cards: [
                {
                    header: "",
                    title: "PICK",
                    text: ``,
                },{
                    header: "BRT",
                    title: "Melhor tempo do galgo nesta distância (BRT)",
                    text: `Últimas 3 distancias percorridas pelo galgo. Importante observar para
                    caso em que o galgo é lançado pela primeira vez em uma distancia para
                    correr. Quando em vemelhor significa que é dif da distancia atual da
                    corrida.`,
                },
                {
                    header: "Split",
                    title: "Split Final(Posições)",
                    text: `Split Final é a representação média da quantidade de posições média que ele recupera após última curva, ou seja, disputa final da corrida. Quando positivo ele recupera, quando negativo ele perde.`,
                },
                {
                    header: "UT",
                    title: "Último tempo do galgo",
                    text: `O bloco Último tempo tem relação com o último tempo do galgo. Tem uma importância muito grande na análise.`,
                },
                {
                    header: "PN",
                    title: "Penúltimo tempo do galgo",
                    text: `O bloco Penúltimo tempo tem relação com o penúltimo tempo do galgo.`,
                },
                {
                    header: "APN",
                    title: "Ante-penúltimo",
                    text: `O bloco Ante-penúltimo tem relação com o ante-penúltimo tempo do galgo.`,
                },
                {
                    header: "M",
                    title: "Média",
                    text: `O bloco Média tem relação com a média dos tempos do galgo, sendo média do BRT, ÚLTIMO TEMPO, PENÚLTIMO TEMPO E ANTE-PENÚLTIMO TEMPO.`,
                },
                {
                    header: "Peso",
                    title: "Peso",
                    text: `Peso do galgo. Isso influencia nas trombadas e no arranque(Split).`,
                },
                {
                    header: "idade",
                    title: "Idade",
                    text: `Idade em anos`,
                },
                {
                    header: "S.C.",
                    title: "Dias sem correr",
                    text: `Dias sem correr é a quantidade de dias que o galgo está sem correr oficialmente, isso não significa que ele não pode ter treinado durante estes dias.`,
                },
                {
                    header: "R",
                    title: "Rec/Perde Posições",
                    text: `Rec/Perde Posições é a quantidade de posições que o galgo recupera ou perde durante a corrida. Quando positivo ele recupera, quando negativo ele perde.`,
                },
                {
                    header: "",
                    title: "Rec/Perde Final",
                    text: ``,
                },
                {
                    header: "Cat",
                    title: "Última Categoria",
                    text: `Categoria na última corrida`,
                },
                {
                    header: "FM",
                    title: "Final Média",
                    text: `Final Média é a média da posição de chegada no final das últimas 10 corridas.`,
                },
            ],
        }
    },

    methods: {
        hasCard(header){
            return this.cards.filter((item)=> item.header == header ).length
        },
        open(header) {
            this.card = this.cards.filter((item)=> item.header == header )[0];
            this.dialog = true;
        },
    
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
<style >
    .card-dialog {
        max-width: 650px;
        width: 100%;
        border-radius: 30px !important;
        background: #eff3f8;
        padding: 20px;
    }
</style>