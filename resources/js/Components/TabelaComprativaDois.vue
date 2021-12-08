<template>
  <q-table
    class="px-4 py-8 shadow-xl tabela-1"
    table-header-class="text-primary"
    :rows="rows"
    :columns="columns"
    row-key="name"
    hide-pagination
    rows-per-page-options="6"
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
            <q-icon size="xs" name="fas fa-question-circle" />
          </span>
        </q-th>
      </q-tr>
    </template>
    <template v-slot:body-cell-semcorrida="props">
      <q-td class="flex items-center" :props="props">
        <div>
          <img :src="`/images/${props.row.number}.png`" />
        </div>
        <span class="pl-2"> {{ props.value }} </span>
      </q-td>
    </template>
    <template v-slot:body-cell-tp="props">
      <q-td :props="props">
        <div class="flex space-x-2 space-y-2 sm:space-y-0">
          <div>
            <img class="bg-orange" :src="`/images/${props.row.number}.png`" />
          </div>
          <span> {{ props.value }} </span>
        </div>
      </q-td>
    </template>
    <template v-slot:body-cell-remarks="props">
      <q-td :props="props">
        <div class="relative">
          <span class="absolute bottom-0 left-6"> {{ props.value }} </span>
          <img class="bg-orange" :src="`/images/${2}.png`" />
        </div>
      </q-td>
    </template>
    <template v-slot:body-cell-velocidade="props">
      <q-td :props="props">
        <div class="relative">
          <span class="absolute bottom-0 left-6"> {{ props.value }} </span>
          <img class="bg-orange" :src="`/images/${6}.png`" />
        </div>
      </q-td>
    </template>
    <template v-slot:body-cell-peso="props">
      <q-td :props="props">
        <div class="relative">
          <span class="absolute bottom-0 left-6"> {{ props.value }} </span>
          <img class="bg-orange" :src="`/images/${6}.png`" />
        </div>
      </q-td>
    </template>

    <template v-slot:body-cell-categoria="props">
      <q-td :props="props">
        <div class="relative">
          <span class="absolute bottom-0 left-6"> {{ props.value }} </span>
          <img class="bg-orange" :src="`/images/${6}.png`" />
        </div>
      </q-td>
    </template>

    <template v-slot:body-cell-historico="props">
      <q-td :props="props">
        <div class="flex space-x-1">
          <img :src="`/images/${2}.png`" />
          <img :src="`/images/${3}.png`" />
          <img :src="`/images/${1}.png`" />
          <img :src="`/images/${5}.png`" />
          <img :src="`/images/${6}.png`" />
          <img :src="`/images/${4}.png`" />
        </div>
      </q-td>
    </template>
  </q-table>
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
  },
  {
    name: "tp",
    align: "left",
    label: "TP",
    field: "tp",
  },
  { name: "remarks", label: "Remarks", field: "remarks", align: "left" },
  {
    name: "velocidade",
    label: "Velocidade",
    field: "velocidade",
    align: "left",
  },
  { name: "peso", label: "Peso", field: "peso", align: "left" },
  {
    name: "categoria",
    label: "Categoria (últims 5)",
    field: "categoria",
    align: "left",
  },
  {
    name: "historico",
    label: "Histótivo Posição",
    field: "historico",
    align: "left",
  },
];

const rows = [
  {
    name: 23,
    tp: 159,
    remarks: 6.0,
    velocidade: 24,
    peso: 4.0,
    categoria: 87,
    historico: 35,
    number: 1,
  },
  {
    name: 23,
    tp: 159,
    remarks: 6.0,
    velocidade: 24,
    peso: 4.0,
    categoria: 87,
    historico: 35,
    number: 4,
  },
  {
    name: 23,
    tp: 159,
    remarks: 6.0,
    velocidade: 24,
    peso: 4.0,
    categoria: 87,
    historico: 35,
    number: 1,
  },
  {
    name: 23,
    tp: 159,
    remarks: 6.0,
    velocidade: 24,
    peso: 4.0,
    categoria: 87,
    historico: 35,
    number: 1,
  },
  {
    name: 23,
    tp: 159,
    remarks: 6.0,
    velocidade: 24,
    peso: 4.0,
    categoria: 87,
    historico: 35,
    number: 1,
  },
  {
    name: 23,
    tp: 159,
    remarks: 6.0,
    velocidade: 24,
    peso: 4.0,
    categoria: 87,
    historico: 35,
    number: 1,
  },
];

export default {
  setup() {
    return {
      columns,
      rows,
    };
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