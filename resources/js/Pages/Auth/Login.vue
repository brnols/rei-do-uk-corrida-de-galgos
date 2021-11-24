<template>
    <Head title="Log in"/>

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div>

    <q-card class="bg-light">
        <q-form @submit.prevent="submit" class="flex flex-col space-y-6">
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
                v-model="form.email"
                required
                autocomplete="current-password"
                placeholder="********"
                rounded
                outlined
                dense
            />
            <q-checkbox
                v-model="form.remember"
                label="Lembrar"
                dense
            ></q-checkbox>
            <q-btn
                class="mx-auto"
                color="primary"
                rounded
                label="Entrar"
            ></q-btn>
        </q-form>
    </q-card>
    <form @submit.prevent="submit">
        <div>
            <BreezeLabel for="email" value="Email"/>
            <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus
                         autocomplete="username"/>
        </div>

        <div class="mt-4">
            <BreezeLabel for="password" value="Password"/>
            <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                         autocomplete="current-password"/>
        </div>

        <div class="block mt-4">
            <label class="flex items-center">
                <BreezeCheckbox name="remember" v-model:checked="form.remember"/>
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <Link v-if="canResetPassword" :href="route('password.request')"
                  class="underline text-sm text-gray-600 hover:text-gray-900">
                Forgot your password?
            </Link>

            <q-btn class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Log in
            </q-btn>
        </div>
    </form>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeCheckbox from '@/Components/Checkbox.vue'
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import {Head, Link} from '@inertiajs/inertia-vue3';

export default {
    layout: BreezeGuestLayout,

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
                email: '',
                password: '',
                remember: false
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('login'), {
                onFinish: () => this.form.reset('password'),
            })
        }
    }
}
</script>
