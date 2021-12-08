<template>
    <q-header class="bg-white text-primary" elevated="$q.platform.is.mobile" >
        <q-toolbar class="container q-py-sm flex justify-between">

            <q-toolbar>
                <img class="w-14 sm:w-24" src="/images/logo.png" alt="logo"/>
                <q-toolbar-title class="sm:hidden font-bold">
                    Rei do UK
                </q-toolbar-title>
            </q-toolbar>

            <!-- menu mobile -->
            <nav class="lg:hidden">
                <q-btn flat round color="primary" icon="fas fa-bars">
                    <q-menu>
                        <q-list>
                            <q-item clickable v-close-popup v-for="item in items" :key="item.name" v-show="item.show">
                                <q-item-section
                                    v-text="item.name"
                                    @click="item.action()"
                                ></q-item-section>
                            </q-item>
                        </q-list>
                    </q-menu>
                </q-btn>
            </nav>
            <!-- fim menu mobile -->

            <nav class="hidden lg:block">
                <q-btn
                    v-for="item in items"
                    :key="item.name"
                    v-show="item.show"
                    class="text-primary normal-case"
                    :label="item.name"
                    @click="item.action()"
                    flat
                />
            </nav>

        </q-toolbar>
    </q-header>
</template>

<script>
export default {
    name: "TheHeader",

    computed: {
        authenticated : function () {
            return !!this.$page.props.auth.user
        },

        items: function () {
            return [
                {
                    name  : 'Teste Agora os Produtos',
                    action: () => this.$inertia.visit(this.route('dashboard')),
                    show  : !this.authenticated
                },
                {
                    name  : 'Planos e Valores',
                    action: () => this.$inertia.visit(this.route('planos')),
                    show  : !this.authenticated
                },
                {
                    name  : 'Início',
                    action: () => this.$inertia.visit(this.route('dashboard')),
                    show  : this.authenticated
                },
                {
                    name  : 'Filtros',
                    action: () => this.$inertia.visit(this.route('dashboard')),
                    show  : this.authenticated
                },
                {
                    name  : 'Área do cliente',
                    action: () => this.$inertia.visit(this.route('dashboard')),
                    show  : this.authenticated
                },
                {
                    name  : 'Meu Canil',
                    action: () => this.$inertia.visit(this.route('dashboard')),
                    show  : this.authenticated
                },
                {
                    name  : 'Transmissões ao vivo',
                    action: () => this.$inertia.visit(this.route('dashboard')),
                    show  : this.authenticated
                },
                {
                    name  : 'Curso (Free)',
                    action: () => this.$inertia.visit(this.route('cursos')),
                    show  : true
                },
                {
                    name  : 'Logout',
                    action: () => this.$inertia.post(this.route('logout')),
                    show  : this.authenticated
                },
            ]
        }
    },
}
</script>

<style scoped>

</style>
