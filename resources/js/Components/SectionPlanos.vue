<template>
    <section class="container">
        <h1 class="text-center h4 md:h3 text-primary font-bold leading-10">
            {{ title }}
        </h1>

        <h2 class="mt-8 text-[24px] sm:text-[32px] text-secondary pb-8 font-bold pl-8">
            Site de análise
        </h2>
        <div class="flex gap-4 pr-8 pl-8">
            <div class="card">
                <p class="text-secondary font-bold">1º mês</p>
                <img class="mx-auto" src="/images/cartao.svg" alt="cartao"/>
                <p>
                    R$ <span class="text-[47px] text-primary font-bold">29,90</span>
                </p>
                <p class="text-primary">• Pagamento com cartão</p>
            </div>
            <div class="card">
                <p class="text-secondary font-bold">1º mês</p>
                <img class="mx-auto" src="/images/pix-boleto.svg" alt="pixboleto"/>
                <p>
                    R$ <span class="text-[47px] text-primary font-bold">39,90</span>
                </p>
                <p class="text-primary">• Pagamento com Pix / Boleto</p>
            </div>
            <div class="card">
                <p class="text-secondary font-bold">Trimestral</p>
                <img
                    class="mx-auto"
                    src="/images/pix-cartao-boleto.svg"
                    alt="pixcartaoboleto"
                />
                <p>
                    R$ <span class="text-[47px] text-primary font-bold">69,90</span>
                </p>
                <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>
            </div>
            <div class="card">
                <p class="text-secondary font-bold">Semestral</p>
                <img
                    class="mx-auto"
                    src="/images/boleto-pix-cartao.svg"
                    alt="cartao"
                />
                <p>
                    R$ <span class="text-[47px] text-primary font-bold">139,90</span>
                </p>
                <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>
            </div>
        </div>

        <h2 class="leading-[28px] text-[24px] sm:text-[32px] text-secondary font-bold pl-8">
            Site de análise + Grupo VIP
        </h2>

        <div class="flex gap-4 pr-8 pl-8">
            <div class="card">
                <p class="text-secondary font-bold">1º mês</p>
                <img class="mx-auto" src="/images/cartao.svg" alt="cartao"/>
                <p>
                    R$ <span class="text-[47px] text-primary font-bold">97,00</span>
                </p>
                <p class="text-primary">• Pagamento com cartão</p>
            </div>
            <div class="card">
                <p class="text-secondary font-bold">1º mês</p>
                <img class="mx-auto" src="/images/pix-boleto.svg" alt="pixboleto"/>
                <p>
                    R$ <span class="text-[47px] text-primary font-bold">109,90</span>
                </p>
                <p class="text-primary">• Pagamento com Pix / Boleto</p>
            </div>
            <div class="card">
                <p class="text-secondary font-bold">Trimestral</p>
                <img
                    class="mx-auto"
                    src="/images/pix-cartao-boleto.svg"
                    alt="pixcartaoboleto"
                />
                <p>
                    R$ <span class="text-[47px] text-primary font-bold">249,90</span>
                </p>
                <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>
            </div>
            <div class="card">
                <p class="text-secondary font-bold">Semestral</p>
                <img
                    class="mx-auto"
                    src="/images/boleto-pix-cartao.svg"
                    alt="cartao"
                />
                <p>
                    R$ <span class="text-[47px] text-primary font-bold">499,90</span>
                </p>
                <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>
            </div>
        </div>
    </section>
</template>

<script>
import CardPlanos from "@/Components/CardPlanos";

export default {
    name: "SectionPlanos",

    components: {
        CardPlanos,
    },

    props: {
        title: {
            type   : String,
            default: ""
        },
    },
}
</script>

<style scoped>

</style>
