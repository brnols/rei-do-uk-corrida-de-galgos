<template>
  <q-table
    class="px-4 py-8 mt-6 shadow-xl tabela-1"
    table-header-class="text-primary"
    :rows="rows"
    :columns="columns"
    row-key="name"
    hide-pagination
    :rows-per-page-options="[6]"
    v-bind="$attrs"
  >
    <template v-slot:header="props">
      <q-tr :props="props">
        <q-th
          v-for="col in props.cols"
          :key="col.name"
          :props="props"
          class="text-primary font-bold"
        >
          {{ col.label }}
          <span>
            <q-icon
              class="cursor"
              @click="open(col.id)"
              size="xs"
              name="fas fa-question-circle"
            />
          </span>
        </q-th>
      </q-tr>
    </template>
    <template v-slot:body-cell-distancia="props">
      <q-td class="flex" :props="props">
        <div
          :class="{
            'bg-red-400':
              this.ordem.indexOf(props.row.historico_distancia.ordem) != -1,
            'bg-transparent':
              ordem.indexOf(props.row.historico_distancia.ordem) == -1,
            relative: true,
          }"
          class="flex items-center space-x-2 space-y-1 text-white"
        >
          <div>
            <img
              class="bg-orange"
              :src="`/images/${props.row.historico_distancia.ordem}.png`"
            />
          </div>
          <div class="space-x-2">
            <template
              v-for="(dist, index) in props.row.historico_distancia.valor"
              :key="index"
            >
              <span class="bg-success px-2 rounded-md">{{
                dist
              }}</span></template
            >
          </div>
        </div>
      </q-td>
    </template>
    <template v-slot:body-cell-comportamento="props">
      <q-td :props="props">
        <div
          :class="{
            'bg-red-400':
              this.ordem.indexOf(props.row.historico_bends.ordem) != -1,
            'bg-transparent':
              ordem.indexOf(props.row.historico_bends.ordem) == -1,
            relative: true,
          }"
          class="relative"
        >
          <div class="absolute bottom-0 left-6">
            {{ props.row.historico_bends.valor }}
          </div>
          <img
            class="bg-orange"
            :src="`/images/${props.row.historico_bends.ordem}.png`"
          />
        </div>
      </q-td>
    </template>
    <template v-slot:body-cell-split="props">
      <q-td :props="props">
        <div
          :class="{
            'bg-red-400': this.ordem.indexOf(props.row.rec_final.ordem) != -1,
            'bg-transparent': ordem.indexOf(props.row.rec_final.ordem) == -1,
            relative: true,
          }"
          class="relative"
        >
          <span class="absolute bottom-0 left-6">
            {{ props.row.rec_final.valor }}
          </span>
          <img
            class="bg-orange"
            :src="`/images/${props.row.rec_final.ordem}.png`"
          />
        </div>
      </q-td>
    </template>
    <template v-slot:body-cell-rec="props">
      <q-td :props="props">
        <div
          :class="{
            'bg-red-400': this.ordem.indexOf(props.row.rec_cansa.ordem) != -1,
            'bg-transparent': ordem.indexOf(props.row.rec_cansa.ordem) == -1,
            relative: true,
          }"
          class="relative"
        >
          <span class="absolute bottom-0 left-6">
            {{ props.row.rec_cansa.valor }}
          </span>
          <img
            class="bg-orange"
            :src="`/images/${props.row.rec_cansa.ordem}.png`"
          />
        </div>
      </q-td>
    </template>
  </q-table>

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
</template>

<script>
const columns = [
  {
    name: "distancia",
    required: true,
    label: "Distância",
    align: "left",
    id: 0,
    field: (row) => row.name,
    format: (val) => `${val}`,
  },
  {
    name: "comportamento",
    align: "left",
    label: "Comportamento(Bends)",
    field: "comportamento",
    id: 1,
  },
  { name: "split", label: "Split Final", field: "split", align: "left", id: 2 },
  {
    name: "rec",
    label: "Rec/Cansa",
    field: "rec",
    align: "left",
    id: 3,
  },
];

export default {
  emits: ["enviar"],

  props: {
    disabled: {
      type: Boolean,
      default: false,
    },
    ordem: {
      type: Array,
      default: [],
    },
    items: {
      type: Array,
      default: [],
    },
  },

  data: () => ({
    dialog: false,
    rows: [],
    card: {},
    cards: [
      {
        title: "Última distancias corridas",
        text: `Últimas 3 distancias percorridas pelo galgo. Importante observar para
          caso em que o galgo é lançado pela primeira vez em uma distancia para
          correr. Quando em vemelhor significa que é dif da distancia atual da
          corrida.`,
      },
      {
        title: "Comportamento Traps",
        text: `Neste bloco, você pode observar o provável comportamento do galgo nas bends e no final, na atual corrida.`,
      },
      {
        title: "Split Final(Posições)",
        text: `Split Final é a representação média da quantidade de posições média que ele recupera após última curva, ou seja, disputa final da corrida. Quando positivo ele recupera, quando negativo ele perde.`,
      },
      {
        title: "Rec/Perde Posições",
        text: `Rec/Perde Posições é a quantidade de posições que o galgo recupera ou perde durante a corrida. Quando positivo ele recupera, quando negativo ele perde.`,
      },
    ],
  }),

  setup() {
    return {
      columns,
    };
  },

  methods: {
    open(i) {
      this.card = this.cards[i];
      this.dialog = true;
    },
  },

  mounted() {
    this.indicadores = this.$page.props.indicadores.map((e) => {
      let el = e.metricas.historico_distancia.split("-").map((e) => {
        return e;
      });
      e.metricas.historico_distancia = el;
      return e;
    });

    let rows = [];

    let historico_distancia = _.orderBy(
      this.indicadores,
      [`metricas.historico_distancia`],
      ["asc"]
    ).map((e) => {
      return {
        ordem: e.ordem,
        valor: e.metricas.historico_distancia,
      };
    });

    let historico_bends = _.orderBy(
      this.indicadores,
      [`metricas.historico_bends`],
      ["asc"]
    ).map((e) => {
      return {
        ordem: e.ordem,
        valor: e.metricas.historico_bends,
      };
    });

    let rec_final = _.orderBy(
      this.indicadores,
      [`metricas.rec_final`],
      ["asc"]
    ).map((e) => {
      return {
        ordem: e.ordem,
        valor: e.metricas.rec_final,
      };
    });

    let rec_cansa = _.orderBy(
      this.indicadores,
      [`metricas.rec_cansa`],
      ["asc"]
    ).map((e) => {
      return {
        ordem: e.ordem,
        valor: e.metricas.rec_cansa,
      };
    });

    for (let index = 0; index < this.indicadores.length; index++) {
      rows.push({
        historico_distancia: historico_distancia[index],
        historico_bends: historico_bends[index],
        rec_final: rec_final[index],
        rec_cansa: rec_cansa[index],
      });
    }

    this.rows = rows;
  },
};
</script>
<style>
.tabela-1 {
  background: #eff3f8;
  border-radius: 20px;
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
    0 10px 10px -5px rgba(0, 0, 0, 0.04);
}
.tabela-1 td {
  background: white !important;
  border-right-width: 8px !important;
  border-left-width: 8px !important;
  border-color: #eff3f8;
}
</style>