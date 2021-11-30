<template>
  <q-table
    class="px-4 py-8 shadow-xl tabela"
    color="primary"
    :rows="rows"
    :columns="columns"
    row-key="name"
    rows-per-page-options="6"
    hide-pagination
  >
    <template v-slot:top>
      <h2 class="text-xs font-bold text-primary">Participantes</h2>
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

    <template v-slot:body-cell-canil="props">
      <q-td style="background-color: white" :props="props">
        <q-btn size="sm" color="primary" round dense icon="add" />
      </q-td>
    </template>
    <template v-slot:body-cell-sexo="props">
      <q-td :props="props">
        <img v-if="props.value == 'm'" src="/images/el_male.png" />
        <img v-else src="/images/el_female.png" />
      </q-td>
    </template>

    <template v-slot:body-cell-galgo="props">
      <q-td class="flex justify-center bg-light" :props="props">
        <q-icon name="far fa-eye" />
      </q-td>
    </template>

    <template v-slot:body-cell-icon="props">
      <q-td :props="props">
        <img :src="`/images/galgo${props.row.trap}.png`" />
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
    name: "canil",
    align: "center",
    label: "Canil",
    field: "canil",
    align: "left",
  },
  {
    name: "nome",
    label: "Nome",
    field: "nome",
    align: "left",
  },
  { name: "sexo", label: "Sexo", field: "sexo", align: "left" },
  { name: "idade", label: "Idade", field: "idade", align: "left" },
  { name: "linhagem", label: "Linhagem", field: "linhagem", align: "center" },
  { name: "treinador", label: "Treinador", field: "treinador" },
  {
    name: "races",
    label: "Races",
    field: "races",
  },
  {
    name: "galgo",
    label: "Vizualisar Galgo",
    field: "galgo",
  },
  {
    name: "icon",
  },
];

export default {
  data: () => ({
    rows: [
      {
        trap: 1,
        canil: 159,
        nome: "nome 1",
        sexo: "f",
        idade: 4.0,
        linhagem: "linhagem 1",
        treinador: "treinador",
        races: "10",
      },
      {
        trap: 2,
        canil: 159,
        nome: "nome 2",
        sexo: "m",
        idade: 4.0,
        linhagem: "linhagem 2",
        treinador: "treinador",
        races: "10",
      },
      {
        trap: 3,
        canil: 159,
        nome: "nome 3",
        sexo: "f",
        idade: 4.0,
        linhagem: "linhagem 3",
        treinador: "treinador",
        races: "5",
      },
      {
        trap: 4,
        canil: 159,
        nome: "nome 4",
        sexo: "m",
        idade: 4.0,
        linhagem: "linhagem 4",
        treinador: "treinador",
        races: "20",
      },
      {
        trap: 5,
        canil: 159,
        nome: "nome 5",
        sexo: "m",
        idade: 4.0,
        linhagem: "linhagem 5",
        treinador: "treinador",
        races: "4",
      },
      {
        trap: 6,
        canil: 159,
        nome: "nome 6",
        sexo: "f",
        idade: 4.0,
        linhagem: "linhagem 6",
        treinador: "treinador",
        races: "10",
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
.tabela {
  background: #eff3f8;
  border-radius: 20px;
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
    0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.tabela td {
  background: white !important;
  border-bottom-width: 8px !important;
  border-color: #eff3f8;
}

.q-table tr {
  border-color: #eff3f8;
}
</style>