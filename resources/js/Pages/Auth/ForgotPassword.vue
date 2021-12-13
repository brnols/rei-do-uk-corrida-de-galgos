<template>
    <Head title="Esqueci a senha" />

    <h1 class="h3 text-primary text-center">
        Login
    </h1>

    <div class="text-primary mb-4">
        <strong>Problemas para entrar?</strong><br>
        Insira seu e-mail que enviaremos um link pra você acessar sua conta.
    </div>

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div>


    <q-form @submit.prevent="submit" class="flex flex-col space-y-6 pb-4">

        <q-input
            type="email"
            v-model="form.email"
            placeholder="E-mail"
            outlined
            rounded
            dense
        ></q-input>

        <q-btn
            type="submit"
            class="mx-auto normal-case w-32"
            color="primary"
            rounded
            label="Enviar"
            :loading="form.processing"
            :disabled="form.processing"
        ></q-btn>

    </q-form>

    <Link :href="route('login')" class="text-center text-primary">
        Fazer login
    </Link>

</template>

<script>
import Auth from "@/Layouts/Auth.vue";
import {Head, Link} from "@inertiajs/inertia-vue3";

export default {
    layout: Auth,

    components: {
        Head,
        Link
    },

    props: {
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: "",
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("password.email"));
        },
    },
};
</script>
