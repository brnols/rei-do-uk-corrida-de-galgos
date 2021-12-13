<template>
    <q-layout view="hhh lpR fFf">
        <the-header/>

        <div class="container my-10">
            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <div class="flex items-center gap-y-4">
                <div class="w-full md:w-1/2">
                    <q-img max-width="667" src="/images/dog-galgos.png" alt=""/>
                </div>
                <div class="w-full md:w-1/2">
                    <q-card class="rounded-3xl bg-[#FCFDFF] q-pa-lg">
                        <slot />
                    </q-card>
                </div>
            </div>
        </div>

    </q-layout>
</template>

<script>
import TheHeader from "@/Components/TheHeader";

export default {
    name: "Auth",

    components: {
        TheHeader,
    },
}
</script>

<style scoped>

</style>
