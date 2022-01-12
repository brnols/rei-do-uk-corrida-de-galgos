<template>
    <q-dialog v-model="dialog" persistent>

        <q-card class="card-dialog">

            <q-card-section class="row items-center q-py-none">
                <q-space />
                <q-btn icon="close" flat round dense v-close-popup />
            </q-card-section>

            <q-card-section v-if="!edit">
                <h2 class="font-bold text-h6 text-primary">Adicionar ao Canil</h2>
                <p class="text-dark">Adicionar galgo ao seu canil</p>
            </q-card-section>

            <q-card-section>
                <label class="text-primary" for="comentario">
                    Comentário sobre o Galgo
                </label>
                <q-input
                    v-model="form.comentario"
                    id="comentario"
                    class="bg-light"
                    dense
                    filled
                    label="Escreva o comentário sobre o Galgo"
                >
                </q-input>
            </q-card-section>

            <q-card-actions align="center" class="flex-column">
                <q-btn
                    class="bg-primary text-white font-bold btn"
                    label="Guardar"
                    v-close-popup
                />
                <a class="text-primary" :href="$inertia.visit(route('canil.index'))" target="_blank">
                    Ir para seu canil
                </a>
            </q-card-actions>
        </q-card>
    </q-dialog>
</template>

<script>
export default {
    name: "DialogCanil",

    props: ['edit', 'dialog', 'galgo'],

    data() {
        return {
            key: value
        }
    },
}
</script>

<style scoped>

</style>
