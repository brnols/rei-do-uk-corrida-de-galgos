<template>
    <div class="c-Card">
        <p class="text-secondary font-bold">
            {{ title }}
        </p>
        <img class="mx-auto" src="/images/cartao.svg" alt="cartao"/>
        <p>
            R$
            <span class="text-[47px] text-primary font-bold">
                {{  price  }}
            </span>
        </p>
        <p class="text-primary">
            • {{  subtitle  }}
        </p>
    </div>
</template>

<script>
export default {
    name: "CardPlanos",

    props: {
        title   : {
            type   : String,
            default: ""
        },
        price   : {
            type   : String,
            default: ""
        },
        subtitle: {
            type   : String,
            default: ""
        },
    },
}
</script>

<style scoped>
.c-Card {
    border: 0.2px solid #484a4e44;
    box-sizing: border-box;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.26);
    border-radius: 30px;
    padding: 1rem;
    text-align: center;
    flex: 1;
}
</style>
