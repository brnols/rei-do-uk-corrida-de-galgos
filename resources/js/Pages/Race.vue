<template>
    <Head title="Race"/>

    <div class="container">
        <div class="row justify-between">

            <!-- search -->
            <div class="col-12 col-sm-3 space-y-4 flex flex-col justify-end">

                <q-select
                    class="bg-light"
                    dense
                    filled
                    label="Próximas Corridas"
                    v-model="model"
                    :options="options"
                ></q-select>

                <q-select
                    class="bg-light"
                    dense
                    label="Próximas Corridas Nessa Pista"
                    filled
                    v-model="model2"
                    :options="options"
                ></q-select>

            </div>

            <!-- card -->
            <div class="col-12 col-sm-8 pt-4 sm:pt-0">
                <Link :href="route('cursos')">
                    <div
                        class="shadow-2xl py-8 px-4 bg-secondary sm:justify-center md:justify-around text-white flex rounded-md">

                        <div>
                            Faça seu curso de
                            <h2 class="text-5xl font-bold">Galgo Vencedor</h2>
                        </div>

                        <div class="flex items-center px-4 sm:ml-20 lg:ml-0">
                            click aqui
                        </div>

                        <q-img style="width: 151px" src="/images/icone-race.png"/>
                    </div>
                </Link>
            </div>
        </div>

        <div class="row py-6">
            <div class="col-12 p-6 rounded-3xl shadow-xl bg-light text-primary text-bold flex space-x-8">

                <div>
                    <span>Racing Post</span>
                    <div class="flex">
                        <img src="/images/1.png"/>
                        <img src="/images/5.png"/>
                        <img src="/images/6.png"/>
                    </div>
                </div>

                <div>
                    <span>Resultado</span>
                    <div class="flex">
                        <img src="/images/1.png"/>
                        <img src="/images/5.png"/>
                        <img src="/images/6.png"/>
                        <img src="/images/2.png"/>
                        <img src="/images/4.png"/>
                        <img src="/images/3.png"/>
                    </div>
                </div>

            </div>
        </div>

        <table-participantes @enviar="enviar = $event"/>

        <tabela-comparativa
            :items="enviar.items"
            :ordem="enviar.index"
            :disabled="enviar.disabled"
            class="mt-6"
        ></tabela-comparativa>

        <tabela-comparativa-dois
            :items="enviar.items"
            :ordem="enviar.index"
            :disabled="enviar.disabled"
            class="mt-6"
        ></tabela-comparativa-dois>

        <tabela-comparativa-tres
            :items="enviar.items"
            :ordem="enviar.index"
            :disabled="enviar.disabled"
            class="mt-6"
        ></tabela-comparativa-tres>

        <section-avb :indicadores="indicadores"/>

        <table-galgo
            v-for="galgo in $page.props.indicadores"
            :key="galgo"
            :galgo="galgo"
            class="mt-6"
        ></table-galgo>

    </div>
</template>

<script>
import {Head, Link} from "@inertiajs/inertia-vue3";
import TableParticipantes from "@/Components/TableParticipantes.vue";
import TabelaComparativa from "@/Components/TabelaComparativa.vue";
import TabelaComparativaDois from "@/Components/TabelaComprativaDois.vue";
import TabelaComparativaTres from "@/Components/TabelaComparativaTres.vue";
import SectionAvb from "@/Components/SectionAvb";
import TableGalgo from "@/Components/TableGalgo.vue";

export default {
    props: {
        indicadores: Array,
        pista      : Object
    },

    components: {
        Head,
        Link,
        TableParticipantes,
        TabelaComparativa,
        TabelaComparativaDois,
        TabelaComparativaTres,
        SectionAvb,
        TableGalgo,
    },

    /* 4 espaços! */
    data() {
        return {
            model  : null,
            model2 : null,
            options: [
                "Towcester (BR: 15:24 I UK: 19:24)",
                "Yarmouth (BR: 15:26 I UK: 19:26)",
                "Youghal (BR:15:28 i 19:28)",
                "Nothingham (BR: 19:24 I UK: 19:24)",
                "Doncaster (BR: 19:24 I UK: 19:24)",
            ],
            enviar : {},
            ocultar: {},
        };
    },

    mounted() {
        console.log(this.indicadores);
    },
};
</script>

<style>
</style>
