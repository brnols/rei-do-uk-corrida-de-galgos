<template>
  <q-form @submit.prevent="submit">
    <div class="row justify-center px-3 py-4">
      <div class="col-12 col-md-3 px-1">
        <label> Buscar pista</label>
        <q-input dense outlined rounded v-model="form.pista">
          <template v-slot:prepend>
            <q-icon @click="showing = true" name="fas fa-search" />
          </template>
          <q-menu v-model="showing">
            <q-list style="min-width: 200px">
              <q-item
                v-for="pista in pistas"
                :key="pista"
                clickable
                v-close-popup
              >
                <q-item-section @click="form.pista = pista">{{
                  pista
                }}</q-item-section>
              </q-item>
            </q-list>
          </q-menu>
        </q-input>
      </div>
      <div class="col-12 col-md-3 px-1">
        <label> Races</label>
        <q-input dense outlined rounded v-model="text">
          <template v-slot:prepend>
            <q-icon name="fas fa-sync" />
          </template>
        </q-input>
      </div>

      <div class="col-12 col-md-4 px-1">
        <label> Races</label>
        <q-input dense outlined rounded v-model="date">
          <template v-slot:prepend>
            <q-icon name="far fa-calendar-alt" class="cursor-pointer">
              <q-popup-proxy
                cover
                transition-show="scale"
                transition-hide="scale"
              >
                <q-date v-model="date" mask="DD-MM-YYYY HH:mm">
                  <div class="row items-center justify-end">
                    <q-btn v-close-popup label="Close" color="primary" flat />
                  </div>
                </q-date>
              </q-popup-proxy>
            </q-icon>
          </template>

          <template v-slot:append>
            <q-icon name="far fa-clock" class="cursor-pointer">
              <q-popup-proxy
                cover
                transition-show="scale"
                transition-hide="scale"
              >
                <q-time v-model="date" mask="YYYY-MM-DD HH:mm" format24h>
                  <div class="row items-center justify-end">
                    <q-btn v-close-popup label="Close" color="primary" flat />
                  </div>
                </q-time>
              </q-popup-proxy>
            </q-icon>
          </template>
        </q-input>
      </div>

      <div class="col-12 col-md-1 px-1">
        <q-btn
          class="mt-5"
          type="submit"
          color="primary"
          rounded
          label="buscar"
          :loading="form.processing"
          :disabled="form.processing"
        ></q-btn>
      </div>
    </div>
  </q-form>
</template>

<script>
import { ref } from "vue";
export default {
  data() {
    return {
      form: this.$inertia.form({
        pista: "",
        rice: "",
        date: this.date,
      }),
      date: ref(""),
      showing: ref(false),
      pistas: ["Pista 1", "Pista 2", "Pista 3"],
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("login"), {
        onFinish: () => this.form.reset("password"),
      });
    },
  },
};
</script>

<style scoped>
label {
  color: #0342a1;
  font-weight: bold;
}
</style>