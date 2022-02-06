<template>
    <Head title="Race"/>

    <div class="container">
        <div class="row justify-between">
            <!-- search -->
            <div class="col-12 col-sm-3 space-y-4 flex flex-col justify-end">
                <q-select
                    class="bg-light"
                    dense
                    label="Próximas Corridas"
                    :option-label="(item) => item.pista +' (BR:'+ item.hora_br + ' UK: '+ item.hora_uk + ')' "
                    filled
                    v-model="model"
                    :options="prox_corridas"
                    @update:model-value="$inertia.visit(route('race', { pista: model.tabela, race: model.Horario }))" 
                    emit-value
                    :disable="!prox_corridas.length"                   
                >
                </q-select>
                <q-select
                    class="bg-light"
                    dense
                    label="Próximas Corridas Nessa Pista"
                    option-value="Horario"
                    :option-label="(item) => ' (BR:'+ item.hora_br + ' UK: '+ item.hora_uk + ')' "
                    filled
                    v-model="model2"
                    :options="prox_corridas_pista"
                    @update:model-value="$inertia.visit(route('race', { pista: pista.tabela, race: model2 }))"
                    emit-value
                    :disable="!prox_corridas_pista.length"
                >
                </q-select>
            </div>
            <!-- card -->
            <div class="col-12 col-sm-8 pt-4 sm:pt-0">
                <Link onclick="window.location = 'https://www.brunolucas.com.br/reidouk-vip/' " href="#" target="_blank">
                <div>
                 <q-img class="w-full rounded-md" src="/images/banner_galgo_bruno.jpg"/>
                </div>
                    <!-- <div
                        class="
              shadow-2xl
              py-8
              px-4
              bg-secondary
              sm:justify-center
              md:justify-around
              text-white
              flex
              rounded-md
            "
                    > -->
                        <!-- <div>
                            Faça seu curso de
                            <h2 class="text-5xl font-bold">Galgo Vencedor</h2>
                        </div>

                        <div class="flex items-center px-4 sm:ml-20 lg:ml-0">
                            click aqui
                        </div> -->

                        <!-- <q-img style="width: 151px" src="/images/icone-race.png"/> -->
                        
                    <!-- </div> -->
                    
                </Link>
            </div>
        </div>

        <div class="row py-6">
            <div
                class="
          col-12
          p-6
          rounded-3xl
          shadow-xl
          bg-light
          text-primary text-bold
          flex
          space-x-8
        "
            >
                <div>
                    Racing Post
                    <span class="flex">
            <img src="/images/1.png"/>
            <img src="/images/5.png"/>
            <img src="/images/6.png"/>
          </span>
                </div>
                <div>
                    Resultado
                    <span class="flex">
                        <img v-for="r in resultados" v-bind:key="r.galgo" :src="'/images/'+r.galgo+'.png'"/>
                    </span>
                </div>
            </div>
        </div>

        <table-participantes @enviar="enviar = $event"></table-participantes>

        <tabela-comparativa
            :items="enviar.items"
            :ordem="enviar.ordem"
            :disabled="enviar.disabled"
            class="mt-6"
        ></tabela-comparativa>

        <tabela-comparativa-dois
            :items="enviar.items"
            :ordem="enviar.ordem"
            :disabled="enviar.disabled"
            class="mt-6"
        ></tabela-comparativa-dois>

        <tabela-comparativa-tres
            :items="enviar.items"
            :ordem="enviar.ordem"
            :disabled="enviar.disabled"
            class="mt-6"
        >
        </tabela-comparativa-tres>

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
    emits: ["enviar"],

    props: {
        pista              : Object,
        indicadores        : Array,
        prox_corridas_pista: Array,
        prox_corridas      : Array,
        canil              : Array,
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
    computed: {
        resultados: function(){
            try {
                let indicadores = Object.assign([], this.indicadores);
                
                return indicadores.sort(function(a, b) {
                        return a.podio_results - b.podio_results;
                    }).reduce(function(previous, indicador){
                        previous.push({galgo: indicador.ordem});
                        return previous;
                    }, [])

            } catch (error) {
                return [];
            }
        }
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
            enviar : {
                disabled: false,
                ordem   : [],
                items   : [],
            },
            ocultar: {},
        };
    },
};
</script>

<style>
</style>
