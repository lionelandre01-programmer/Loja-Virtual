@extends('layout.header')

@section('content')

<div style="display: flex; width: 100%; height: auto; padding: 1%; gap: 2%;">

    @if (Auth::user()->role != 'cliente')

    <button class="btn-cadastrar-produto">
        <a href="{{ route('create') }}" style="color: black;">Cadastrar Produto</a>
    </button>

    @endif

    <button class="btn-cadastrar-produto">
        <a href="{{ route('encomendas') }}" style="color: black;">Ver Encomendas</a>
    </button>

</div>

@if (session('success'))

    <div style="width: 100%; height: 10vh; background: linear-gradient(97deg, rgb(133, 249, 133), rgb(161, 247, 161), transparent, transparent);
    border-radius: 5px; margin-bottom: 10px; padding: 2%;">
        <h3>{{ session('success') }}</h3>
    </div>
    
@elseif(session('error'))

    <div style="width: 100%; height: 10vh; background: linear-gradient(97deg, rgba(239, 106, 106, 1), rgba(241, 145, 145, 1), transparent, transparent);
    border-radius: 5px; margin-bottom: 10px; padding: 2%;">
        <h3>{{ session('error') }}</h3>
    </div>

@endif

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

        @if (Auth::user()->role == 'cliente')
            <form action="{{ route('adicionar') }}" method="POST">
                @csrf
                <input type="hidden" name="produto" value="{{ $produto->id }}" readonly>
                <input type="hidden" id="quantidade" name="quantidade" value="1" readonly>

                <input type="submit" value="Comprar" class="submit">
            </form>
            <h4 style="text-align: end; margin-right: 3%;"><a href="{{ route('show', $produto->id) }}" style="border-bottom: 1px solid black;">Ver Detalhes</a></h4>
            
        @else
        <div class="btn-produto">
            <button style="background-color: aliceblue;">
                <a href="{{ route('show', $produto->id) }}"> Ver </a>
            </button>
            <button style="background-color: goldenrod;">
                <a href="{{ route('edit', $produto->id) }}">Editar</a>
            </button>
            <form action="{{ route('destroy', $produto->id) }}" method="POST" style="width: 30%; display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" style="background-color: red;">Eliminar</button>
            </form>
        </div>
        @endif

    </div>

    @empty

    <h1>Lista Vazia</h1>
        
    @endforelse

</div>

@endsection