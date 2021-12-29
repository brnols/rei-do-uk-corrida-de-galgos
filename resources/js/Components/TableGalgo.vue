<template>
  <q-table
    class="px-4 py-8 shadow-xl tabela-3 justify-end"
    color="primary"
    :rows="rows"
    :columns="columns"
    row-key="name"
    :rows-per-page-options="[9]"
    hide-pagination
  >
    <template v-slot:top>
      <div class="text-primary">
        <div class="flex">
          <img
            style="height: 50px; width: 50px"
            :src="`/images/img-${galgo.ordem}.png`"
          />

          <div class="flex items-center space-x-2 ml-2">
            <h2 class="text-lg">{{ galgo.nome }}</h2>
            <div>
              <img
                v-if="galgo.metricas.sexo == 'Macho'"
                src="/images/el_male.png"
              />
              <img v-else src="/images/el_female.png" />
            </div>
          </div>
        </div>
      </div>

      <q-space />
      <div class="flex flex-col sm:px-4">
        <div class="flex justify-end">
          <img
            style="max-width: 150px"
            :src="`/images/galgo-${galgo.ordem}.png`"
          />
        </div>
        <div class="flex md:space-x-2 flex-nowrap items-end">
          <div
            style="max-width: 380px; width: 100%"
            class="container rounded-md mt-2 py-4 px-4 bg-white text-primary"
          >
            <div class="row justify-between">
              <div class="col-12 col-sm-6">
                <span class="font-bold">Brt: </span>
                <span>{{ galgo.metricas.brt }} </span>
              </div>
              <div class="col-12 col-sm-6">
                <span class="font-bold">Idade: </span>
                <span> {{ galgo.metricas.idade }}</span>
              </div>
              <div class="col-12 col-sm-6">
                <span class="font-bold">Top Speed: </span>
                <span> </span>
              </div>
              <div class="col-12 col-sm-6">
                <span class="font-bold">Local treinamento: </span>
                <span> {{ galgo.metricas.local_treinamento }}</span>
              </div>
            </div>
          </div>
          <div
            style="max-width: 380px"
            class="container rounded-md mt-2 py-4 px-4 bg-white text-primary"
          >
            <div class="row sm:justify-end space-x-2">
              <div class="col-2"></div>
              <div class="col-1">
                <img src="/images/1.png" alt="" />
              </div>
              <div class="col-1">
                <img src="/images/2.png" alt="" />
              </div>
              <div class="col-1">
                <img src="/images/3.png" alt="" />
              </div>
              <div class="col-1">
                <img src="/images/4.png" alt="" />
              </div>
              <div class="col-1">
                <img src="/images/5.png" alt="" />
              </div>
              <div class="col-1">
                <img src="/images/6.png" alt="" />
              </div>
              <div class="col-1 font-bold">Total</div>
              <div class="col-2 font-bold">corridas:</div>
              <div v-for="corrida in corridas" :key="corrida" class="col-1">
                {{ corrida }}
              </div>

              <div class="col-2 font-bold">vitorias:</div>
              <div v-for="vitoria in vitorias" :key="vitoria" class="col-1">
                {{ vitoria }}
              </div>
              <div class="col-2 font-bold">%:</div>
              <div v-for="vitoria in porcentagem" :key="vitoria" class="col-1">
                {{ vitoria > 0 ? vitoria.toFixed(1) : vitoria }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>

    <template v-slot:header="props">
      <q-tr :props="props">
        <q-th
          v-for="col in props.cols"
          :key="col.name"
          :props="props"
          class="text-primary font-bold"
        >
          {{ col.label }}
        </q-th>
      </q-tr>
    </template>

    <template v-slot:body-cell-trap="props">
      <q-td :props="props">
        <img :src="`/images/${props.value}.png`" />
      </q-td>
    </template>

    <template v-slot:body-cell-data="props">
      <q-td style="background-color: white" :props="props">
        {{ dataFormatada }}
      </q-td>
    </template>

    <template v-slot:body-cell-lar="props">
      <q-td style="background-color: white" :props="props">
        <span class="px-2 py-1 rounded-md bg-danger text-white"
          >{{ props.value }}
        </span>
      </q-td>
    </template>

    <template v-slot:body-cell-fin="props">
      <q-td style="background-color: white" class="space-x-1" :props="props">
        <span class="px-2 py-1 rounded-md bg-danger text-white"
          >{{ props.value }}
        </span>
      </q-td>
    </template>

    <!-- <template v-slot:body-cell-remarks="props">
      <q-td style="background-color: white" class="space-x-1" :props="props">
        <span class="px-2 py-1 rounded-md bg-secondary-dark"> mid </span>
        <span class="px-2 py-1 rounded-md bg-danger text-white"
          >{{ props.value }}
        </span>
      </q-td>
    </template> -->
  </q-table>
</template>

<script>
import moment from "moment";
import { ref } from "vue";
const columns = [
  {
    name: "trap",
    label: "T",
    align: "left",
    field: "trap",
  },

  {
    name: "grad",
    align: "left",
    label: "C",
    field: "grade",
  },
  {
    name: "data",
    label: "Data",
    field: "data",
    align: "left",
  },
  { name: "cp", label: "CP", field: "cp", align: "left" },
  { name: "pista", label: "Pista", field: "pista", align: "left" },
  { name: "dis", label: "Dis", field: "distancia", align: "left" },
  { name: "peso", label: "Peso", field: "peso", align: "left" },
  { name: "split", label: "Split", field: "split", align: "center" },
  // { name: "lar", label: "Lar", field: "lar" },
  {
    name: "bends",
    label: "Bends",
    field: "bends",
    align: "center",
  },
  // {
  //   name: "fin",
  //   label: "Fin Rec",
  //   field: "fin",
  // },
  // {
  //   name: "remarks",
  //   label: "Remarks",
  //   field: "remarks",
  //   align: "center",
  // },
  {
    name: "tempo",
    label: "Tempo",
    field: "tempo",
    align: "center",
  },
  {
    name: "tempo_real",
    label: "Tempo Real",
    field: "tempo_real",
    align: "center",
  },
];

export default {
  props: {
    galgo: Object,
  },

  data: () => ({
    rows: [],
    corridas: [],
    vitorias: [],
    porcentagem: [],
  }),

  setup() {
    return {
      columns,
    };
  },

  computed: {
    dataFormatada() {
      return moment(this.galgo.historico.data).format("DD/MM");
    },
  },

  methods: {
    get_dados_corrida() {
      var qtd = 0;
      let vitoria = 0;
      let porcentagem = 0;

      for (let index = 1; index < 7; index++) {
        qtd = this.galgo.historico.reduce((total, valor) => {
          if (valor.trap == index) {
            return total + 1;
          }
          return total;
        }, 0);

        vitoria = this.galgo.historico.reduce((total, valor) => {
          if (valor.vitoria == true && valor.trap == index) {
            return total + 1;
          }
          return total;
        }, 0);

        if (qtd == 0) {
          porcentagem = 0;
        } else {
          porcentagem = (vitoria / qtd) * 100;
        }
        this.porcentagem.push(porcentagem);
        this.corridas.push(qtd);
        this.vitorias.push(vitoria);
      }

      let total_vitorias = this.vitorias.reduce(
        (total, valor) => total + valor,
        0
      );

      let total_corridas = this.corridas.reduce(
        (total, valor) => total + valor,
        0
      );

      let total_porcentagem = this.porcentagem.reduce(
        (total, valor) => total + valor,
        0
      );

      this.corridas.push(total_corridas);
      this.vitorias.push(total_vitorias);
      this.porcentagem.push(total_porcentagem);
    },
  },
  mounted() {
    this.rows = this.galgo.historico;
    this.get_dados_corrida();
  },
};
</script>
<style >
.tabela-3 {
  background: #eff3f8;
  border-radius: 20px;
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
    0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.tabela-3 td {
  background: white !important;
  /* border-bottom-width: 8px !important;
  border-color: #eff3f8; */
}

.q-table tr {
  border-color: #eff3f8;
}
</style>