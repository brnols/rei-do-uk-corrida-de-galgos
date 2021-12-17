<template>
  <Head title="Curso" />

  <div class="container pb-20">
    <section>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <h1 class="text-[28px] sm:text-[48px] text-primary font-bold">
          Navegando no site
        </h1>

        <div
          class="
            shadow-2xl
            py-8
            px-4
            bg-secondary
            sm:justify-center
            md:justify-around
            text-white
            flex
            lg:flex-nowrap
            rounded-md
          "
        >
          <div>
            Faça seu cruso de
            <h2 class="text-5xl font-bold">Galgo Vencedor</h2>
          </div>

          <q-img style="width: 151px" src="/images/casa.svg" />
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8">
        <template v-for="(video, index) in videos" :key="index">
          <div class="card rounded-3xl pb-8">
            <div class="card-frame">
              <iframe
                class="w-[100%] h-[100%] rounded-t-3xl"
                :src="video.url"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
              ></iframe>
            </div>
            <h3
              class="text-[20px] text-center px-1 leading-normal text-primary"
            >
              {{ video.title }}
            </h3>
          </div>
        </template>
      </div>
    </section>
  </div>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
export default {
  name: "Cursos",

  components: {
    Head,
  },

  data() {
    return {
      videos: [
        {
          url: "https://www.youtube.com/embed/m8QESxCjUH4",
          title: "Navegando no site - Navegação Básica no TK Galgos",
        },
        {
          url: "https://www.youtube.com/embed/dYHeotRsBxQ",
          title: "Aula 01 - Mercado US - Análise com TK Galgos",
        },
        {
          url: "https://www.youtube.com/embed/9dc6258Jgtk",
          title: "Aula 02 - Mercado Us (Palm 1 18/06/2020)",
        },
        {
          url: "https://www.youtube.com/embed/QXw3dJRHyMY",
          title: "Navegando no site - Navegação Básica no TK Galgos",
        },
      ],
    };
  },
};
</script>

<style scoped>
.card {
  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  border-radius: 1rem;
  background: #eff3f8;
}
.card-frame {
  height: 21rem;
}

.grid-curso {
  grid-template-columns: 30rem 30rem;
  gap: 2rem;
  align-items: center;
}

button {
  background: #da0627;
  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  border-radius: 5px;
  height: 5rem;
}
</style>
