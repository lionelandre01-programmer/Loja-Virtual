@extends('layout.header')

@section('content')

    <div class="category">
        <button style="width: 30%;">
            <a href="{{ route('joias_masc') }}" style="color: black;">Joías Masculinas</a>
        </button>

        <button style="width: 30%;">
            <a href="{{ route('joias_femi') }}" style="color: black;">Joías Femininas</a>
        </button>

        <button style="width: 30%;">
            <a href="{{ route('joias') }}" style="color: black;">Todas as Joías</a>
        </button>
    </div>

    <div class="produtos" style="margin-top: 8%;">

        @forelse ( $produtos as $produto )

        <div class="one_produto">
            <div class="image">
                <img src="{{ asset('imagens/img_product/'.$produto->image) }}" alt="Imagem do Produto">
            </div>

            <div class="content-image">
                <p>Código: {{ $produto->id }}</p>
                <p>Produto: {{ $produto->name }}</p>
                <p>Preço: {{ number_format($produto->price, 2, ',','.') }}kz</p>
            </div>
            <div class="btn-produto">
                <button style="background-color: aliceblue;">Ver</button>
                <button style="background-color: goldenrod;">Editar</button>
                <button style="background-color: red;">Eliminar</button>
            </div>

        </div>

        @empty

        <h1>Lista Vazia</h1>
            
        @endforelse

    </div>

@endsection