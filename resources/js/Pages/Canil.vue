<template>
  <Head title="Canil" />

  <q-page class="container">
    <h1 class="text-primary text-[21px] leading-normal mt-6">Seu Canil</h1>
    <p class="text-primary text-[12px font-semibold">
      Esse é o seu canil, onde você encontrará seus galgos.
    </p>
    <div class="bg-light rounded-[20px] mt-12 mb-6 p-6">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div
          v-for="galgo in galgos"
          :key="galgo.nome"
          class="bg-white p-4 rounded-[5px]"
        >
          <h2 class="text-[16px] font-bold leading-normal">{{ galgo.nome }}</h2>
          <p class="text-dark">{{}}</p>

          <div class="">
            <span @click="remover()" class="cursor text-danger">Remover</span> |
            <span
              @click="ver_detalhes(galgo)"
              class="cursor text-primary-light"
            >
              Ver Detalhes</span
            >
          </div>
        </div>
      </div>
    </div>
  </q-page>

  <!-- popup -->
  <q-dialog
    v-model="dialog"
    persistent
    transition-show="scale"
    transition-hide="scale"
  >
    <q-card class="card-dialog">
      <q-card-section class="row items-center justify-between bg-white p">
        <q-img class="col-2" width="57px" src="/images/logo.png" alt="logo" />

        <h2 class="font-bold text-h6 text-primary">Informação do Galgo</h2>

        <q-btn icon="close" flat round dense v-close-popup />
      </q-card-section>

      <q-card-section class="px">
        <label class="small-2 text-primary"> Nome do Galgo </label>
        <q-input
          :autofocus="false"
          v-model="nome"
          readonly
          dense
          outlined
          disable
          bg-color="white"
        />
      </q-card-section>

      <q-card-section class="px pb">
        <label class="small-2 text-primary"> Informações </label>
        <q-input
          v-model="informacao"
          readonly
          outlined
          disable
          bg-color="white"
          type="textarea"
        />
      </q-card-section>
    </q-card>
  </q-dialog>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
export default {
  components: {
    Head,
  },

  data() {
    return {
      galgos: [
        {
          nome: "galgo 1",
          data: "06/08/2021 22:33:40",
          informacao: `Data: 05/08/2021 22:33:40
Comentário: Galgo A7, Trap 6
Larga muito mal, parece que está machucado`,
        },
        {
          nome: "galgo 2",
          data: "06/08/2021 22:33:40",
          informacao: `Data: 05/08/2021 22:33:40
Comentário: Galgo A7, Trap 6
Larga muito mal, parece que está machucado`,
        },
        {
          nome: "galgo 3",
          data: "06/08/2021 22:33:40",
          informacao: `Data: 05/08/2021 22:33:40
 Comentário: Galgo A7, Trap 6
Larga muito mal, parece que está machucado`,
        },
        {
          nome: "galgo 4",
          data: "06/08/2021 22:33:40",
          informacao: `Data: 05/08/2021 22:33:40
 Comentário: Galgo A7, Trap 6
Larga muito mal, parece que está machucado`,
        },
        {
          nome: "galgo 5",
          data: "06/08/2021 22:33:40",
          informacao: `Data: 05/08/2021 22:33:40
Comentário: Galgo A7, Trap 6
Larga muito mal, parece que está machucado`,
        },
        {
          nome: "galgo 6",
          data: "06/08/2021 22:33:40",
          informacao: `Data: 05/08/2021 22:33:40
Comentário: Galgo A7, Trap 6
Larga muito mal, parece que está machucado`,
        },
      ],
      dialog: false,
      nome: "",
      informacao: "",
    };
  },
  methods: {
    ver_detalhes(el) {
      this.dialog = true;
      this.nome = el.nome;
      this.informacao = el.informacao;
    },
  },
};
</script>

<style scoped>
.cursor {
  cursor: pointer;
}
.card-dialog {
  max-width: 650px;
  width: 100%;
  border-radius: 30px;
  background: #eff3f8;
}
.p {
  padding: 10px 20px;
}
.px {
  padding-left: 40px;
  padding-right: 40px;
}
.pb {
  padding-bottom: 40px;
}
</style>