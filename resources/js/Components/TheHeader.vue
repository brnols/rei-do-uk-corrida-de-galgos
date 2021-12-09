<template>
    <q-header class="bg-white text-primary" elevated="$q.platform.is.mobile" >
        <q-toolbar class="container q-py-sm flex justify-between">

            <q-toolbar>
                <img class="w-14 sm:w-24" src="/images/logo.png" alt="logo"/>
                <q-toolbar-title class="desktop-hide font-bold">
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
                                    :class="{'text-secondary': item.active}"
                                ></q-item-section>
                            </q-item>
                        </q-list>
                    </q-menu>
                </q-btn>
            </nav>
            <!-- fim menu mobile -->

            <q-list class="desktop-only whitespace-nowrap">
                <q-btn
                    v-for="item in items"
                    :key="item.name"
                    v-show="item.show"
                    class="text-primary-dark normal-case"
                    :label="item.name"
                    @click="item.action()"
                    flat
                    :class="{'text-secondary': item.active}"
                />
            </q-list>

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
                    name  : 'Home',
                    action: () => this.$inertia.visit(this.route('welcome')),
                    show  : !this.authenticated,
                    active: this.route().current('welcome')
                },
                {
                    name  : 'Teste Agora os Produtos',
                    action: () => this.$inertia.visit(this.route('dashboard')),
                    show  : !this.authenticated,
                    active: false
                },
                {
                    name  : 'Planos e Valores',
                    action: () => this.$inertia.visit(this.route('planos')),
                    show  : !this.authenticated,
                    active: this.route().current('planos')
                },
                {
                    name  : 'Início',
                    action: () => this.$inertia.visit(this.route('dashboard')),
                    show  : this.authenticated,
                    active: this.route().current('dashboard')
                },
                {
                    name  : 'Filtros',
                    action: () => this.$inertia.visit(this.route('dashboard')),
                    show  : this.authenticated,
                    active: this.route().current('filtros')
                },
                {
                    name  : 'Área do cliente',
                    action: () => this.$inertia.visit(this.route('dashboard')),
                    show  : this.authenticated,
                    active: this.route().current('perfil')
                },
                {
                    name  : 'Meu Canil',
                    action: () => this.$inertia.visit(this.route('dashboard')),
                    show  : this.authenticated,
                    active: this.route().current('canil')
                },
                {
                    name  : 'Transmissões ao vivo',
                    action: () => this.$inertia.visit(this.route('dashboard')),
                    show  : this.authenticated,
                    active: true
                },
                {
                    name  : 'Curso (Free)',
                    action: () => this.$inertia.visit(this.route('cursos')),
                    show  : true,
                    active: this.route().current('cursos')
                },
                {
                    name  : 'Logout',
                    action: () => this.$inertia.post(this.route('logout')),
                    show  : this.authenticated,
                    active: false
                },
            ]
        }
    },
}
</script>

<style scoped>

</style>
