<template>
    <Head title="Reset Password"/>

    <h1 class="h3 text-primary">
        Nova Senha
    </h1>

    <q-form @submit.prevent="submit" class="flex flex-col space-y-6 pb-4">

        <q-input
            label="e-mail"
            :model-value="form.email"
            rounded
            outlined
            dense
            readonly
            :hide-bottom-space="!errors.email"
            :error="!!errors.email"
            :error-message="errors.email"
        ></q-input>

        <q-input
            type="password"
            placeholder="Nova senha"
            v-model="form.password"
            rounded
            outlined
            dense
           :hide-bottom-space="!errors.password"
            :error="!!errors.password"
            :error-message="errors.password"
        ></q-input>

        <q-input
            type="password"
            placeholder="Confirmar Senha"
            v-model="form.password_confirmation"
            rounded
            outlined
            dense
           :hide-bottom-space="!errors.password_confirmation"
            :error="!!errors.password_confirmation"
            :error-message="errors.password_confirmation"
        ></q-input>

        <q-btn
            type="submit"
            class="mx-auto normal-case"
            color="primary"
            rounded
            label="Resetar senha"
            :loading="form.processing"
            :disabled="form.processing"
        ></q-btn>

    </q-form>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeGuestLayout from '@/Layouts/Auth.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import {Head} from '@inertiajs/inertia-vue3';

export default {
    layout: BreezeGuestLayout,

    components: {
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        Head,
    },

    props: {
        email : String,
        token : String,
        errors: Object
    },

    data() {
        return {
            form: this.$inertia.form({
                token                : this.token,
                email                : this.email,
                password             : '',
                password_confirmation: '',
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('password.update'), {
                onFinish: () => this.form.reset('password', 'password_confirmation'),
            })
        }
    }
}
</script>
