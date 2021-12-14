<template>
  <div class="container">
    <section>
      <div class="grid grid-curso">
        <h1 class="text-[48px] text-primary font-bold">Navegando no site</h1>
        <button class="flex text-light p-4 items-center justify-between">
          <div class="flex flex-col items-start">
            <span>Curso de</span>
            <span class="text-[22px] block text-light font-bold"
              >Galgo vencedor</span
            >
          </div>
          <img src="/images/casa.svg" alt="casa" />
        </button>
        <div class="card">
          <iframe
            class="w-[100%] h-[100%]"
            src="https://www.youtube.com/embed/m8QESxCjUH4"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
        <div class="card">
          <iframe
            class="w-[100%] h-[100%]"
            src="https://www.youtube.com/embed/dYHeotRsBxQ"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
        <div class="card">
          <iframe
            class="w-[100%] h-[100%]"
            src="https://www.youtube.com/embed/9dc6258Jgtk"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
        <div class="card">
          <iframe
            class="w-[100%] h-[100%]"
            src="https://www.youtube.com/embed/QXw3dJRHyMY"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: "Cursos",
};
</script>

<style scoped>
.card {
  height: 21rem;
  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  border-radius: 1rem;
  overflow: hidden;
}

.container-cards {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-gap: 1rem;
  justify-content: center;
  border-radius: 20px 20px 0px 0px;
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
