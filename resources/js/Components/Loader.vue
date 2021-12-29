<template>
    <div class="loader" >
        <img src="/images/loader.gif"/>
    </div>
</template>

<script>
export default {
}
</script>

<style scoped>
    .loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100vw;
        height: 100vh;
        z-index: 9999;
        background-color: #ffffffcf;
    }
    .loader img{
        position: relative;
        margin: 0px auto;
        padding: 8rem;
        width: 60%;
        max-width: 800px;
        max-height: 800px;
    }
</style>