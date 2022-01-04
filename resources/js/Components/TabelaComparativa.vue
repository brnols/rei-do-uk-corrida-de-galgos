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

    <template v-slot:body-cell-brt="props">
      <q-td :props="props">
        <div
          :class="{
            'bg-red-400': this.ordem.indexOf(props.row.brt.ordem) != -1,
            'bg-transparent': ordem.indexOf(props.row.brt.ordem) == -1,
            relative: true,
          }"
        >
          <span class="absolute bottom-0 left-6">
            {{ props.row.brt.valor }}
          </span>
          <img class="bg-orange" :src="`/images/${props.row.brt.ordem}.png`" />
        </div>
      </q-td>
    </template>
    <template v-slot:body-cell-split="props">
      <q-td :props="props">
        <div
          :class="{
            'bg-red-400': this.ordem.indexOf(props.row.split.ordem) != -1,
            'bg-transparent': ordem.indexOf(props.row.split.ordem) == -1,
            relative: true,
          }"
        >
          <span class="absolute bottom-0 left-6">
            {{ props.row.split.valor }}
          </span>
          <img
            class="bg-orange"
            :src="`/images/${props.row.split.ordem}.png`"
          />
        </div>
      </q-td>
    </template>
    <template v-slot:body-cell-bend="props">
      <q-td :props="props">
        <div
          :class="{
            'bg-red-400': this.ordem.indexOf(props.row.bend.ordem) != -1,
            'bg-transparent': ordem.indexOf(props.row.bend.ordem) == -1,
            relative: true,
          }"
        >
          <span class="absolute bottom-0 left-6">
            {{ props.row.bend.valor.toFixed(2) }}
          </span>
          <img class="bg-orange" :src="`/images/${props.row.bend.ordem}.png`" />
        </div>
      </q-td>
    </template>
    <template v-slot:body-cell-ut="props">
      <q-td :props="props">
        <div
          :class="{
            'bg-red-400': this.ordem.indexOf(props.row.ut.ordem) != -1,
            'bg-transparent': ordem.indexOf(props.row.ut.ordem) == -1,
            relative: true,
          }"
        >
          <span class="absolute bottom-0 left-6">
            {{ props.row.ut.valor }}
          </span>
          <img class="bg-orange" :src="`/images/${props.row.ut.ordem}.png`" />
        </div>
      </q-td>
    </template>
    <template v-slot:body-cell-pn="props">
      <q-td :props="props">
        <div
          :class="{
            'bg-red-400': this.ordem.indexOf(props.row.pn.ordem) != -1,
            'bg-transparent': ordem.indexOf(props.row.pn.ordem) == -1,
            relative: true,
          }"
        >
          <span class="absolute bottom-0 left-6">
            {{ props.row.pn.valor }}
          </span>
          <img class="bg-orange" :src="`/images/${props.row.pn.ordem}.png`" />
        </div>
      </q-td>
    </template>

    <template v-slot:body-cell-apn="props">
      <q-td :props="props">
        <div
          :class="{
            'bg-red-400': this.ordem.indexOf(props.row.apn.ordem) != -1,
            'bg-transparent': ordem.indexOf(props.row.apn.ordem) == -1,
            relative: true,
          }"
        >
          <span class="absolute bottom-0 left-6">
            {{ props.row.apn.valor }}
          </span>
          <img class="bg-orange" :src="`/images/${props.row.apn.ordem}.png`" />
        </div>
      </q-td>
    </template>

    <template v-slot:body-cell-media="props">
      <q-td :props="props">
        <div
          :class="{
            'bg-red-400': this.ordem.indexOf(props.row.media.ordem) != -1,
            'bg-transparent': ordem.indexOf(props.row.media.ordem) == -1,
            relative: true,
          }"
        >
          <span class="absolute bottom-0 left-6">
            {{ props.row.media.valor.toFixed(2) }}
          </span>
          <img
            class="bg-orange"
            :src="`/images/${props.row.media.ordem}.png`"
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
import _ from "lodash";

const columns = [
  {
    name: "brt",
    required: true,
    label: "BRT",
    align: "left",
    id: 0,
    field: (row) => row.name,
    format: (val) => `${val}`,
  },
  {
    name: "split",
    align: "left",
    label: "Split (380m)",
    field: "split",
    id: 1,
  },
  { name: "bend", label: "1º Bend", field: "bend", align: "left", id: 2 },
  { name: "ut", label: "UT (380m)", field: "ut", align: "left", id: 3 },
  { name: "pn", label: "PN (380m)", field: "pn", align: "left", id: 4 },
  { name: "apn", label: "APN (380m)", field: "apn", align: "left", id: 5 },
  {
    name: "media",
    label: "Média",
    field: "media",
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
    rows: [],
    indicadores: [],
    dialog: false,
    card: {},
    cards: [
      {
        title: "Melhor tempo do galgo nesta distância (BRT)",
        text: `Últimas 3 distancias percorridas pelo galgo. Importante observar para
          caso em que o galgo é lançado pela primeira vez em uma distancia para
          correr. Quando em vemelhor significa que é dif da distancia atual da
          corrida.`,
      },
      {
        title: "",
        text: ``,
      },
      {
        title: "Pos. Média 1ª Curva",
        text: `O bloco Pos. Média 1ª Curva qual a posição média do galgo na primeira curva da corrida. Isso ajuda o galgo a evitar trombadas além de ter uma vantágel considerável em relação aos demais.
        Quanto menor, melhor. Qual posição o galgo está na primeira curva(média).`,
      },
      {
        title: "Último tempo do galgo",
        text: `O bloco Último tempo tem relação com o último tempo do galgo. Tem uma importância muito grande na análise.`,
      },
      {
        title: "Penúltimo tempo do galgo",
        text: `O bloco Penúltimo tempo tem relação com o penúltimo tempo do galgo.`,
      },
      {
        title: "Ante-penúltimo",
        text: `O bloco Ante-penúltimo tem relação com o ante-penúltimo tempo do galgo.`,
      },
      {
        title: "Média",
        text: `O bloco Média tem relação com a média dos tempos do galgo, sendo média do BRT, ÚLTIMO TEMPO, PENÚLTIMO TEMPO E ANTE-PENÚLTIMO TEMPO.`,
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
    this.indicadores = this.$page.props.indicadores;
    let rows = [];
    let brt = _.orderBy(this.indicadores, [`metricas.brt`], ["asc"]).map(
      (e) => {
        return {
          ordem: e.ordem,
          valor: e.metricas.brt,
        };
      }
    );

    let split = _.orderBy(this.indicadores, [`metricas.split`], ["asc"]).map(
      (e) => {
        return {
          ordem: e.ordem,
          valor: e.metricas.split,
        };
      }
    );

    let bend = _.orderBy(
      this.indicadores,
      [`metricas.primeira_bend`],
      ["asc"]
    ).map((e) => {
      return {
        ordem: e.ordem,
        valor: e.metricas.primeira_bend,
      };
    });

    let ut = _.orderBy(this.indicadores, [`metricas.ut`], ["asc"]).map((e) => {
      return {
        ordem: e.ordem,
        valor: e.metricas.ut,
      };
    });

    let pn = _.orderBy(this.indicadores, [`metricas.pn`], ["asc"]).map((e) => {
      return {
        ordem: e.ordem,
        valor: e.metricas.pn,
      };
    });

    let apn = _.orderBy(this.indicadores, [`metricas.apn`], ["asc"]).map(
      (e) => {
        return {
          ordem: e.ordem,
          valor: e.metricas.apn,
        };
      }
    );

    let media = _.orderBy(this.indicadores, [`metricas.media`], ["asc"]).map(
      (e) => {
        return {
          ordem: e.ordem,
          valor: e.metricas.media,
        };
      }
    );

    for (let index = 0; index < this.indicadores.length; index++) {
      rows.push({
        brt: brt[index],
        split: split[index],
        bend: bend[index],
        ut: ut[index],
        pn: pn[index],
        apn: apn[index],
        media: media[index],
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
.card-dialog {
  max-width: 650px;
  width: 100%;
  border-radius: 30px !important;
  background: #eff3f8;
  padding: 20px;
}
</style>