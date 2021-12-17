<template>
    <div class="flex flex-col justify-end">
        <label v-text="label" class="text-xs text-primary font-bold whitespace-nowrap max-w-full flex-shrink"/>
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: "FormGroup",

    props: {
        label: String,
        default: ""
    },
}
</script>

<style scoped>

</style>
