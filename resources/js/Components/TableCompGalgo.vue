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
          <img style="height: 50px; width: 50px" src="/images/img-1.png" />

          <div class="flex items-center space-x-2 ml-2">
            <h2 class="text-lg">Coastal Rose</h2>
            <div>
              <img src="/images/el_female.png" />
            </div>
          </div>
        </div>
        <p class="mt-2">BRT: 165.605 I MÊS/ANO NASCIMENTO: MAR19</p>
      </div>

      <q-space />
      <img style="max-width: 150px" src="/images/galgo-1.png" />
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
        <img :src="getTrap(props.value)" />
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

    <template v-slot:body-cell-remarks="props">
      <q-td style="background-color: white" class="space-x-1" :props="props">
        <span class="px-2 py-1 rounded-md bg-secondary-dark"> mid </span>
        <span class="px-2 py-1 rounded-md bg-danger text-white"
          >{{ props.value }}
        </span>
      </q-td>
    </template>
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
  {
    name: "remarks",
    label: "Remarks",
    field: "remarks",
    align: "center",
  },
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