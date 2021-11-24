<template>
  <q-layout view="hHh lpR fFf" class="row justify-center items-center app">
    <q-header class="q-px-lg bg-transparent text-primary app">
      <q-toolbar class="q-pr-lg">
        <q-avatar size="93px" square>
          <img src="/images/logo.png" />
        </q-avatar>
        <q-toolbar-title></q-toolbar-title>
        <q-btn flat class="text-primary" label="Teste Agora os Produtos" />
        <q-btn flat class="text-primary" label="Planos e Valores" />
        <q-btn flat class="text-primary" label="Curso (Free)" />
      </q-toolbar>
    </q-header>

    <q-page-container class="q-pb-lg">
      <div class="row justify-center px-10">
        <img width="667" src="/images/dog-galgos.png" alt="" />
        <q-card class="card q-pa-lg">
          <slot />
        </q-card>
      </div>
    </q-page-container>
  </q-layout>
</template>

<script>
export default {};
</script>
<style scoped>
.card {
  max-width: 420px;
  border: 0.5px solid #eaebed;
  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  border-radius: 30px;
}

.app {
  max-width: 1200px;
  margin: auto;
}
</style>