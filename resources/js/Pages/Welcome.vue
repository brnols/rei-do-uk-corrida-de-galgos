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
      <h1
        class="
          text-center text-[38px]
          sm:text-[50px]
          text-primary
          lg:pb-16 lg:pt-24
          font-bold
          leading-[40px]
        "
      >
        Conheça nossos planos
      </h1>

      <h2
        class="
          mt-4
          sm:mt-8
          lg:mt-1
          leading-[28px]
          text-[24px]
          sm:text-[32px]
          text-secondary
          pb-8
          font-bold
          pl-8
        "
      >
        Site de analise
      </h2>
      <div class="flex gap-4 pr-8 pl-8">
        <div class="card">
          <p class="text-secondary font-bold">1º mês</p>
          <img class="mx-auto" src="/images/cartao.svg" alt="cartao" />
          <p>
            R$ <span class="text-[47px] text-primary font-bold">29,90</span>
          </p>
          <p class="text-primary">• Pagamento com cartão</p>
        </div>
        <div class="card">
          <p class="text-secondary font-bold">1º mês</p>
          <img class="mx-auto" src="/images/pix-boleto.svg" alt="pixboleto" />
          <p>
            R$ <span class="text-[47px] text-primary font-bold">39,90</span>
          </p>
          <p class="text-primary">• Pagamento com Pix / Boleto</p>
        </div>
        <div class="card">
          <p class="text-secondary font-bold">Trimestral</p>
          <img
            class="mx-auto"
            src="/images/pix-cartao-boleto.svg"
            alt="pixcartaoboleto"
          />
          <p>
            R$ <span class="text-[47px] text-primary font-bold">69,90</span>
          </p>
          <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>
        </div>
        <div class="card">
          <p class="text-secondary font-bold">Semestral</p>
          <img
            class="mx-auto"
            src="/images/boleto-pix-cartao.svg"
            alt="cartao"
          />
          <p>
            R$ <span class="text-[47px] text-primary font-bold">139,90</span>
          </p>
          <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>
        </div>
      </div>

      <h2
        class="
          leading-[28px]
          text-[24px]
          sm:text-[32px]
          text-secondary
          pt-16
          pb-8
          font-bold
          pl-8
        "
      >
        Site de análise + Grupo VIP
      </h2>

      <div class="flex gap-4 pr-8 pl-8">
        <div class="card">
          <p class="text-secondary font-bold">1º mês</p>
          <img class="mx-auto" src="/images/cartao.svg" alt="cartao" />
          <p>
            R$ <span class="text-[47px] text-primary font-bold">97,00</span>
          </p>
          <p class="text-primary">• Pagamento com cartão</p>
        </div>
        <div class="card">
          <p class="text-secondary font-bold">1º mês</p>
          <img class="mx-auto" src="/images/pix-boleto.svg" alt="pixboleto" />
          <p>
            R$ <span class="text-[47px] text-primary font-bold">109,90</span>
          </p>
          <p class="text-primary">• Pagamento com Pix / Boleto</p>
        </div>
        <div class="card">
          <p class="text-secondary font-bold">Trimestral</p>
          <img
            class="mx-auto"
            src="/images/pix-cartao-boleto.svg"
            alt="pixcartaoboleto"
          />
          <p>
            R$ <span class="text-[47px] text-primary font-bold">249,90</span>
          </p>
          <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>
        </div>
        <div class="card">
          <p class="text-secondary font-bold">Semestral</p>
          <img
            class="mx-auto"
            src="/images/boleto-pix-cartao.svg"
            alt="cartao"
          />
          <p>
            R$ <span class="text-[47px] text-primary font-bold">499,90</span>
          </p>
          <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>
        </div>
      </div>
    </section>
  </q-page>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Head,
    Link,
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
.card {
  border: 0.2px solid #484a4e44;
  box-sizing: border-box;
  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.26);
  border-radius: 30px;
  padding: 1rem;
  text-align: center;
  flex: 1;
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
