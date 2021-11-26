<template>
  <q-table
    style="background: #eff3f8"
    hide-pagination
    :rows="rows"
    :columns="columns"
    row-key="name"
  >
    <template v-slot:header="props">
      <q-tr :props="props">
        <q-th v-for="col in props.cols" :key="col.name" :props="props" class="">
          <h1 class="text-xl font-bold text-primary">{{ col.label }}</h1>
        </q-th>
      </q-tr>
    </template>
    <template v-slot:body="props">
      <q-tr :props="props">
        <q-td key="name" :props="props">
          <div class="container bg-white rounded-sm py-2 px-8">
            <div class="row items-center space-y-2 md:space-y-0">
              <div class="col-12 col-sm-3">
                <span> {{ props.row.name }}</span>
              </div>
              <div class="col-3 col-sm-2">
                <img src="/images/flag-br.png" alt="" />
                <span> {{ props.row.hbr }}</span>
              </div>
              <div class="col-3 col-sm-2">
                <img src="/images/flag-uk.png" alt="" />
                <span> {{ props.row.huk }}</span>
              </div>
              <div class="col-6 col-sm-3">
                <span>(D3 - 265 M) Race 1</span>
              </div>
              <div class="col-12 col-sm-2">
                <span
                  :class="
                    props.row.status != 'Assinante' ? 'bg-green' : 'bg-red'
                  "
                  class="
                    rounded-full
                    py-1
                    px-8
                    font-bold
                    text-white
                    mt-2
                    sm:mt-0
                  "
                  >{{ props.row.status }}</span
                >
              </div>
            </div>
          </div>
        </q-td>
      </q-tr>
    </template>
  </q-table>
</template>
<script>
const columns = [
  {
    name: "name",
    required: true,
    label: "Central Park",
    align: "left",
    field: (row) => row.name,
    format: (val) => `${val}`,
    sortable: false,
  },
];

const rows = [
  {
    name: "Race 1dad ddad",
    hbr: "06:46",
    huk: "11:00",
    status: "Assinante",
  },
  {
    name: "Race 2",
    hbr: "06:46",
    huk: "11:00",
    status: "Liberada",
  },
  {
    name: "Race 2",
    hbr: "06:46",
    huk: "11:00",
    status: "Liberada",
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
/* @media screen and (max-width: 320px) {
  .container {
    max-width: 300px;
  }
} */
/* @media (min-width: 321px), (max-width: 430px) {
  .w-container {
    max-width: 320px !important;
  }
} */
/* @media (min-width: 430px), (max-width: 769px) {
  .w-container {
    max-width: 520px !important;
  }
} */
</style>