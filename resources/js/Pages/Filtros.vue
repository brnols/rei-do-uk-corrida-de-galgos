<template>
    <div class="c-Filtros container text-primary">

        <h2 class="text-xl">Filtro UK</h2>
        <span class="text-xs font-bold">Faça filtros usando características, comportamentos e psicionamento do Galgo na corrida.</span>

        <div ref="cards" class="flex flex-col gap-2 mt-4">

            <h2 class="h6 text-center">Dados</h2>
            <base-card class="grid grid-cols-12 gap-3">

                <form-group label="Nome do galgo" class="col-span-4">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group label="Nome do treinador" class="col-span-4">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group label="Nome do pai" class="col-span-4">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group label="Sexo" class="col-span-3">
                    <q-select
                        :options="[
                            {label: 'Macho', value: 'Macho'},
                            {label: 'Fêmea', value: 'Fêmea'},
                        ]"
                        use-input
                        placeholder="Selecione uma opção"
                        bg-color="white"
                        dense
                        outlined
                    ></q-select>
                </form-group>

                <form-group label="Trap" class="col-span-3">
                    <q-select
                        :options="[1,2,3,4,5,6].map( item => {
                            return {label: item, value: item}
                        })"
                        use-input
                        placeholder="Selecione uma opção"
                        bg-color="white"
                        dense
                        outlined
                    ></q-select>
                </form-group>

                <form-group label="Corridas analisadas" class="col-span-2">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group label="Idade" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

                <form-group label="Dias sem correr" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

                <form-group label="Peso" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

                <form-group label="Última categoria do galgo" class="col-span-3">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group label="Top 3 do galgo" class="col-span-7">
                    <div class="flex gap-2">
                        <q-checkbox  label="Na última"/>
                        <q-checkbox  label="Na penultima"/>
                        <q-checkbox  label="Na antepenúltima"/>
                    </div>
                </form-group>

            </base-card>

            <h2 class="h6 text-center">Médias</h2>
            <base-card class="grid grid-cols-12 gap-3">

                <form-group label="Split por posição" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

                <form-group label="Split final" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

                <form-group label="Rec/Cansa" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

                <form-group label="Última velocidade" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

                <form-group label="Posição média final" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

                <form-group label="Nota over" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

            </base-card>


            <h2 class="h6 text-center">Posição</h2>
            <base-card class="grid grid-cols-12 gap-3">

                <form-group label="U. Posição final" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

                <form-group label="PostPick" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

                <form-group label="Ordem posição final" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

                <form-group label="Ordem over" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

                <form-group label="Ordem over remarks" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

                <form-group label="Ordem peso" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

                <form-group label="Ordem rec/cansa" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

                <form-group label="Ordem split final" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

                <form-group label="Ordem split arrancada" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

                <form-group label="Ordem tp" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

                <form-group label="Ordem brt" class="col-span-1">
                    <q-input
                        bg-color="white"
                        dense
                        outlined
                    ></q-input>
                </form-group>

                <form-group class="col-span-1">
                    <q-select
                        :options="operadores"
                        dense
                        outlined
                        bg-color="white"
                    ></q-select>
                </form-group>

            </base-card>

        </div>

    </div>
</template>

<script>
import FormGroup from "@/Components/FormGroup";

export default {
    name: "Filtros",

    components: {
        FormGroup,
    },

    data() {
        return {
            operadores: [
                {
                    label: "> (maior)",
                    value: ">"
                },
                {
                    label: "≥ (maior ou igual)",
                    value: ">="
                },
                {
                    label: "< (menor)",
                    value: "<"
                },
                {
                    label: "≤ (menor ou igual)",
                    value: "<="
                },
                {
                    label: "= (igual)",
                    value: "="
                },
                {
                    label: "≠ (diferente)",
                    value: "!="
                },
            ]
        }
    },
}
</script>

<style scoped>
    .c-Filtros input, select {
        min-width: 10px;
    }
</style>
