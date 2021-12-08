<template>
    <Head title="Log in"/>

    <q-page>
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <div class="row items-center">
            <div class="col-12 col-sm-6">
                <q-img max-width="667" src="/images/dog-galgos.png" alt=""/>
            </div>
            <div class="col-12 col-sm-6">
                <q-card class="card q-pa-lg">
                    <h1>Login</h1>
                    <p class="text-primary">
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
                </q-card>
            </div>
        </div>
    </q-page>

</template>

<script>
import Guest from "@/Layouts/Guest.vue";
import {Head, Link} from "@inertiajs/inertia-vue3";

export default {
    layout: Guest,

    components: {
        Head,
        Link,
    },

    props: {
        canResetPassword: Boolean,
        status          : String,
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
