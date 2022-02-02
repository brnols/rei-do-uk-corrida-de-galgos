@extends('layouts.page')


@section('content')
    <div class="container">
        <section>
            <h1 class="flex justify-center text-[50px] text-primary mb-12 font-bold">Planos e Valores</h1>

            <h2 class="text-[32px] text-secondary pb-8 font-bold pl-8">Site de análise</h2>
            <div class="flex gap-4">
                <div class="card">
                    <p class="text-secondary font-bold">1º mês</p>
                    <img class="mx-auto" src="{{ asset('images/cartao.svg') }}" alt="cartao">
                    <p>R$ <span class="text-[47px] text-primary font-bold">29,90</span></p>
                    <p class="text-primary">• Pagamento com cartão</p>
                </div>
                <div class="card">
                    <p class="text-secondary font-bold">1º mês</p>
                    <img class="mx-auto" src="{{ asset('images/pix-boleto.svg') }}" alt="pixboleto">
                    <p>R$ <span class="text-[47px] text-primary font-bold">39,90</span></p>
                    <p class="text-primary">• Pagamento com Pix ou Boleto</p>
                </div>
                <div class="card">
                    <p class="text-secondary font-bold">Trimestral</p>
                    <img class="mx-auto" src="{{ asset('images/pix-cartao-boleto.svg') }}" alt="pixcartaoboleto">
                    <p>R$ <span class="text-[47px] text-primary font-bold">69,90</span></p>
                    <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>
                </div>
                <div class="card">
                    <p class="text-secondary font-bold">Semestral</p>
                    <img class="mx-auto" src="{{ asset('images/boleto-pix-cartao.svg') }}" alt="cartao">
                    <p>R$ <span class="text-[47px] text-primary font-bold">139,90</span></p>
                    <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>
                </div>
            </div>


            <h2 class="text-[32px] text-secondary pt-16 pb-8 font-bold pl-8">Site de análise + Grupo VIP</h2>

            <div class="flex gap-4">
                <div class="card">
                    <p class="text-secondary font-bold">1º mês</p>
                    <img class="mx-auto" src="{{ asset('images/cartao.svg') }}" alt="cartao">
                    <p>R$ <span class="text-[47px] text-primary font-bold">97,00</span></p>
                    <p class="text-primary">• Pagamento com cartão</p>
                </div>
                <div class="card">
                    <p class="text-secondary font-bold">1º mês</p>
                    <img class="mx-auto" src="{{ asset('images/pix-boleto.svg') }}" alt="pixboleto">
                    <p>R$ <span class="text-[47px] text-primary font-bold">109,90</span></p>
                    <p class="text-primary">• Pagamento com Pix ou Boleto</p>
                </div>
                <div class="card">
                    <p class="text-secondary font-bold">Trimestral</p>
                    <img class="mx-auto" src="{{ asset('images/pix-cartao-boleto.svg') }}" alt="pixcartaoboleto">
                    <p>R$ <span class="text-[47px] text-primary font-bold">249,90</span></p>
                    <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>
                </div>
                <div class="card">
                    <p class="text-secondary font-bold">Semestral</p>
                    <img class="mx-auto" src="{{ asset('images/boleto-pix-cartao.svg') }}" alt="cartao">
                    <p>R$ <span class="text-[47px] text-primary font-bold">499,90</span></p>
                    <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>
                </div>
            </div>
        </section>
    </div>
    <style>
        .numeros {
            font-size: 13rem;
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: #484A4E;
            color: #fff;
            font-weight: 700;
            opacity: 0.4;
            line-height: 0.75;

        }

        .grid-colunas {
            grid-template-columns: 10rem auto;
        }

        .card {
            border: 0.2px solid #484A4E;
            box-sizing: border-box;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 30px;
            padding: 1rem;
            text-align: center;
            flex: 1;
        }

    </style>
@endsection
