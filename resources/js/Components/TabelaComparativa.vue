<template>
  <q-table
    class="px-4 py-8 shadow-xl tabela"
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
    <template v-slot:body-cell-btr="props">
      <q-td :props="props">
        <div class="relative">
          <span class="absolute bottom-0 left-6"> {{ props.value }} </span>
          <img class="bg-orange" :src="`/images/${props.row.number}.png`" />
        </div>
      </q-td>
    </template>
    <template v-slot:body-cell-split="props">
      <q-td :props="props">
        <div class="relative">
          <span class="absolute bottom-0 left-6"> {{ props.value }} </span>
          <img class="bg-orange" :src="`/images/${props.row.number}.png`" />
        </div>
      </q-td>
    </template>
    <template v-slot:body-cell-bend="props">
      <q-td :props="props">
        <div class="relative">
          <span class="absolute bottom-0 left-6"> {{ props.value }} </span>
          <img class="bg-orange" :src="`/images/${2}.png`" />
        </div>
      </q-td>
    </template>
    <template v-slot:body-cell-ut="props">
      <q-td :props="props">
        <div class="relative">
          <span class="absolute bottom-0 left-6"> {{ props.value }} </span>
          <img class="bg-orange" :src="`/images/${6}.png`" />
        </div>
      </q-td>
    </template>
    <template v-slot:body-cell-pn="props">
      <q-td :props="props">
        <div class="relative">
          <span class="absolute bottom-0 left-6"> {{ props.value }} </span>
          <img class="bg-orange" :src="`/images/${6}.png`" />
        </div>
      </q-td>
    </template>

    <template v-slot:body-cell-apn="props">
      <q-td :props="props">
        <div class="relative">
          <span class="absolute bottom-0 left-6"> {{ props.value }} </span>
          <img class="bg-orange" :src="`/images/${6}.png`" />
        </div>
      </q-td>
    </template>

    <template v-slot:body-cell-media="props">
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
    name: "btr",
    required: true,
    label: "BTR",
    align: "left",
    field: (row) => row.name,
    format: (val) => `${val}`,
  },
  {
    name: "split",
    align: "left",
    label: "Split (380m)",
    field: "split",
  },
  { name: "bend", label: "1º Bend", field: "bend", align: "left" },
  { name: "ut", label: "UT (380m)", field: "ut", align: "left" },
  { name: "pn", label: "PN (380m)", field: "pn", align: "left" },
  { name: "apn", label: "APN (380m)", field: "apn", align: "left" },
  {
    name: "media",
    label: "Média",
    field: "media",
    align: "left",
  },
];

const rows = [
  {
    name: 23,
    split: 159,
    bend: 6.0,
    ut: 24,
    pn: 4.0,
    apn: 87,
    media: 35,
    number: 1,
  },
  {
    name: 23,
    split: 159,
    bend: 6.0,
    ut: 24,
    pn: 4.0,
    apn: 87,
    media: 35,
    number: 1,
  },
  {
    name: 23,
    split: 159,
    bend: 6.0,
    ut: 24,
    pn: 4.0,
    apn: 87,
    media: 35,
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
.tabela {
  background: #eff3f8;
  border-radius: 20px;
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
    0 10px 10px -5px rgba(0, 0, 0, 0.04);
}
</style>