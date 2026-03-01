@extends('layout.header')

@section('content')

<!-- Header Actions -->
<div class="header-actions">
    <div class="header-title">
        <span>🛍️</span>
        <span>Catálogo de Produtos</span>
    </div>
    <div class="action-buttons">
        @if (Auth::user()->role != 'cliente')
            <a href="{{ route('create') }}" class="btn-action">
                <span>➕</span>
                <span>Novo Produto</span>
            </a>
        @endif
        <a href="{{ route('encomendas') }}" class="btn-action secondary">
            <span>📦</span>
            <span>Minhas Encomendas</span>
        </a>
    </div>
</div>

<!-- Alerts -->
@if (session('success'))
    <div class="alert-container">
        <div class="alert alert-success">
            <div class="alert-icon"></div>
            <span>{{ session('success') }}</span>
        </div>
    </div>
@elseif(session('error'))
    <div class="alert-container">
        <div class="alert alert-error">
            <div class="alert-icon"></div>
            <span>{{ session('error') }}</span>
        </div>
    </div>
@endif

<!-- Produtos -->
<div class="produtos-container">
    <div class="produtos-header">
        <div class="produtos-title">
            📋 Produtos Disponíveis
        </div>
        <div class="filter-sort">
            <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option value="">🔀 Ordenar</option>
                <option value="">Mais Recentes</option>
                <option value="">Preço: Menor para Maior</option>
                <option value="">Preço: Maior para Menor</option>
                <option value="">Mais Populares</option>
            </select>
        </div>
    </div>

    <div class="produtos">
        @forelse ( $produtos as $produto )
            <div class="one_produto">
                <div class="image">
                    <img src="{{ asset('imagens/img_product/'.$produto->image) }}" alt="{{ $produto->name }}">
                </div>

                <div class="content-image">
                    <p>Código: {{ $produto->id }}</p>
                    <p>{{ $produto->name }}</p>
                    <p>{{ number_format($produto->price, 2, ',', '.') }}kz</p>
                </div>

                @if (Auth::user()->role == 'cliente')
                    <div class="produto-actions">
                        <form action="{{ route('adicionar') }}" method="POST" style="width: 100%;">
                            @csrf
                            <input type="hidden" name="produto" value="{{ $produto->id }}" readonly>
                            <input type="hidden" id="quantidade" name="quantidade" value="1" readonly>
                            <button type="submit" class="btn-comprar">🛒 Adicionar ao Carrinho</button>
                        </form>
                        <a href="{{ route('show', $produto->id) }}" class="btn-detalhes">Ver Detalhes</a>
                    </div>
                @else
                    <div class="btn-produto">
                        <a href="{{ route('show', $produto->id) }}">👁️ Ver</a>
                        <a href="{{ route('edit', $produto->id) }}">✏️ Editar</a>
                        <form action="{{ route('destroy', $produto->id) }}" method="POST" style="width: 100%; display: block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja eliminar este produto?')" style="background-color: red;">🗑️ Eliminar</button>
                        </form>
                    </div>
                @endif
            </div>
        @empty
            <div class="empty-state" style="grid-column: 1 / -1;">
                <div class="empty-state-icon">📭</div>
                <h1>Nenhum Produto Disponível</h1>
                <p>Volte mais tarde para ver nossos produtos</p>
            </div>
        @endforelse
    </div>
</div>

@endsection
