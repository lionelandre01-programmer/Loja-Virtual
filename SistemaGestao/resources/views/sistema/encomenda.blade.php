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

        @media(max-width: 768px){

            header{
                padding: 10%;
            }

            .alter{
                margin-bottom: 0.5rem;
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
        border-radius: 5px; margin: 10px; padding: 2%;">
            <h3>{{ session('success') }}</h3>
        </div>
        
    @elseif(session('error'))

        <div style="width: 100%; height: 10vh; background: linear-gradient(97deg, rgba(239, 106, 106, 1), rgba(241, 145, 145, 1), transparent, transparent);
        border-radius: 5px; margin: 10px; padding: 2%;">
            <h3>{{ session('error') }}</h3>
        </div>

    @endif

    <main>
        <div style="width: 95%; height: 80vh;">
            <table>
                <caption>TABELA DE ENCOMENDAS</caption>
                <tr>
                    <th>Usuário</th>
                    <th>Estado</th>
                    <th>Acções</th>
                </tr>
                @forelse ($encomendas as $encomenda )

                    <tr>
                        <td>{{ $encomenda->User->first_name }} {{ $encomenda->User->last_name }}</td>
                        <td class="category">{{ $encomenda->estado }}</td>
                        <td>
                            <button style="padding: 1% 2%; border: 1px solid black; background-color: gold; border-radius: 5px;" class="alter">
                                <a href="{{ route('showEncomenda', $encomenda->id) }}">Visualizar</a>
                            </button>

                            <form action="#" method="POST" style="width: 45%; display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Cancelar" style="padding: 1% 2%; border: 1px solid black; background-color: red; border-radius: 5px;">
                            </form>
                        </td>
                    </tr>

                @empty

                <h1 style="color: red; text-align: center;">Nenhum Pedido De Encomenda</h1>
                <br>
                <br>
                    
                @endforelse
            </table>

        </div>
    </main>
</body>
</html>