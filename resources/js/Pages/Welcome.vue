<template>
  <Head title="Início" />

  <!-- Hero -->
  <section class="c-Hero flex justify-center items-end p-6">
    <div class="flex h-full justify-center">
      <q-btn rounded color="secondary normal-case mt-auto"  @click="$inertia.visit(route('dashboard'))">
        <img
          src="/images/icons/uk_flag_curved.svg"
          alt="bandeiracurvada"
          class="w-10 -mt-8 mr-2"
        />
        <div>Acessar corridas de galgos</div>
      </q-btn>
    </div>
  </section>

  <!-- Intro -->
  <section class="container mt-8">
    <h3 class="h4 md:h3 text-primary text-center whitespace-nowrap">
      Nossos Pilares
    </h3>
    <h2 class="h5 text-primary text-center">Entre para a realeza!</h2>
    <p class="body text-primary text-center">
      Melhor site de corridas inglesas do Brasil, teste gratuitamente e comece a
      lucrar hoje mesmo, tenha acesso a tudo que você precisa para dominar esse
      mercado de galgos.
    </p>
  </section>

  <section class="container flex flex-col gap-12 md:gap-24 mt-20">
    <div
      v-for="(pilar, index) in pilares"
      :key="pilar"
      class="
        flex flex-col
        md:flex-row
        gap-8
        flex-nowrap
        justify-center
        sm:justify-start
        items-start
      "
    >
      <span
        class="c-Numeros self-center p-4 md:mr-10"
        v-text="index + 1"
      ></span>
      <div class="flex flex-col text-center sm:text-left">
        <h2
          class="
            text-[24px]
            leading-[24px]
            sm:text-[32px]
            text-secondary
            font-bold
          "
          v-text="pilar.title"
        ></h2>
        <p
          class="pt-6 text-[16px] sm:text-[21px] text-dark"
          v-text="pilar.text"
        ></p>
      </div>
    </div>
  </section>

  <section class="container my-20">
    <h1
      class="
        text-center text-[38px]
        sm:text-[50px]
        text-primary
        font-bold
        leading-[40px]
      "
    >
      Conheça nossos planos
    </h1>
    <!-- planos site de analise -->
    <h2
      class="
        leading-[28px]
        text-[24px]
        sm:text-[32px]
        text-secondary
        pt-12
        pb-8
        font-bold
        pl-8
      "
    >
      Site de analise
    </h2>
    <div class="flex gap-4 pr-8 pl-8">
      <template v-for="plano in planos" :key="plano">
        <card-planos
          @click="open(plano.url)"
          :src="plano.src"
          :title="plano.title"
          :price="plano.price"
          :subtitle="plano.subtitle"
        >
        </card-planos>
      </template>
    </div>

    <!-- planos vip -->
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
      <template v-for="plano in planos_vip" :key="plano">
        <card-planos
          @click="open(plano.url)"
          :src="plano.src"
          :title="plano.title"
          :price="plano.price"
          :subtitle="plano.subtitle"
        >
        </card-planos>
      </template>
    </div>
  </section>

  <!-- popup -->
  <q-dialog
    v-model="dialog"
    persistent
    transition-show="scale"
    transition-hide="scale"
  >
    <q-card class="card-dialog">
      <q-card-section>
        <div class="row items-center">
          <q-img class="col-2" width="57px" src="/images/logo.png" alt="logo" />
          <h2 class="col-10 text-center text-h6 text-primary">
            Realizar pagamento
          </h2>
        </div>
      </q-card-section>

      <q-card-actions align="center" class="bg-card">
        <a @click="dialog = false" :href="url" target="_blank"
          >Clique aqui para pagar</a
        >
      </q-card-actions>
    </q-card>
  </q-dialog>
</template>

<script>
import CardPlanos from "@/Components/CardPlanos";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    CardPlanos,
    Head,
    Link,
  },

  data() {
    return {
      pilares: [
        {
          title: "Acessível",
          text: "Tenha acesso as corridas atualizadas diariamente com todas as informações que você precisa para analisar.",
        },
        {
          title: "Exclusividade",
          text: "Obtenha um filtro único que vai te ajudar a trabalhar com top 3, back e placed.",
        },
        {
          title: "Aprendizado",
          text: "Você vai receber acesso a um curso completo de como analisar as corridas para AvB, possibilitando a você viver do mercado.",
        },
      ],
      planos: [
        {
          title: "1º mês",
          src: "/images/cartao.svg",
          price: "29,90",
          subtitle: "• Pagamento com cartão",
        },
        {
          title: "1º mês",
          src: "/images/pix-boleto.svg",
          price: "39,90",
          subtitle: "• Pagamento com Pix / Boleto",
        },
        {
          title: "Trimestral",
          src: "/images/pix-cartao-boleto.svg",
          price: "69,90",
          subtitle: "• Pagamento com Pix, boleto ou cartão",
        },
        {
          title: "Semestral",
          src: "/images/boleto-pix-cartao.svg",
          price: "139,90",
          subtitle: "• Pagamento com Pix, boleto ou cartão",
        },
      ],
      planos_vip: [
        {
          title: "1º mês",
          src: "/images/cartao.svg",
          price: "97,00",
          subtitle: "• Pagamento com cartão",
          url: "https://www.google.com.br/",
        },
        {
          title: "1º mês",
          src: "/images/pix-boleto.svg",
          price: "109,90",
          subtitle: "• Pagamento com Pix / Boleto",
          url: "https://www.spotify.com/us/",
        },
        {
          title: "Trimestral",
          src: "/images/pix-cartao-boleto.svg",
          price: "249,90",
          subtitle: "• Pagamento com Pix, boleto ou cartão",
        },
        {
          title: "Semestral",
          src: "/images/boleto-pix-cartao.svg",
          price: "499,90",
          subtitle: "• Pagamento com Pix, boleto ou cartão",
        },
      ],
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
.c-Hero {
  min-height: 500px;
  background-image: url("/images/guest/hero.png");
  background-size: cover;
  background-position: top;
}

.c-Numeros {
  font-size: 13rem;
  line-height: 7rem;
  -webkit-text-stroke-width: 1px;
  -webkit-text-stroke-color: #484a4e;
  color: #fff;
  font-weight: 700;
  opacity: 0.4;
  min-width: 150px;
  text-align: center;
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
