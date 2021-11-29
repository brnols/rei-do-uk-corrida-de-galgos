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
      <q-td :props="props">
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
      <q-td class="flex justify-center" :props="props">
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
    name: "nome",
    label: "Trap / Galgo /Sexo" ,
    align: "left",
    field: "nome",
  },

  {
    name: "sexo",
    align: "center",
    label: "Pick",
    field: "sexo",
    align: "left",
  },
  {
    name: "linhagem",
    label: "BRT",
    field: "linhagem",
    align: "left",
  },
  { name: "name", label: "Split", field: "", align: "center" },
  { name: "linhagem", label: "UT", field: "linhagem", align: "center" },
  { name: "linhagem", label: "PN", field: "linhagem", align: "center" },
  { name: "linhagem", label: "AN", field: "linhagem", align: "center" },
  { name: "linhagem", label: "M", field: "linhagem", align: "center" },
  { name: "linhagem", label: "Peso", field: "linhagem", align: "center" },
  { name: "linhagem", label: "idade", field: "linhagem", align: "center" },
  { name: "linhagem", label: "S.C.", field: "linhagem", align: "center" },
  { name: "linhagem", label: "A", field: "linhagem", align: "center" },
  { name: "linhagem", label: "R", field: "linhagem", align: "center" },
  { name: "linhagem", label: "SF", field: "linhagem", align: "center" },
  { name: "linhagem", label: "Cat", field: "linhagem", align: "center" },
   { name: "linhagem", label: "VM", field: "linhagem", align: "center" },
    { name: "linhagem", label: "FM", field: "linhagem", align: "center" },
  
  {
    name: "races",
    label: "O.TP",
    field: "races",
  },
  {
    name: "races",
    label: "Over",
    field: "races",
  },
  
];

export default {
  data: () => ({
    rows: [
      {
        trap: 1,
        canil: 159,
        nome: "Coastal Rose",
        sexo: "f",
        idade: 0,
        linhagem: "19.70s",
        treinador: "treinador",
        races: "10",
      },
      {
        trap: 2,
        canil: 159,
        nome: "Hollyoak Vanessa",
        sexo: "f",
        idade: 0,
        linhagem: "19.60s",
        treinador: "treinador",
        races: "10",
      },
      {
        trap: 3,
        canil: 159,
        nome: "2",
        sexo: "f",
        idade: 2,
        linhagem: "2",
        treinador: "treinador",
        races: "2",
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
<style>
.tabela {
  background: #eff3f8;
  border-radius: 20px;
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
    0 10px 10px -5px rgba(0, 0, 0, 0.04);
}
</style>