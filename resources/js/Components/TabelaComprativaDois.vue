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
    <template v-slot:body-cell-semcorrida="props">
      <q-td :props="props">
        <div
          :class="{
            'bg-red-400': this.ordem.indexOf(props.row.dias_sem_correr.ordem) != -1,
            'bg-transparent': ordem.indexOf(props.row.dias_sem_correr.ordem) == -1,
            relative: true,
          }"
          class="flex space-x-2 space-y-2 sm:space-y-0"
        >
          <div>
            <img :src="`/images/${props.row.dias_sem_correr.ordem}.png`" />
          </div>
          <span>
            {{ props.row.dias_sem_correr.valor }}
          </span>

        </div>
      </q-td>
    </template>
    <template v-slot:body-cell-tp="props">
      <q-td :props="props">
        <div
          :class="{
            'bg-red-400': this.ordem.indexOf(props.row.tp.ordem) != -1,
            'bg-transparent': ordem.indexOf(props.row.tp.ordem) == -1,
            relative: true,
          }"
          class="flex space-x-2 space-y-2 sm:space-y-0"
        >
          <div>
            <img class="bg-orange" :src="`/images/${props.row.tp.ordem}.png`" />
          </div>
          <span> {{ props.row.tp.valor }} </span>
        </div>
      </q-td>
    </template>
    <!-- <template v-slot:body-cell-remarks="props">
      <q-td
        v-show="items.indexOf(props.row.ordem) == -1 ? true : false"
        :props="props"
      >
        <div
          :class="[
            ordem.indexOf(props.row.ordem) != -1
              ? 'bg-red-400'
              : 'bg-transparent',
          ]"
          class="relative"
        >
          <span class="absolute bottom-0 left-6"> {{ props.value }} </span>
          <img class="bg-orange" :src="`/images/${props.row.ordem}.png`" />
        </div>
      </q-td>
    </template> -->
    <!-- <template v-slot:body-cell-velocidade="props">
      <q-td
        v-show="items.indexOf(props.row.ordem) == -1 ? true : false"
        :props="props"
      >
        <div
          :class="[
            ordem.indexOf(props.row.ordem) != -1
              ? 'bg-red-400'
              : 'bg-transparent',
          ]"
          class="relative"
        >
          <span class="absolute bottom-0 left-6"> {{ props.value }} </span>
          <img class="bg-orange" :src="`/images/${props.row.ordem}.png`" />
        </div>
      </q-td>
    </template> -->
    <template v-slot:body-cell-peso="props">
      <q-td :props="props">
        <div
          :class="{
            'bg-red-400': this.ordem.indexOf(props.row.peso.ordem) != -1,
            'bg-transparent': ordem.indexOf(props.row.peso.ordem) == -1,
            relative: true,
          }"
          class="relative"
        >
          <span class="absolute bottom-0 left-6">
            {{ props.row.peso.valor }}
          </span>
          <img class="bg-orange" :src="`/images/${props.row.peso.ordem}.png`" />
        </div>
      </q-td>
    </template>

    <template v-slot:body-cell-categoria="props">
      <q-td :props="props">
        <div
          :class="{
            'bg-red-400': this.ordem.indexOf(props.row.categorias.ordem) != -1,
            'bg-transparent': ordem.indexOf(props.row.categorias.ordem) == -1,
            relative: true,
          }"
          class="relative"
        >
          <span class="absolute bottom-0 left-6">
            {{ props.row.categorias.valor }}
          </span>
          <img
            class="bg-orange"
            :src="`/images/${props.row.categorias.ordem}.png`"
          />
        </div>
      </q-td>
    </template>

    <template v-slot:body-cell-historico="props">
      <q-td :props="props">
        <div
          :class="{
            'bg-red-400':
              this.ordem.indexOf(props.row.historico_posicao.ordem) != -1,
            'bg-transparent':
              ordem.indexOf(props.row.historico_posicao.ordem) == -1,
            relative: true,
          }"
          class="flex space-x-1"
        >
          <img
            :src="`/images/${props.row.historico_posicao.ordem}.png`"
            alt="posicao"
          />
          <span> - </span>
          <img
            v-for="(posicao, index) in props.row.historico_posicao.valor"
            :key="index"
            :src="`/images/${posicao != '' ? posicao : 0}.png`"
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
    name: "semcorrida",
    required: true,
    label: "Dias sem correr",
    align: "left",
    field: (row) => row.name,
    format: (val) => `${val}`,
    id: 0,
  },
  {
    name: "tp",
    align: "left",
    label: "TP",
    field: "tp",
    id: 1,
  },
  // { name: "remarks", label: "Remarks", field: "remarks", align: "left", id: 2 },
  // {
  //   name: "velocidade",
  //   label: "Velocidade",
  //   field: "velocidade",
  //   align: "left",
  //   id: 3,
  // },
  { name: "peso", label: "Peso", field: "peso", align: "left", id: 4 },
  {
    name: "categoria",
    label: "Categoria (últims 5)",
    field: "categoria",
    align: "left",
    id: 5,
  },
  {
    name: "historico",
    label: "Histótivo Posição",
    field: "historico",
    align: "left",
    id: 6,
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
        title: "Dias sem correr",
        text: `Dias sem correr é a quantidade de dias que o galgo está sem correr oficialmente, isso não significa que ele não pode ter treinado durante estes dias.`,
      },
      {
        title: "TP",
        text: `TP é o tempo provável do galgo, considerando tempo da última corrida na distancia calculado na nova distância.`,
      },
      {
        title: "",
        text: ``,
      },
      {
        title: "",
        text: ``,
      },
      {
        title: "Peso",
        text: `Peso do galgo. Isso influencia nas trombadas e no arranque(Split).`,
      },
      {
        title: "Categorias(Últimas 5)",
        text: `Rec/Perde Posições é a quantidade de posições que o galgo recupera ou perde durante a corrida. Quando positivo ele recupera, quando negativo ele perde.`,
      },
      {
        title: "Histórico Posição",
        text: `Histórico de posições é a posição final das últimas 5 corridas.`,
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
      let el = e.metricas.historico_posicao.split("-").map((e) => {
        return e.substr(0, 1);
      });
      e.metricas.historico_posicao = el;
      return e;
    });

    let rows = [];

    let dias_sem_correr = _.orderBy(
      this.indicadores,
      [`metricas.dias_sem_correr`],
      ["asc"]
    ).map((e) => {
      return {
        ordem: e.ordem,
        valor: e.metricas.dias_sem_correr,
      };
    });

    let tp = _.orderBy(this.indicadores, [`metricas.tp`], ["asc"]).map((e) => {
      return {
        ordem: e.ordem,
        valor: e.metricas.tp,
      };
    });

    let peso = _.orderBy(this.indicadores, [`metricas.peso`], ["asc"]).map(
      (e) => {
        return {
          ordem: e.ordem,
          valor: e.metricas.peso,
        };
      }
    );

    let categorias = this.indicadores.map((e) => {
      return {
        ordem: e.ordem,
        valor: e.metricas.categorias,
      };
    });

    let historico_posicao = this.indicadores.map((e) => {
      return {
        ordem: e.ordem,
        valor: e.metricas.historico_posicao,
      };
    });

    for (let index = 0; index < this.indicadores.length; index++) {
      rows.push({
        dias_sem_correr: dias_sem_correr[index],
        tp: tp[index],
        peso: peso[index],
        categorias: categorias[index],
        historico_posicao: historico_posicao[index],
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
.cursor:hover {
  cursor: pointer;
}
</style>

