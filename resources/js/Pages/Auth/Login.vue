<template>
  <Head title="Log in" />

  <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
    {{ status }}
  </div>

  <h1>Login</h1>
  <p class="text-primary">
    Seja bem vindo! Acesse agora toda a potência em análise de Galgos UK.
  </p>

  <q-form @submit.prevent="submit" class="flex flex-col space-y-6 q-pb-lg">
    <q-input
      type="email"
      v-model="form.email"
      required
      autocomplete="username"
      placeholder="seu@email.com"
      rounded
      outlined
      dense
    />
    <q-input
      type="password"
      v-model="form.password"
      required
      autocomplete="current-password"
      placeholder="********"
      rounded
      outlined
      dense
    />
    <q-checkbox
      class="text-primary"
      v-model="form.remember"
      label="Lembrar"
      dense
    ></q-checkbox>
    <q-btn
      type="submit"
      class="mx-auto"
      color="primary"
      rounded
      label="Entrar"
      :loading="form.processing"
      :disabled="form.processing"
    ></q-btn>
  </q-form>
</template>

<script>
import Guest from "@/Layouts/Guest.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
  layout: Guest,

  components: {
    Head,
    Link,
  },

  props: {
    canResetPassword: Boolean,
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        email: "",
        password: "",
        remember: false,
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("login"), {
        onFinish: () => this.form.reset("password"),
      });
    },
  },
};
</script>
<style scoped>
h1 {
  text-align: center;
  font-weight: bold;
  font-size: 50px;
  line-height: 60px;
  color: #0342a1;
}
</style>
