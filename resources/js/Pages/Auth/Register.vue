<template>
    <Head title="Cadastro" />

    <h1 class="h3 text-primary text-center">
        Cadastro
    </h1>

    <q-form @submit.prevent="submit" class="flex flex-col space-y-6 pb-4">

        <q-input
            :hide-bottom-space="!errors.name"
            :error="!!errors.name"
            :error-message="errors.name"
            v-model="form.name"
            placeholder="Nome"
            dense
            outlined
            rounded
        ></q-input>

        <q-input
            type="email"
            :hide-bottom-space="!errors.email"
            :error="!!errors.email"
            :error-message="errors.email"
            v-model="form.email"
            placeholder="E-mail"
            dense
            outlined
            rounded
        ></q-input>

        <q-input
            type="password"
            :hide-bottom-space="!errors.password"
            :error="!!errors.password"
            :error-message="errors.password"
            v-model="form.password"
            placeholder="Senha"
            dense
            outlined
            rounded
        ></q-input>

        <q-input
            type="password"
            :hide-bottom-space="!errors.password_confirmation"
            :error="!!errors.password_confirmation"
            :error-message="errors.password_confirmation"
            v-model="form.password_confirmation"
            placeholder="Confirme a senha"
            dense
            outlined
            rounded
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

        <Link :href="route('login')" class="text-center text-primary">
            Já sou cadastrado
        </Link>

    </q-form>
</template>

<script>
import Auth from '@/Layouts/Auth.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    layout: Auth,

    components: {
        Head,
        Link,
    },

    props: {
        errors: Object
    },

    data() {
        return {
            form: this.$inertia.form({
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                terms: false,
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('register'), {
                onFinish: () => this.form.reset('password', 'password_confirmation'),
            })
        }
    }
}
</script>
