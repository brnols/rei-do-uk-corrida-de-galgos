@extends('layouts.page')


@section('content')
    <div class="container">
        <section class="p-36">
            <img src="{{ asset('images/icons/rei-do-uk.svg') }}" alt="reidoukicone" class="p-2 h-full pl-8 object-contain">
            <h1 class="flex text-[50px] text-primary lg:pb-16 lg:pt-24 font-bold">Navegando no site</h1>
            <div class="container-cards">
                <div class="card">
                <iframe class="w-[100%] h-[100%]" src="https://www.youtube.com/embed/OR74idpsweg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="card">
                <a href="#"></a>
                </div>
                <div class="card">
                <a href="#"></a>
                </div>
                <div class="card">
                <a href="#"></a>
                </div>
            </div>

        </section>
    </div>
    <style>
    .card{
        height: 30rem;
        width: 30rem;
        border: solid 2px #000;
    }
    .container-cards{
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 1rem;
    }
    </style>
@endsection
