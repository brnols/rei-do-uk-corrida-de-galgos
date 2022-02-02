<template>
  <q-header class="bg-white text-primary relative">
    <q-toolbar class="container q-py-sm flex justify-between">
      <q-toolbar>
        <img class="w-14" src="/images/logo.png" alt="logo" />
        <q-toolbar-title class="desktop-hide font-bold">
          Rei do UK
        </q-toolbar-title>
      </q-toolbar>

      <!-- menu mobile -->
      <nav class="desktop-hide">
        <q-btn flat round color="primary" icon="fas fa-bars">
          <q-menu>
            <q-list>
              <q-item
                clickable
                v-close-popup
                v-for="item in items"
                :key="item.name"
                v-show="item.show"
              >
                <q-item-section
                  v-text="item.name"
                  @click="item.action()"
                  :class="{ 'text-secondary': item.active }"
                ></q-item-section>
              </q-item>
            </q-list>
          </q-menu>
        </q-btn>
      </nav>
      <!-- fim menu mobile -->

      <q-list class="desktop-only whitespace-nowrap">
        <q-btn
          v-for="item in items"
          :key="item.name"
          v-show="item.show"
          class="text-primary-dark normal-case"
          :label="item.name"
          @click="item.action()"
          flat
          :class="{ 'text-secondary': item.active }"
        />
      </q-list>
    </q-toolbar>
  </q-header>
</template>

<script>
export default {
  name: "TheHeader",

  computed: {
    authenticated: function () {
      return !!this.$page.props.auth.user;
    },

    items: function () {
      return [
        {
          name: "Home",
          action: () => this.$inertia.visit(this.route("welcome")),
          show: !this.authenticated,
          active: this.route().current("welcome"),
        },
        {
          name: "Login",
          action: () => this.$inertia.visit(this.route("dashboard")),
          show: !this.authenticated,
          active: false,
        },
        {
          name: "Planos e Valores",
          action: () => this.$inertia.visit(this.route("planos")),
          show: true,
          active: this.route().current("planos"),
        },
        {
          name: "Início",
          action: () => this.$inertia.visit(this.route("dashboard")),
          show: this.authenticated,
          active: this.route().current("dashboard"),
        },
        {
          name: "Filtros (Em breve)",
          action: () => this.$inertia.visit(this.route("dashboard")), //this.route("filtros.index")),
          show: this.authenticated,
          active: this.route().current("filtros"),
        },
        {
          name: "Meu Canil",
          action: () => this.$inertia.visit(this.route("canil.index")), //this.route("canil")),
          show: this.authenticated,
          active: this.route().current("canil.index"),
        },
        {
          name: "Transmissões ao vivo (Em breve)",
          action: () => this.$inertia.visit(this.route("dashboard")),
          show: false,
          active: true,
        },
        {
          name: "Curso (Free)",
          action: () => this.$inertia.visit(this.route("cursos")),
          show: false,
          active: this.route().current("cursos"),
        },
        {
          name: "Logout",
          action: () => this.$inertia.post(this.route("logout")),
          show: this.authenticated,
          active: false,
        },
      ];
    },
  },
};
</script>

<style scoped>
</style>
