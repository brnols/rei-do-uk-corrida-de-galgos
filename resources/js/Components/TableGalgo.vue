<template>
  <q-table
    class="px-4 py-8 shadow-xl tabela-3"
    color="primary"
    :rows="rows"
    :columns="columns"
    row-key="name"
    rows-per-page-options="6"
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
              <img src="/images/el_female.png" />
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
            style="max-width: 420px; width: 100%"
            class="container rounded-md mt-2 py-4 px-4 bg-white text-primary"
          >
            <div class="row justify-between">
              <div class="col-12 col-sm-6">
                <span class="font-bold">Brt:</span>
                <span>{{ galgo.metricas.brt }} </span>
              </div>
              <div class="col-12 col-sm-6">
                <span class="font-bold">Idade:</span>
                <span> {{ galgo.metricas.idade }}</span>
              </div>
              <div class="col-12 col-sm-6">
                <span class="font-bold">To Speed:</span>
                <span> </span>
              </div>
              <div class="col-12 col-sm-6">
                <span class="font-bold">Local treinamento:</span>
                <span> {{ galgo.metricas.idade }}</span>
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
              <div v-for="vitoria in vitorias" :key="vitoria" class="col-1">
                {{ vitoria }}%
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
        <img :src="getTrap(galgo.ordem)" />
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
import { ref } from "vue";
const columns = [
  {
    name: "trap",
    label: "Trap",
    align: "left",
    field: "trap",
  },

  {
    name: "grad",
    align: "center",
    label: "Grad",
    field: "grad",
    align: "left",
  },
  {
    name: "data",
    label: "Data",
    field: "data",
    align: "left",
  },
  { name: "dias", label: "Dias", field: "dias", align: "left" },
  { name: "peso", label: "Peso", field: "peso", align: "left" },
  { name: "split", label: "Split", field: "split", align: "center" },
  { name: "lar", label: "Lar", field: "lar" },
  {
    name: "bends",
    label: "Bends",
    field: "bends",
    align: "center",
  },
  {
    name: "fin",
    label: "Fin Rec",
    field: "fin",
  },
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
    name: "vel",
    label: "Vel",
    field: "vel",
    align: "center",
  },
];

export default {
  props: {
    galgo: Object,
  },

  data: () => ({
    rows: [
      {
        trap: 1,
        grad: 159,
        data: "data 1",
        dias: 55,
        peso: 4.0,
        split: " 1",
        lar: 5,
        bends: "10",
        fin: "10th",
        remarks: "Bmp2",
        tempo: 13.7,
        vel: 13.7,
      },
      {
        trap: 2,
        grad: 159,
        data: "data 2",
        dias: 120,
        peso: 4.0,
        split: " 2",
        lar: 5,
        bends: "10",
        fin: "10th",
        remarks: "Bmp2",
        tempo: 13.7,
        vel: 13.7,
      },
      {
        trap: 3,
        grad: 159,
        data: "data 3",
        dias: 55,
        peso: 4.0,
        split: " 3",
        lar: 5,
        bends: "5",
        fin: "10th",
        remarks: "Bmp2",
        tempo: 13.7,
        vel: 13.7,
      },
      {
        trap: 4,
        grad: 159,
        data: "data 4",
        dias: 120,
        peso: 4.0,
        split: " 4",
        lar: 5,
        bends: "20",
        fin: "10th",
        remarks: "Bmp2",
        tempo: 13.7,
        vel: 13.7,
      },
      {
        trap: 5,
        grad: 159,
        data: "data 5",
        dias: 120,
        peso: 4.0,
        split: "5",
        lar: 5,
        bends: "4",
        fin: "10th",
        remarks: "Bmp2",
        tempo: 13.7,
        vel: 13.7,
      },
      {
        trap: 6,
        grad: 159,
        data: "data 6",
        dias: 55,
        peso: 4.0,
        split: " 6",
        lar: 5,
        bends: "10",
        fin: "10th",
        remarks: "Bmp2",
        tempo: 13.7,
        vel: 13.7,
      },
    ],
    corridas: [36, 12, 5, 6, 14, 4, 55],
    vitorias: [3, 2, 5, 1, 4, 4, 21],
  }),

  methods: {
    getTrap(e) {
      switch (e) {
        case 1:
          return "/images/1.png";
        case 2:
          return "/images/2.png";
        case 3:
          return "/images/3.png";
        case 4:
          return "/images/4.png";
        case 5:
          return "/images/5.png";
        case 6:
          return "/images/6.png";
      }
    },
  },

  setup() {
    return {
      columns,
    };
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