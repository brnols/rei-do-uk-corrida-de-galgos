<template>
  <Head title="Welcome" />

  <q-page class="container pb-[70px]">
    <div class="relative">
      <div>
        <img src="/images/Cachorros1.svg" alt="cachorros" c />
      </div>

      <div class="absolute bottom">
        <div class="flex justify-center">
          <button
            class="
              px-[40px]
              sm:px-[60px]
              py-[12px]
              rounded-[20px]
              bg-secondary
              text-light
              uppercase;
              relative
            "
          >
            <img
              style="width: 40px"
              src="/images/icons/bandeiracurvada1.svg"
              alt="bandeiracurvada"
              class="absolute mt-[-25px] ml-[-40px]"
            />

            Acessar corridas de galgos
          </button>
        </div>
      </div>
    </div>

    <h1
      class="
        flex
        justify-center
        text-[30px]
        sm:text-[50px]
        text-primary
        leading-[3rem]
        font-bold
      "
    >
      Nossos Pilares
    </h1>
    <h2
      class="
        flex
        justify-center
        text-[16px]
        sm:text-[28px]
        text-primary
        leading-[3rem]
      "
    >
      Entre para a realeza!
    </h2>
    <p class="flex text-center justify-center text-[16px] text-primary">
      Melhor site de corridas inglesas do Brasil, teste gratuitamente e comece a
      lucrar hoje mesmo, tenha acesso a tudo que você precisa para dominar esse
      mercado de galgos.
    </p>

    <section class="container p-4">
      <div class="grid sm:pt-16 grid-colunas sm:pl-16 text-center sm:text-left">
        <span class="numeros">1</span>
        <div>
          <h2 class="text-[24px] sm:text-[32px] text-secondary font-bold">
            Acessível
          </h2>
          <p class="pt-6 text-[16px] sm:text-[21px] text-dark">
            Tenha acesso as corridas atualizadas diariamente com todas as
            informações que você precisa para analisar.
          </p>
        </div>
      </div>
      <div class="grid sm:pt-16 grid-colunas sm:pl-16 text-center sm:text-left">
        <span class="numeros">2</span>
        <div>
          <h2 class="text-[24px] sm:text-[32px] text-secondary font-bold">
            Exclusividade
          </h2>
          <p class="pt-6 text-[16px] sm:text-[21px] text-dark">
            Obtenha um filtro único que vai te ajudar a trabalhar com top 3,
            back e placed.
          </p>
        </div>
      </div>
      <div class="grid sm:pt-16 grid-colunas sm:pl-16 text-center sm:text-left">
        <span class="numeros">3</span>
        <div>
          <h2 class="text-[24px] sm:text-[32px] text-secondary font-bold">
            Aprendizado
          </h2>
          <p class="pt-6 text-[16px] sm:text-[21px] text-dark">
            Você vai receber acesso a um curso completo de como analisar as
            corridas para AvB, possibilitando a você viver do mercado.
          </p>
        </div>
      </div>
    </section>
    <section class="container">
      <planos-valores title="Conheça nossos planos"></planos-valores>
    </section>
  </q-page>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import PlanosValores from "../Components/PlanosValores.vue";

export default {
  components: {
    Head,
    Link,
    PlanosValores,
  },
};
</script>
<style scoped>
.bottom {
  left: 0;
  right: 0;
  bottom: 30%;
  margin: auto;
}
.numeros {
  font-size: 13rem;
  -webkit-text-stroke-width: 1px;
  -webkit-text-stroke-color: #484a4e;
  color: #fff;
  font-weight: 700;
  opacity: 0.4;
  line-height: 0.75;
}

@media screen and (max-width: 425px) {
  .bottom {
    bottom: 10%;
  }
}
@media screen and (min-width: 426px) {
  .grid-colunas {
    grid-template-columns: 10rem auto;
  }
}
</style>
