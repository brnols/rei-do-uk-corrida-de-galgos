<template>
    <q-table
        class="px-4 py-8 shadow-xl tabela"
        color="primary"
        :rows="$page.props.indicadores"
        :columns="columns"
        row-key="name"
        rows-per-page-options="6"
        hide-pagination
    >
        <template v-slot:top>
            <h2 class="text-xs font-bold text-primary">Participantes</h2>
        </template>

        <template v-slot:header="props">
            <q-tr :props="props">
                <q-th
                    v-for="col in props.cols"
                    :key="col.name"
                    :props="props"
                    class="text-primary font-bold"
                >
                    {{ col.label }}
                </q-th>
            </q-tr>
        </template>

        <template v-slot:body-cell-trap="props">
            <q-td :props="props">
                <img :src="`/images/${props.row.ordem}.png`"/>
            </q-td>
        </template>

        <template v-slot:body-cell-canil="props">
            <q-td style="background-color: white" :props="props">
                <q-btn
                    @click="dialog = true"
                    size="sm"
                    color="primary"
                    round
                    dense
                    icon="add"
                />
            </q-td>
        </template>

        <template v-slot:body-cell-sexo="props">
            <q-td :props="props">
                <img
                    v-if="props.row.metricas.sexo == 'Macho'"
                    src="/images/el_male.png"
                />
                <img v-else src="/images/el_female.png"/>
            </q-td>
        </template>

        <template v-slot:body-cell-idade="props">
            <q-td :props="props">
                {{ props.row.metricas.idade }}
            </q-td>
        </template>

        <template v-slot:body-cell-linhagem="props">
            <q-td :props="props">
                {{ props.row.metricas.pedigree }}
            </q-td>
        </template>

        <template v-slot:body-cell-treinador="props">
            <q-td :props="props">
                {{ props.row.metricas.treinador }}
            </q-td>
        </template>

        <template v-slot:body-cell-races="props">
            <q-td :props="props">
                {{ props.row.metricas.qtde_corridas }}
            </q-td>
        </template>

        <template v-slot:body-cell-galgo="props">
            <q-td class="flex justify-center bg-light" :props="props">
                <q-icon
                    :class="[props.row.ordem == icone_show ? color : 'text-dark']"
                    class="cursor"
                    @click="ativar(props.row.ordem)"
                    name="far fa-eye"
                />
                <q-icon
                    :class="[
            this.items.indexOf(props.row.ordem) == -1
              ? 'text-dark'
              : 'text-red',
          ]"
                    class="cursor ml-2"
                    @click="ocultar(props.row.ordem)"
                    name="far fa-eye-slash"
                />
            </q-td>
        </template>

        <template v-slot:body-cell-icon="props">
            <q-td :props="props">
                <img :src="`/images/galgo${props.row.ordem}.png`"/>
            </q-td>
        </template>
    </q-table>

    <q-dialog
        v-model="dialog"
        persistent
        transition-show="scale"
        transition-hide="scale"
    >
        <q-card class="card-dialog">
            <q-card-section class="row items-center q-py-none">
                <q-space/>
                <q-btn icon="close" flat round dense v-close-popup/>
            </q-card-section>
            <q-banner v-if="$page.props.flash.success" class="bg-success">
                {{ $page.props.flash.success }}
            </q-banner>
            <q-banner v-if="$page.props.flash.error" class="bg-error">
                {{ $page.props.flash.error }}
            </q-banner>
            <q-card-section>
                <h2 class="font-bold text-h6 text-primary">Adicionar ao Canil</h2>
                <p class="text-dark">Adicionar galgo ao seu canil</p>
            </q-card-section>

            <q-card-section>
                <label class="text-primary" for="nome">
                    Nome do Galgo
                </label>
                <q-input
                    v-model="form.galgo"
                    id="nome"
                    class="bg-light"
                    dense
                    filled
                    placeholder="Escreva o nome do Galgo"
                    :error="!!errors.galgo"
                    :error-message="errors.galgo"
                    @input="errors.galgo = null"
                >
                </q-input>
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
                    placeholder="Escreva o comentário sobre o Galgo"
                >
                </q-input>
            </q-card-section>

            <q-card-actions align="center" class="flex-column">
                <q-btn
                    class="bg-primary text-white font-bold btn"
                    label="Guardar"
                    @click="submit"
                    :disable="!form.galgo"
                />
                <Link class="text-primary" :href="route('canil.index')" target="_blank">
                    Ir para seu canil
                </Link>
            </q-card-actions>
        </q-card>
    </q-dialog>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";

export default {

    props: ['indicadores'],

    components: {
        Link,
    },

    data() {
        return {
            columns    : [
                {
                    name : "trap",
                    label: "Trap",
                    align: "left",
                    field: "trap",
                },
                {
                    name : "canil",
                    label: "Canil",
                    field: "canil",
                    align: "left",
                },
                {
                    name : "nome",
                    label: "Nome",
                    field: "nome",
                    align: "left",
                },
                {
                    name : "sexo",
                    label: "Sexo",
                    field: "sexo",
                    align: "left"
                },
                {
                    name : "idade",
                    label: "Idade",
                    field: "idade",
                    align: "left"
                },
                {
                    name : "linhagem",
                    label: "Linhagem",
                    field: "linhagem",
                    align: "center"
                },
                {
                    name : "treinador",
                    label: "Treinador",
                    field: "treinador"
                },
                {
                    name : "races",
                    label: "Races",
                    field: "races",
                },
                {
                    name : "galgo",
                    label: "Vizualisar Galgo",
                    field: "galgo",
                },
                {
                    name: "icon",
                },
            ],
            dialog     : false,
            items      : [],
            icone_show : null,
            color      : "",
            currentItem: null,
            disabled   : false,
            form       : this.$inertia.form({
                pista     : this.$page.props.pista.nome,
                tabela    : this.$page.props.pista.tabela,
                nome      : "",
                galgo     : "",
                observacao: "",
            }),
        }
    },

    computed: {
        errors() {
            return this.$page.props.errors
        }
    },

    methods: {
        ativar(i) {
            if (this.icone_show != i) {
                this.color = "text-red";
                this.$emit("enviar", {
                    disabled: true,
                    index   : i,
                    items   : this.items,
                });
            } else {
                this.color = "text-dark";
                this.$emit("enviar", {
                    disabled: false,
                    index   : i,
                    items   : this.items,
                });
            }
            this.icone_show = i;
        },

        ocultar(i) {
            let index = this.items.indexOf(i);
            this.currentItem = i;
            if (this.items.indexOf(i) == -1) {
                this.items.push(i);
                this.icone_show = null;
            } else {
                this.items.splice(index, 1);
                this.currentItem = null;
            }

            this.$emit("enviar", {disabled: false, index: i, items: this.items});
        },

        submit() {
            this.form.post(this.route('canil.store'))
        }
    },
};
</script>

<style>
.tabela {
    background: #eff3f8;
    border-radius: 20px;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
    0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.tabela td {
    background: white !important;
    border-bottom-width: 8px !important;
    border-color: #eff3f8;
}

.q-table tr {
    border-color: #eff3f8;
}

.card-dialog {
    max-width: 650px;
    width: 100%;
    border-radius: 30px;
    background: #eff3f8;
    padding: 20px;
}

.mt {
    padding-top: 20px;
}

.btn {
    padding: 10px 20px !important;
    border-radius: 30px;
    margin-bottom: 10px;
}

.flex-column {
    flex-direction: column;
}

.bg {
    background: #eff3f8;
}
</style>
