<template>
  <Head title="Race" />

  <div class="q-pa-md" style="max-width: 300px">
    <div class="q-gutter-md">
      <q-select dense filled v-model="model" :options="options" />
    </div>
  </div>
</template>

<script>
import Guest from "@/Layouts/Guest.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

export default {
  layout: Guest,

  components: {
    Head,
  },

  setup() {
    return {
      model: ref(null),
      options: ["Google", "Facebook", "Twitter", "Apple", "Oracle"],
    };
  },
};
</script>

<style>
</style>