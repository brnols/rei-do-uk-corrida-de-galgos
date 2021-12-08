<template>
    <Head title="Dashboard"/>

    <div>
        <q-img class="img" src="/images/bandeira.png"></q-img>
        <div class="card bot">
            <div class="rounded-3xl" style="width: 90%; background: #eff3f8">
                <form-home/>
            </div>
        </div>
    </div>

    <div class="mt-7">
        <table-home></table-home>
    </div>
</template>

<script>
import App from "@/Layouts/App";
import FormHome from "@/Components/FormHome.vue";
import TableHome from "@/Components/TableHome.vue";
import {Head} from "@inertiajs/inertia-vue3";

export default {
    layout: App,

    components: {
        Head,
        FormHome,
        TableHome,
    },
    data() {
        return {};
    },

    methods: {},
};
</script>
<style scoped>
.img {
    height: 287px;
    opacity: 0.5;
}

.bot {
    position: absolute;
    bottom: 5%;
}

.card {
    width: 100%;
    display: flex;
    justify-content: center;
}
</style>
