<template>
    <Head title="Login"/>

    <h1>Login</h1>

    <p class="text-primary text-center mt-2">
        Seja bem vindo! Acesse agora toda a potência em análise de Galgos UK.
    </p>

    <q-form
        @submit.prevent="submit"
        class="flex flex-col space-y-6 q-pb-lg"
    >
        <q-input
            type="email"
            v-model="form.email"
            required
            autocomplete="username"
            placeholder="seu@email.com"
            rounded
            outlined
            dense
            :hide-bottom-space="!errors.email"
            :error="!!errors.email"
            :error-message="errors.email"
        />
        <q-input
            type="password"
            v-model="form.password"
            required
            autocomplete="current-password"
            placeholder="********"
            outlined
            rounded
            dense
        />
        <q-checkbox
            class="ml-4 text-primary"
            v-model="form.remember"
            label="Lembrar"
            dense
        ></q-checkbox>
        <q-btn
            type="submit"
            class="mx-auto normal-case w-32"
            color="primary"
            rounded
            label="Entrar"
            :loading="form.processing"
            :disabled="form.processing"
        ></q-btn>
    </q-form>
    <span>
        Ainda não tem cadastro?
        <Link :href="route('register')" class="text-primary">
            Cadastre-se aqui!
        </Link>
    </span>
    <div class="mt-3 flex justify-center items-center">
        <img src="/images/icons/telegram.png" alt="telegram" class="mr-2">
        <a href="#" target="_blank" class="text-primary">
            Acesse nosso grupo do Telegram
        </a>
    </div>

</template>

<script>
import Auth from "@/Layouts/Auth";
import {Head, Link} from "@inertiajs/inertia-vue3";

export default {

    layout: Auth,

    components: {
        Head,
        Link,
    },

    props: {
        status: String,
        errors: Object
    },

    data() {
        return {
            form: this.$inertia.form({
                email   : "",
                password: "",
                remember: false,
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("login"), {
                preserveScroll: true,
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

.card {
    max-width: 420px;
    border: 0.5px solid #eaebed;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 30px;
}
</style>
