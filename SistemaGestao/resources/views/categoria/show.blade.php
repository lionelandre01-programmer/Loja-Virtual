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

        }
        
    </style>
</head>
<body>
    <header>
        <h3><a href="{{ route('loja') }}">Voltar</a></h3>
    </header>

    <main>
        <div style="width: 95%; height: 80vh;">
            <table>
                <caption>CATEGORIAS</caption>
                <tr>
                    <th>Categoria</th>
                    <th>Acções</th>
                </tr>
                @forelse ($categorias as $categoria )

                    <tr>
                        <td>{{ $categoria->name }}</td>
                        <td>
                            <button style="padding: 1% 2%; border: 1px solid black; background-color: gold; border-radius: 5px;">
                                <a href="#">Alterar</a>
                            </button>

                            <button style="padding: 1% 2%; border: 1px solid black; background-color: red; border-radius: 5px;">
                                <a href="#">Remover</a>
                            </button>
                        </td>
                    </tr>

                @empty

                <h1 style="color: red; text-align: center;">Nenhuma Categoria Cadastrada</h1>
                <br>
                <br>
                    
                @endforelse
            </table>

            <div style="width: 100%; height: 5vh; display: flex; justify-content: end;">
                <button style="height: 100%; width: 20%; border: 1px solid black; background-color: goldenrod; border-radius: 5px;">Finalizar Compra</button>
            </div>
        </div>
    </main>
</body>
</html>