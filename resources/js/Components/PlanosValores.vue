<template>
  <section class="container pb-[70px]">
    <h1
      class="
        text-center text-[38px]
        sm:text-[50px]
        text-primary
        lg:pb-12 lg:pt-24
        font-bold
        leading-[40px]
      "
    >
      {{ title }}
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
<!--      <div @click="open('https://www.google.com.br/')" class="card">-->
<!--        <p class="text-secondary font-bold">1º mês</p>-->
<!--        <img class="mx-auto" src="/images/cartao.svg" alt="cartao" />-->
<!--        <p>R$ <span class="text-[47px] text-primary font-bold">29,90</span></p>-->
<!--        <p class="text-primary">• Pagamento com cartão</p>-->
<!--      </div>-->
<!--      <div @click="open('https://www.google.com.br/')" class="card">-->
<!--        <p class="text-secondary font-bold">1º mês</p>-->
<!--        <img class="mx-auto" src="/images/pix-boleto.svg" alt="pixboleto" />-->
<!--        <p>R$ <span class="text-[47px] text-primary font-bold">39,90</span></p>-->
<!--        <p class="text-primary">• Pagamento com Pix / Boleto</p>-->
<!--      </div>-->
<!--      <div @click="open('https://www.google.com.br/')" class="card">-->
<!--        <p class="text-secondary font-bold">Trimestral</p>-->
<!--        <img-->
<!--          class="mx-auto"-->
<!--          src="/images/pix-cartao-boleto.svg"-->
<!--          alt="pixcartaoboleto"-->
<!--        />-->
<!--        <p>R$ <span class="text-[47px] text-primary font-bold">69,90</span></p>-->
<!--        <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>-->
<!--      </div>-->
      <div @click="open('https://pay.hotmart.com/R63561106K?off=cnqf4tk6')" class="card">
        <p class="text-secondary font-bold">Mensal</p>
        <img class="mx-auto" src="/images/boleto-pix-cartao.svg" alt="cartao" />
        <p>R$ <span class="text-[47px] text-primary font-bold">29,90</span></p>
        <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>
      </div>
    </div>

<!--    <h2-->
<!--      class="-->
<!--        leading-[28px]-->
<!--        text-[24px]-->
<!--        sm:text-[32px]-->
<!--        text-secondary-->
<!--        pt-16-->
<!--        pb-8-->
<!--        font-bold-->
<!--        pl-8-->
<!--      "-->
<!--    >-->
<!--      Site de análise + Grupo VIP-->
<!--    </h2>-->

<!--    <div class="flex gap-4 pr-8 pl-8">-->
<!--      <div @click="open('https://www.google.com.br/')" class="card">-->
<!--        <p class="text-secondary font-bold">1º mês</p>-->
<!--        <img class="mx-auto" src="/images/cartao.svg" alt="cartao" />-->
<!--        <p>R$ <span class="text-[47px] text-primary font-bold">97,00</span></p>-->
<!--        <p class="text-primary">• Pagamento com cartão</p>-->
<!--      </div>-->

<!--      <div @click="open('https://www.google.com.br/')" class="card">-->
<!--        <p class="text-secondary font-bold">1º mês</p>-->
<!--        <img class="mx-auto" src="/images/pix-boleto.svg" alt="pixboleto" />-->
<!--        <p>R$ <span class="text-[47px] text-primary font-bold">109,90</span></p>-->
<!--        <p class="text-primary">• Pagamento com Pix / Boleto</p>-->
<!--      </div>-->
<!--      <div @click="open('https://www.google.com.br/')" class="card">-->
<!--        <p class="text-secondary font-bold">Trimestral</p>-->
<!--        <img-->
<!--          class="mx-auto"-->
<!--          src="/images/pix-cartao-boleto.svg"-->
<!--          alt="pixcartaoboleto"-->
<!--        />-->
<!--        <p>R$ <span class="text-[47px] text-primary font-bold">249,90</span></p>-->
<!--        <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>-->
<!--      </div>-->
<!--      <div @click="open('https://www.google.com.br/')" class="card">-->
<!--        <p class="text-secondary font-bold">Semestral</p>-->
<!--        <img class="mx-auto" src="/images/boleto-pix-cartao.svg" alt="cartao" />-->
<!--        <p>R$ <span class="text-[47px] text-primary font-bold">499,90</span></p>-->
<!--        <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>-->
<!--      </div>-->
<!--    </div>-->
  </section>

  <q-dialog
    v-model="dialog"
    persistent
    transition-show="scale"
    transition-hide="scale"
    maximized
    class="p-6"
  >
      <div class="w-full h-full bg-white">
          <q-btn @click="dialog = false">voltar</q-btn>
          <iframe :src="this.url"
                  allow="payment"
                  style="overflow: hidden; height: 100%;
        width: 100%;"
          ></iframe>

      </div>
  </q-dialog>
</template>

<script>
export default {
  props: {
    title: String,
  },

  data: function () {
    return {
      url: "",
      dialog: false,
    };
  },

  methods: {
    open(url) {
      this.url = url;
      this.dialog = true;
    },
  },
};
</script>

<style scoped>
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
  cursor: pointer;
}
.card-dialog {
  max-width: 650px;
  width: 100%;
  border-radius: 30px;
}
.bg-card {
  background: #eff3f8;
  padding-bottom: 34px;
  padding-top: 34px;
}
</style>
