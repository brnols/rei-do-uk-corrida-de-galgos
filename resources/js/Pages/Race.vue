<template>
  <Head title="Race" />

  <div class="container">
    <div class="row justify-between">
      <!-- search -->
      <div class="col-12 col-sm-3 space-y-4 flex flex-col justify-end">
        <q-select
          class="bg-light"
          dense
          filled
          label="Próximas Corridas"
          v-model="model"
          :options="options"
        >
        </q-select>
        <q-select
          class="bg-light"
          dense
          label="Próximas Corridas Nessa Pista"
          filled
          v-model="model2"
          :options="options"
        >
        </q-select>
      </div>
      <!-- card -->
      <div class="col-12 col-sm-8 pt-4 sm:pt-0">
        <Link href="">
          <div
            class="
              shadow-2xl
              py-8
              px-4
              bg-secondary
              sm:justify-center
              md:justify-around
              text-white
              flex
              rounded-md
            "
          >
            <div>
              Faça seu cruso de
              <h2 class="text-5xl font-bold">Galgo Vencedor</h2>
            </div>

            <div class="flex items-center px-4 sm:ml-20 lg:ml-0">
              click aqui
            </div>

            <q-img style="width: 151px" src="/images/icone-race.png" />
          </div>
        </Link>
      </div>
    </div>

    <div class="row py-6">
      <div
        class="
          col-12
          p-6
          rounded-3xl
          shadow-xl
          bg-light
          text-primary text-bold
          flex
          space-x-8
        "
      >
        <div>
          Racing Post
          <span class="flex">
            <img src="/images/1.png" />
            <img src="/images/5.png" />
            <img src="/images/6.png" />
          </span>
        </div>
        <div>
          Resultado
          <span class="flex">
            <img src="/images/1.png" />
            <img src="/images/5.png" />
            <img src="/images/6.png" />
            <img src="/images/2.png" />
            <img src="/images/4.png" />
            <img src="/images/3.png" />
          </span>
        </div>
      </div>
    </div>

    <table-participantes></table-participantes>

    <tabela-comparativa class="mt-6"></tabela-comparativa>
    <tabela-comparativa-dois class="mt-6"></tabela-comparativa-dois>

    <tabela-comparativa-tres class="mt-6"> </tabela-comparativa-tres>

    <!-- <table-math-avb></table-math-avb>
    <table-comparacao></table-comparacao> -->
    <div class="grid grid-cols-1 sm:grid-cols-2 space-x-4">
      <table-comp-galgo class="mt-6"></table-comp-galgo>
      <table-comp-galgo class="mt-6"></table-comp-galgo>
    </div>
    <table-galgo class="mt-6"></table-galgo>
  </div>
</template>

<script>
import Guest from "@/Layouts/Guest.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
import TableParticipantes from "@/Components/TableParticipantes.vue";
import TabelaComparativa from "@/Components/TabelaComparativa.vue";
import TabelaComparativaDois from "@/Components/TabelaComprativaDois.vue";
import TabelaComparativaTres from "@/Components/TabelaComparativaTres.vue";
import TableMathAvb from "@/Components/TableMathAvb.vue";
import TableComparacao from "@/Components/TableComparacao.vue";
import TableCompGalgo from "@/Components/TableCompGalgo.vue";
import TableGalgo from "@/Components/TableGalgo.vue";

export default {
  layout: Guest,

  components: {
    Head,
    Link,
    TableParticipantes,
    TabelaComparativa,
    TabelaComparativaDois,
    TabelaComparativaTres,
    TableMathAvb,
    TableComparacao,
    TableCompGalgo,
    TableGalgo,
  },

  setup() {
    return {
      model: ref(null),
      model2: ref(null),
      options: [
        "Towcester (BR: 15:24 I UK: 19:24)",
        "Yarmouth (BR: 15:26 I UK: 19:26)",
        "Youghal (BR:15:28 i 19:28)",
        "Nothingham (BR: 19:24 I UK: 19:24)",
        "Doncaster (BR: 19:24 I UK: 19:24)",
      ],
    };
  },
};
</script>

<style>
</style>