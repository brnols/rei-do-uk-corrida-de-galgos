<template>
    <base-card>
        <q-btn-group unelevated class="flex items-stretch justify-center flex-wrap gap-2">
            <q-btn
                v-for="(item, index) in items"
                :key="index"
                :label="item.label"
                @click="selectOption(item, index)"
                class="normal-case rounded w-14"
                :class="[activeOption === index
                    ? ['text-white', 'bg-primary']
                    : ['text-primary', 'bg-white']
                ]"
            ></q-btn>
        </q-btn-group>
    </base-card>
</template>

<script>
export default {
    name: 'AvbOptions',

    props: ['modelValue'],

    data: function () {
        return {
            activeOption: null,

            items: [
                {
                    label: '1v2',
                    value: [1, 2]
                },
                {
                    label: '1v3',
                    value: [1, 3]
                },
                {
                    label: '1v4',
                    value: [1, 4]
                },
                {
                    label: '1v5',
                    value: [1, 5]
                },
                {
                    label: '1v6',
                    value: [1, 6]
                },
                {
                    label: '2v3',
                    value: [2, 3]
                },
                {
                    label: '2v4',
                    value: [2, 4]
                },
                {
                    label: '2v5',
                    value: [2, 5]
                },
                {
                    label: '2v6',
                    value: [2, 6]
                },
                {
                    label: '3v4',
                    value: [3, 4]
                },
                {
                    label: '3v5',
                    value: [3, 5]
                },
                {
                    label: '3v6',
                    value: [3, 6]
                },
                {
                    label: '4v5',
                    value: [4, 5]
                },
                {
                    label: '4v6',
                    value: [4, 6]
                },
                {
                    label: '5v6',
                    value: [5, 6]
                },
            ]
        }
    },

    methods: {
        selectOption(item, index) {
            this.setActive(index);
            this.updateValue(item.value);
        },

        setActive(index) {
            this.activeOption = index;
        },

        updateValue(value) {
            this.$emit('update:modelValue', value)
        }
    },
};
</script>
