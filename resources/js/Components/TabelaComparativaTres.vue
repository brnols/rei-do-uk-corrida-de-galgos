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
    <template v-slot:body-cell-distancia="props">
      <q-td class="flex" :props="props">
        <div class="flex space-x-2 space-y-1 text-white">
          <div><img class="bg-orange" :src="`/images/${1}.png`" /></div>
          <div class="space-x-2 ">
            <span class="bg-success px-2 rounded-md">256</span>
            <span class="bg-success px-2 rounded-md">256</span>
            <span class="bg-success px-2 rounded-md">256</span>
          </div>
        </div>
      </q-td>
    </template>
    <template v-slot:body-cell-comportamento="props">
      <q-td :props="props">
        <div class="relative">
          <div class="absolute bottom-0 left-6">
            {{ props.value }}, {{ props.value }}, {{ props.value }},
            {{ props.value }}
          </div>
          <img class="bg-orange" :src="`/images/${3}.png`" />
        </div>
      </q-td>
    </template>
    <template v-slot:body-cell-split="props">
      <q-td :props="props">
        <div class="relative">
          <span class="absolute bottom-0 left-6"> {{ props.value }} </span>
          <img class="bg-orange" :src="`/images/${2}.png`" />
        </div>
      </q-td>
    </template>
    <template v-slot:body-cell-rec="props">
      <q-td :props="props">
        <div class="relative">
          <span class="absolute bottom-0 left-6"> {{ props.value }} </span>
          <img class="bg-orange" :src="`/images/${6}.png`" />
        </div>
      </q-td>
    </template>
  </q-table>
</template>

<script>
const columns = [
  {
    name: "distancia",
    required: true,
    label: "Distância",
    align: "left",
    field: (row) => row.name,
    format: (val) => `${val}`,
  },
  {
    name: "comportamento",
    align: "left",
    label: "Comprtamento(Bends)",
    field: "comportamento",
  },
  { name: "split", label: "Split Final", field: "split", align: "left" },
  {
    name: "rec",
    label: "Rec/Cansa",
    field: "rec",
    align: "left",
  },
];

const rows = [
  {
    name: 23,
    tp: 159,
    comportamento: 6.0,
    split: 24,
    rec: 4.0,
  },
  {
    name: 23,
    tp: 159,
    comportamento: 6.0,
    rec: 24,
    split: 24,

    number: 4,
  },
  {
    name: 23,
    tp: 159,
    comportamento: 6.0,
    rec: 24,
    split: 24,
  },
  {
    name: 23,
    tp: 159,
    comportamento: 144,
    rec: 24,
    split: 24,
  },
  {
    name: 23,
    tp: 159,
    comportamento: 6.0,
    rec: 24,
    split: 24,
  },
  {
    name: 23,
    tp: 159,
    comportamento: 6.0,
    rec: 24,
    split: 24,
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