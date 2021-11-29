<template>
  <div>
    <h2 class="text-xs font-bold text-primary m-4">Participantes</h2>
    <div class="px-4 py-8 shadow-xl tabela c-TableGrid">
      <q-btn 
      v-for="item in items" 
      :key="item" 
      :label="item.label"
      color="white" 
      class="bg-white text-blue-9 text-xs "
      flat
      ></q-btn>
    </div>
  </div>

</template>

<script>


export default {
  name: 'TableMathAvb',

  components: { },

  data: function() {
    return {
      items: [
        {
          label: '1v2'
        },
        {
          label: '1v3'
        },
        {
          label: '1v4'
        },
        {
          label: '1v5'
        },
        {
          label: '1v6'
        },
        {
          label: '2v3'
        },
        {
          label: '2v4'
        },
        {
          label: '2v5'
        },
        {
          label: '2v6'
        },
        {
          label: '3v4'
        },
        {
          label: '3v5'
        },
        {
          label: '3v6'
        },
        {
          label: '4v5'
        },
        {
          label: '4v6'
        },
        {
          label: '5v6'
        },
      ]
    }
  }
};
</script>

<style scoped>
  .c-TableGrid {
    display: grid;
    column-gap: 1rem;
    grid-template-columns: repeat(15, auto);
    overflow-x: auto;
  }
</style>