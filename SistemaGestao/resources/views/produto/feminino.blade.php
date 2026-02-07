@extends('layout.header')

@section('content')

    <div class="category">
        <button>
            <a href="{{ route('blusas') }}" style="color: black;">Blusas</a>
        </button>
        <button>
            <a href="{{ route('calcas_femininas') }}" style="color: black;">Calças</a>
        </button>
        <button>
            <a href="{{ route('casacos_femininas') }}" style="color: black;">Casacos</a>
        </button>
        <button>
            <a href="{{ route('chapeus_femininas') }}" style="color: black;">Chapéu</a>
        </button>
        <button>
            <a href="{{ route('calcados_femininas') }}" style="color: black;">Calçados</a>
        </button>
        <button>
            <a href="{{ route('chinelos_femininas') }}" style="color: black;">Chinelos</a>
        </button>
        <button>
            <a href="{{ route('carteiras_femininas') }}" style="color: black;">Carteiras</a>
        </button>
        <button>
            <a href="{{ route('joias_femininas') }}" style="color: black;">Joías</a>
        </button>
        <button>
            <a href="{{ route('mochilas_femininas') }}" style="color: black;">Mochilas</a>
        </button>
        <button>
            <a href="{{ route('macacoes_femininas') }}" style="color: black;">Macacões/ Vestidos</a>
        </button>
    </div>

    <div class="produtos">

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