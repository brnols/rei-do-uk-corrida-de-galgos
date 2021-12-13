<template>
  <section class="container pb-[70px]">
    <planos-valores title="Planos e Valores"></planos-valores>
  </section>
</template>

<script>
import PlanosValores from "../Components/PlanosValores.vue";
export default {
  name: "Planos",

  components: {
    PlanosValores,
  },

  data: function () {
    return {};
  },
};
</script>

<style scoped>
</style>
