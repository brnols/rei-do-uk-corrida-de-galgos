@extends('layouts.page')

@section('content')
    <section class="container">
        <img src="{{ asset('images/Cachorros1.svg') }}" alt="cachorros" class="mt-10">
        <div class="flex  justify-center">
            <img src="{{ asset('images/icons/bandeiracurvada1.svg') }}" alt="bandeiracurvada"
                class="mt-[-315px] mr-[-56px] relative">
            <button class=" mt-[-166px] h-[50px] px-[60px]  md:rounded-[20px] bg-secondary  text-light uppercase;">Acessar
                corridas de galgos</button>
        </div>
        <div>
            <h1 class="flex justify-center text-[50px] text-primary pb-8">Nossos Pilares</h1>
            <h2 class="flex justify-center text-[28px] text-primary pb-12">Entre para a realeza!</h2>
            <p class="flex text-center text-[16px] text-primary bold">Melhor site de corridas inglesas do Brasil, teste
                gratuitamente e comece a lucrar hoje mesmo, tenha acesso a tudo
                que você precisa para dominar esse mercado de galgos.</p>
        </div>
    </section>

    <section class="container">
        <div class="grid pt-16 grid-colunas">
            <span class="numeros">1</span>
            <div>
                <h2 class="text-[32px] text-secondary">Acessível</h2>
                <p class="pt-6 text-[21px] text-dark">Tenha acesso as corridas atualizadas diariamente com todas as
                    informações que você precisa para analisar.
                </p>
            </div>
        </div>
        <div class="grid  pt-16 grid-colunas">
            <span class="numeros">2</span>
            <div>
                <h2 class="text-[32px] text-secondary">Exclusividade</h2>
                <p class="pt-6 text-[21px] text-dark">Obtenha um filtro único que vai te ajudar a trabalhar com top 3, back
                    e placed.</p>
            </div>
        </div>
        <div class="grid pt-16 grid-colunas">
            <span class="numeros">3</span>
            <div>
                <h2 class="text-[32px] text-secondary">Aprendizado</h2>
                <p class="pt-6 text-[21px] text-dark">Você vai receber acesso a um curso completo de como analisar as
                    corridas para AvB, possibilitando a você
                    viver do mercado.</p>
            </div>
        </div>

    </section>

    <section class="container">
        <h1 class="flex justify-center text-[50px] text-primary pb-16 pt-24">Conheça nossos planos</h1>

        <h2 class="text-[32px] text-secondary pb-8">Site de analise</h2>
        <div class="flex gap-4">
            <div class="card">
                <p class="text-secondary">1º mês</p>
                <img src="{{ asset('images/cartao.svg') }}" alt="cartao">
                <p>R$ <span class="text-[55px] text-primary">29,90</span></p>
                <p class="text-primary">• Pagamento com cartão</p>
            </div>
            <div class="card">
                <p class="text-secondary">1º mês</p>
                <img src="{{ asset('images/pix-boleto.svg') }}" alt="pixboleto">
                <p>R$ <span class="text-[55px] text-primary">39,90</span></p>
                <p class="text-primary">• Pagamento com Pix / Boleto</p>
            </div>
            <div class="card">
                <p class="text-secondary">Trimestral</p>
                <img src="{{ asset('images/pix-cartao-boleto.svg') }}" alt="pixcartaoboleto">
                <p>R$ <span class="text-[55px] text-primary">69,90</span></p>
                <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>
            </div>
            <div class="card">
                <p class="text-secondary">Semestral</p>
                <img src="{{ asset('images/boleto-pix-cartao.svg') }}" alt="cartao">
                <p>R$ <span class="text-[55px] text-primary">139,90</span></p>
                <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>
            </div>
        </div>


        <h2 class="text-[32px] text-secondary pt-16 pb-8">Site de análise + Grupo VIP</h2>

        <div class="flex gap-4">
            <div class="card">
                <p class="text-secondary">1º mês</p>
                <img src="{{ asset('images/cartao.svg') }}" alt="cartao">
                <p>R$ <span class="text-[55px] text-primary">97,00</span></p>
                <p class="text-primary">• Pagamento com cartão</p>
            </div>
            <div class="card">
                <p class="text-secondary">1º mês</p>
                <img src="{{ asset('images/pix-boleto.svg') }}" alt="pixboleto">
                <p>R$ <span class="text-[55px] text-primary">109,90</span></p>
                <p class="text-primary">• Pagamento com Pix / Boleto</p>
            </div>
            <div class="card">
                <p class="text-secondary">Trimestral</p>
                <img src="{{ asset('images/pix-cartao-boleto.svg') }}" alt="pixcartaoboleto">
                <p>R$ <span class="text-[55px] text-primary">249,90</span></p>
                <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>
            </div>
            <div class="card">
                <p class="text-secondary">Semestral</p>
                <img src="{{ asset('images/boleto-pix-cartao.svg') }}" alt="cartao">
                <p>R$ <span class="text-[55px] text-primary">499,90</span></p>
                <p class="text-primary">• Pagamento com Pix, boleto ou cartão</p>
            </div>
        </div>
    </section>

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
