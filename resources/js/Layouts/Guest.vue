<template>
  <q-layout view="hHh lpR fFf" class="pb-12 sm:pb-0">
    <q-header class="bg-white text-primary md:container md:mx-auto">
      <q-toolbar class="q-pr-lg q-py-sm">
        <img class="w-14 sm:w-24" src="/images/logo.png" />

        <q-toolbar-title></q-toolbar-title>
        <!-- menu mobile -->
        <q-btn flat round color="primary  sm:invisible" icon="fas fa-bars">
          <q-menu>
            <q-list style="min-width: 100px">
              <q-item clickable v-close-popup>
                <q-item-section>Teste Agora os Produtos</q-item-section>
              </q-item>
              <q-item clickable v-close-popup>
                <q-item-section>Planos e Valores</q-item-section>
              </q-item>
              <q-item clickable v-close-popup>
                <q-item-section>Curso (Free)</q-item-section>
              </q-item>
              <BreezeResponsiveNavLink
                @click="localStorage.setItem('logged', false)"
                :href="route('logout')"
                method="post"
                as="button"
              >
                <q-item>
                  <q-item-section>Logout</q-item-section>
                </q-item>
              </BreezeResponsiveNavLink>
            </q-list>
          </q-menu>
        </q-btn>
        <!-- fim menu mobile -->
        <q-btn
          flat
          class="text-primary gt-xs"
          label="Teste Agora os Produtos"
        />
        <q-btn flat class="text-primary gt-xs" label="Planos e Valores" />
        <q-btn flat class="text-primary gt-xs" label="Curso (Free)" />
        <BreezeResponsiveNavLink
          :href="route('logout')"
          method="post"
          as="button"
        >
          <q-btn @click="sair" flat class="text-primary gt-xs" label="Logout" />
        </BreezeResponsiveNavLink>
      </q-toolbar>
    </q-header>

    <q-page-container class="md:container md:mx-auto px-4 pb-10">
      <slot />
    </q-page-container>
  </q-layout>
</template>

<script>
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import TableHome from "@/Components/TableHome.vue";
export default {
  components: {
    TableHome,
    BreezeResponsiveNavLink,
  },

  data: () => ({
    logged: false,
  }),

  methods: {},
};
</script>
<style scoped>
.app {
  max-width: 1200px;
  margin: auto;
}
</style>