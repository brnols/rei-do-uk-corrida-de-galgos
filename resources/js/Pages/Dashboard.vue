<template>
    <Head title="Dashboard"/>

    <q-page>

        <!-- Form -->
        <div class="c-FormWrapper relative rounded-3xl p-2">
            <q-card class="rounded-3xl p-4 lg:mt-32 bg-light">
                <q-form @submit.prevent="submit" class="flex flex-col lg:flex-row lg:flex-nowrap gap-3">
                    <!-- Pista -->
                    <div class="flex flex-col w-full lg:w-1/2 flex-shrink-0">
                        <label class="small-2 text-primary">
                            Buscar pista
                        </label>
                        <q-select
                            v-model="form.pista"
                            :options="pistas"
                            option-value="tabela"
                            option-label="nome"
                            dense
                            outlined
                            bg-color="white"
                            map-options
                            emit-value
                        >
                            <template v-slot:prepend>
                                <q-icon name="location_on"/>
                            </template>
                        </q-select>
                    </div>
                    <!-- Race -->
                    <div class="flex flex-col w-full">
                        <label class="small-2 text-primary">
                            Races
                        </label>
                        <q-select
                            v-model="form.race"
                            :options="raceOptions"
                            option-value="value"
                            option-label="label"
                            dense
                            outlined
                            bg-color="white"
                            map-options
                            clearable
                        >
                            <template v-slot:prepend>
                                <q-icon name="loop"/>
                            </template>
                        </q-select>
                    </div>
                    <!-- Submit -->
                    <q-btn
                        class="self-end lg:-mt-1"
                        type="submit"
                        color="primary"
                        rounded
                        label="buscar"
                        :loading="form.processing"
                        :disabled="form.processing"
                    ></q-btn>
                </q-form>
            </q-card>
        </div>

        <!-- Table -->
        <q-card class="rounded-3xl bg-light p-4 mt-7 grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div v-for="race in races" :key="race.Horario" class="p-2 bg-white rounded">
                <div class="flex gap-1 items-center small-2 text-dark whitespace-nowrap">
                    <span class="w-16">
                        Race {{ race.id }}
                    </span>
                    <span>
                        -
                    </span>
                    <img src="/images/flag-br.png" alt="Hora Brasil">
                    <span class="w-12">
                        {{ race.hora_br }}
                    </span>
                    <img src="/images/flag-uk.png" alt="Hora UK">
                    <span class="w-12">
                        {{ race.hora_uk }}
                    </span>
                    <span>
                        ({{ race.info }})
                    </span>
                    <q-btn
                        rounded
                        unelevated
                        color="success"
                        class="ml-auto"
                        label="Liberada"
                    ></q-btn>
                </div>
            </div>
        </q-card>
    </q-page>

</template>

<script>
import App from "@/Layouts/App";
import {Head} from "@inertiajs/inertia-vue3";

export default {
    layout: App,

    components: {
        Head,
    },

    props: {
        pistas: Array,
        races : Array
    },

    data() {
        return {
            form: {
                pista: null,
                race : null
            }
        };
    },

    computed: {
        raceOptions() {
            let options = [];

            for (let i = 0; i < 12; i++) {
                options.push(`Race ${i + 1} `)
            }

            return options;
        }
    },

    methods: {
        submit: function () {
            this.$inertia.get(this.route('dashboard', {pista: this.form.pista}),
                {
                    race: this.form.race
                },
                {
                    preserveState: true
                }
            )
        }
    },

    mounted() {
        this.form.pista = this.route().params.pista;
    }
};
</script>

<style scoped>
.c-FormWrapper {
    background-image: url("/images/bandeira.png");
}
</style>
