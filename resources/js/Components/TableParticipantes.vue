<template>
  <q-table
    class="px-4 py-8 shadow-xl tabela"
    color="primary"
    :rows="rows"
    :columns="columns"
    row-key="name"
    :rows-per-page-options="[6]"
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
        <img :src="getTrap(props.row.ordem)" />
      </q-td>
    </template>

    <template v-slot:body-cell-canil="props">
      <q-td style="background-color: white" :props="props">
        <q-btn
            v-if="false"
          @click="dialog = true"
          size="sm"
          color="primary"
          round
          dense
          icon="add"
        />
      </q-td>
    </template>

    <template v-slot:body-cell-sexo="props">
      <q-td :props="props">
        <img
          v-if="props.row.metricas.sexo == 'Macho'"
          src="/images/el_male.png"
        />
        <img v-else src="/images/el_female.png" />
      </q-td>
    </template>

    <template v-slot:body-cell-idade="props">
      <q-td :props="props">
        {{ props.row.metricas.idade }}
      </q-td>
    </template>

    <template v-slot:body-cell-linhagem="props">
      <q-td :props="props">
        {{ props.row.metricas.pedigree }}
      </q-td>
    </template>

    <template v-slot:body-cell-treinador="props">
      <q-td :props="props">
        {{ props.row.metricas.treinador }}
      </q-td>
    </template>

    <template v-slot:body-cell-races="props">
      <q-td :props="props">
        {{ props.row.metricas.qtde_corridas }}
      </q-td>
    </template>

    <template v-slot:body-cell-galgo="props">
      <q-td class="flex justify-center bg-light" :props="props">
        <q-icon
          :class="{ 'text-red-500':destaques.indexOf(props.row.ordem) != -1,  'text-dark': destaques.indexOf(props.row.ordem) == -1 }"
          class="cursor"
          @click="ativar(props.row.ordem)"
          name="far fa-eye"
        />
        <q-icon
         :class="{ 'text-red-500':destaques.indexOf(props.row.ordem) == -1,  'text-dark': destaques.indexOf(props.row.ordem) != -1 }"
          class="cursor ml-2"
          @click="desativar(props.row.ordem)" 
          name="far fa-eye-slash"
        />
      </q-td>
    </template>

    <template v-slot:body-cell-icon="props">
      <q-td :props="props">
        <img :src="`/images/galgo${props.row.ordem}.png`" />
      </q-td>
    </template>
  </q-table>

  <q-dialog
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
      <q-card-section>
        <h2 class="font-bold text-h6 text-primary">Adicionar ao Canil</h2>
        <p class="text-dark">Adicionar galgo ao seu canil</p>
      </q-card-section>

      <q-card-section>
        <label class="text-primary" for="nome">Nome do Galgo</label>
        <q-input
          v-model="form.nome"
          id="nome"
          class="bg-light"
          dense
          filled
          label="Escreva o nome do Galgo"
        >
        </q-input>
      </q-card-section>
      <q-card-section>
        <label class="text-primary" for="comentario"
          >Comentário sobre o Galgo</label
        >
        <q-input
          v-model="form.comentario"
          id="comentario"
          class="bg-light"
          dense
          filled
          label="Escreva o comentário sobre o Galgo"
        >
        </q-input>
      </q-card-section>

      <q-card-actions align="center" class="flex-column">
        <q-btn
          class="bg-primary text-white font-bold btn"
          label="Guardar"
          v-close-popup
        />
        <a class="text-primary" href="http://" target="_blank">
          Ir para seu canil</a
        >
      </q-card-actions>
    </q-card>
  </q-dialog>
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
  emits: ["enviar"],
  data: () => ({
    rows: [],
    dialog: false,
    form: {
      nome: "",
      comentario: "",
    },
    items: [],
    destaques: [],
    icone_show: null,
    currentItem: null,
    disabled: false,
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
    ativar(i) {
     
      if (this.destaques.indexOf(i) == -1) {
        
        this.destaques.push(i);
        this.$emit("enviar", {
          disabled: true,
          ordem: this.destaques,
          items: this.items,
        });

      } 
      
    },
    desativar(i){

      if (this.destaques.indexOf(i) > -1) {
                
        this.destaques = this.destaques.filter((ordem) => { return ordem != i }); // remover
        
        this.$emit("enviar", {
          disabled: false,
          ordem: this.destaques,
          items: this.items,
        });

      }

    }
    // ocultar(i) {
    //   let index = this.items.indexOf(i);
    //   this.currentItem = i;
    //   if (this.items.indexOf(i) == -1) {
    //     this.items.push(i);
    //     this.icone_show = null;
    //   } else {
    //     this.items.splice(index, 1);
    //     this.currentItem = null;
    //   }

    //   this.$emit("enviar", { disabled: false, index: i, items: this.items });
    // },
  },

  setup() {
    return {
      columns,
    };
  },
  mounted() {
    this.rows = this.$page.props.indicadores;
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
.card-dialog {
  max-width: 650px;
  width: 100%;
  border-radius: 30px;
  background: #eff3f8;
  padding: 20px;
}
.mt {
  padding-top: 20px;
}
.btn {
  padding: 10px 20px !important;
  border-radius: 30px;
  margin-bottom: 10px;
}
.flex-column {
  flex-direction: column;
}
.bg {
  background: #eff3f8;
}
</style>
