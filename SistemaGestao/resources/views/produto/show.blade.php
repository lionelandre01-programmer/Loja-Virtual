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
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .div-main{
            width: 60%;
            height: 70%;
            padding: 2%;
            border: 1px solid black;
            border-radius: 5px;
            background-color: aliceblue;
        }

        .divSub-main{
            height: 50%;
            width: 100%;
            display: flex;
        }

        .image{
            width: 40%;
            height: 100%;
            overflow: hidden;
            border-radius: 5px;
        }

        img{
            width: 100%;
            height: 100%;
        }

        .text{
            width: 90%;
            height: 100%;
            padding: 5%;
        }

        form{
            width: 60%;
            height: 20%;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            gap: 5%;
            padding: 2%;
            border: 1px solid black;
            border-radius: 5px;
        }

        button{
            background-color: goldenrod;
            border: 1px solid black;
            border-radius: 5px;
            padding: 1%;
        }

        @media(max-width: 768px){

            header{
                padding: 10%;
            }

            .div-main, form{
                width: 90%;
            }

        }
        
    </style>
</head>
<body>
    <header>
        <h3><a href="{{ route('loja') }}">Voltar</a></h3>
    </header>

    <main>

        <div class="div-main">

            <div class="divSub-main">
                <div class="image">
                    <img src="{{ asset('imagens/img_product/'.$produto->image) }}" alt="Imagem do Produto">
                </div>

                <div class="text" style="width: 60%;">
                    <h3>Código: {{ $produto->id }}</h3>
                    <h3>Produto: {{ $produto->name }}</h3>
                    <h3>Preço: {{ number_format($produto->price, 2, ',','.') }}kz</h3>
                    <h3>Categoria: {{ $produto->category }}</h3>
                    <h3>Gênero: {{ $produto->genero }}</h3>
                </div>
            </div>
            
            <div class="divSub-main">
                <div class="text" style="text-align: center;">
                    <h2>Descrição Do Produto</h2>
                    <br>
                    <h3> {{ $produto->description }} </h3>
                </div>
            </div>
        
        </div>
        
        @if (Auth::user()->role == 'cliente')
            
            <form action="{{ route('adicionar', Auth::user()->id) }}" method="POST">
                @csrf

                <input type="hidden" name="produto" value="{{ $produto->id }}" readonly>

                <label for="quantidade">Quandidade a Comprar</label>
                <input type="number" name="quantidade" id="quantidade" min="1" max="10" value="1" required>

                <button type="submit">Comprar</button>

            </form>
            
        @endif

    </main>
</body>
</html>