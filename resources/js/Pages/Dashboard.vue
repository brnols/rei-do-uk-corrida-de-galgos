<template>
    <Head title="Dashboard"/>

    <q-page class="container">
        <!-- Form -->
        <div class="c-FormWrapper relative rounded-3xl p-2">
            <q-card class="rounded-3xl p-4 lg:mt-32 bg-light">
                <q-form class="flex flex-col lg:flex-row lg:flex-nowrap gap-3">

                    <!-- Pista -->
                    <div class="flex flex-col w-full lg:w-1/2 flex-shrink-0">
                        <label class="small-2 text-primary"> Buscar pista </label>
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
                            @update:model-value="goToPista"
                        >
                            <template v-slot:prepend>
                                <q-icon name="location_on"/>
                            </template>
                        </q-select>
                    </div>

                    <!-- Race -->
                    <div class="flex flex-col w-full">
                        <label class="small-2 text-primary"> Races </label>
                        <q-select
                            v-model="form.race"
                            :options="raceOptions"
                            dense
                            outlined
                            bg-color="white"
                            map-options
                            clearable
                            :disable="!races.length"
                            emit-value
                            @update:model-value="goToRace"
                        >
                            <template v-slot:prepend>
                                <q-icon name="loop"/>
                            </template>
                        </q-select>
                    </div>

                </q-form>
            </q-card>
        </div>

        <!-- Table -->
        <q-card class="rounded-3xl bg-light p-4 mt-7">

            <h6 class="h6 text-primary font-bold mb-4">
                {{ pista.nome }}
            </h6>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div v-for="race in races" :key="race.Horario" class="p-2 bg-white rounded">
                    <div class="flex gap-1 items-center small text-dark whitespace-nowrap">
                        <span class="w-16"> Race {{ race.id }} </span>
                        <span> - </span>
                        <img src="/images/flag-br.png" alt="Hora Brasil"/>
                        <span class="w-12">
                            {{ race.hora_br }}
                        </span>
                        <img src="/images/flag-uk.png" alt="Hora UK"/>
                        <span class="w-12">
                            {{ race.hora_uk }}
                        </span>
                        <span>
                            ({{ race.info }})
                        </span>
                        <q-btn
                            @click="$inertia.visit(route('race', { pista: pista.tabela, race: race.horario }))"
                            rounded
                            unelevated
                            :disable="!race.liberada"
                            :color="race.liberada ? 'success' : 'danger'"
                            class="ml-auto min-w-[120px]"
                            :label="race.liberada ? 'Liberada' : 'Assinante'"
                        ></q-btn>
                    </div>
                </div>
            </div>

            <span v-if="races.length === 0" class="small-2">
                Nenhum resultado encontrado para esta pista.
            </span>

        </q-card>
    </q-page>
</template>

<script>
import {Head} from "@inertiajs/inertia-vue3";

export default {

    components: {
        Head,
    },

    props: {
        pistas: Array,
        pista : Object,
        races : Array,
        auth  : Object,
    },

    data() {
        return {
            form: {
                pista: null,
                race : null
            },
        };
    },

    computed: {
        raceOptions() {
            return this.races.map((item, i) => {
                return {label: `Race ${i + 1}`, value: item.horario}
            })
        },
    },

    methods: {
        goToPista: function () {
            this.$inertia.get(
                this.route("dashboard", {
                    pista: this.form.pista
                })
            );
        },

        goToRace: function () {
            this.$inertia.visit(
                this.route("race", {
                    pista: this.form.pista,
                    race : this.form.race
                })
            );
        },
    },

    mounted() {
        this.form.pista = this.pista.tabela;
    },
};
</script>

<style scoped>
.c-FormWrapper {
    background-image: url("/images/bandeira.png");
}
</style>
