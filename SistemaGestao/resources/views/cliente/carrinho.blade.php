<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIONANDRE - COMPANY</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
            font-family: sans-serif;
            color: black;
        }

        header{
            width: 100%;
            height: 15vh;
            border: 1px solid black;
            padding: 3%;
        }

        body{
            height: 85vh;
            width: 100dvw;
        }

        main{
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        table{
            border: 1px solid black;
            width: 100%;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 15px;
        }

        th, td{
            border-collapse: collapse;
        }

        div{
            width: 100%;
            height: auto;
            padding: 2%;
            text-align: end;
        }

        form{
            height: 40vh;
            padding: 2%;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            text-align: start;
        }

        @media(max-width: 768px){

            header{
                padding: 10%;
            }

            .alter{
                margin-bottom: 0.5rem;
            }

            .category{
                display: none;
            }

        }
        
    </style>
</head>
<body>
    <header>
        <h3><a href="{{ route('loja') }}">Voltar</a></h3>
    </header>

    @if (session('success'))

        <div style="width: 100%; height: 10vh; background: linear-gradient(97deg, rgb(133, 249, 133), rgb(161, 247, 161), transparent, transparent);
        border-radius: 5px; margin: 10px; padding: 2%; text-align: start;">
            <h3>{{ session('success') }}</h3>
        </div>
        
    @elseif(session('error'))

        <div style="width: 100%; height: 10vh; background: linear-gradient(97deg, rgba(239, 106, 106, 1), rgba(241, 145, 145, 1), transparent, transparent);
        border-radius: 5px; margin: 10px; padding: 2%; text-align: start;">
            <h3>{{ session('error') }}</h3>
        </div>

    @endif

    <main>
        <div style="width: 95%; height: 80vh;">
            <table>
                <caption>CARRINHO DE COMPRAS</caption>
                <tr>
                    <th>Produto</th>
                    <th class="category">Categoria</th>
                    <th>Quantidade</th>
                    <th>Acções</th>
                </tr>
                @forelse ($items as $item )

                    <tr>
                        <td>{{ $item->produto->name }}</td>
                        <td class="category">{{ $item->produto->categoria->name }}</td>
                        <td>{{ $item->quantidade }}</td>
                        <td>
                            <button style="padding: 1% 2%; border: 1px solid black; background-color: gold; border-radius: 5px;" class="alter">
                                <a href="{{ route('alterForm', $item->produto->id) }}">Alterar</a>
                            </button>

                            <form action="{{ route('deleteItem', $item->id) }}" method="POST" style="width: 45%; display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Remover" style="padding: 1% 2%; border: 1px solid black; background-color: red; border-radius: 5px;">
                            </form>
                        </td>
                    </tr>

                @empty

                <h1 style="color: red; text-align: center;">Nada Adicionado Ao Carrinho</h1>
                <br>
                <br>
                    
                @endforelse
            </table>

            @if (is_object($carrinho))

                @if ( $carrinho->total != null)

                    <div>
                        <h2>Total: {{ number_format($carrinho->total, 2, ',','.') }}kz</h2>
                    </div>

                @endif
            
            @else

                <div style="display: none;">
                    <h2>Total: {{ ($carrinho) }}kz</h2>
                </div>

            @endif

            <form action="{{ route('encomendar') }}" method="POST">
                @csrf

                <span style="color: red;">
                    Atenção: Caso queira uma entrega ao domicílio, informe o seu endereço a baixo. <br>
                    Caso deseje levantar o(s) produto(s) em uma das nossas lojas, deixe o campo a 
                    baixo em branco!
                </span>

                <label for="adress">Endreço De Entrega</label>
                <textarea name="endereco" id="adress" placeholder="Informe aqui seu endereço" rows="5"></textarea>

                <button type="submit" style="height: 20%; width: 25%; border: 1px solid black; background-color: goldenrod; border-radius: 5px;">Finalizar Compra</button>

            </form>
            
        </div>
    </main>
</body>
</html>