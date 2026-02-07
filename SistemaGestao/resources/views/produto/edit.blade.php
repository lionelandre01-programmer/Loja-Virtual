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

        form{
            width: 50%;
            height: 95%;
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            justify-content: space-evenly;
            padding: 2%;
            border-radius: 8px;
        }

        form input, form select{
            height: 10%;
        }

        textarea{
            height: 15%;
        }

        div{
            width: 100%;
            height: 30%;
            display: flex;
            align-items: center;
            justify-content: end;
            padding: 2%;
            gap: 2%;
        }

        .image{
            width: 25%;
            height: 100%;
            overflow: hidden;
            border-radius: 5px;
            padding: 0;
            border: 2px solid black;
        }

        img{
            width: 100%;
            height: 100%;
        }

        @media(max-width: 768px){

            form{
                width: 80%;
            }

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
        <form action="{{ route('update', $produto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <h2>Imagem Actual Do Produto: {{ $produto->name }}</h2>
                <div class="image"><img src="{{ asset('imagens/img_product/'.$produto->image) }}" alt="Imagem do produto"></div>
            </div>
            <label for="name">Produto</label>
            <input type="text" name="name" id="name" value="{{ $produto->name }}" required>
            
            <label for="price">Preço</label>
            <input type="number" name="price" id="price" value="{{ $produto->price }}" required>

            <label for="genero">Gênero</label>
            <select name="genero" id="genero">
                <option value="masculino" @if($produto->genero == 'masculino') selected @endif>Masculino</option>
                <option value="feminino" @if($produto->genero == 'feminino') selected @endif>Feminino</option>
            </select>

            <label for="category">Categoria</label>
            <select name="category" id="category">
                <option value="acessório" @if($produto->category == 'acessório') selected @endif>Acessório</option>
                <option value="calça" @if($produto->category == 'calça') selected @endif>Calça</option>
                <option value="camisa" @if($produto->category == 'camisa') selected @endif>Camisa</option>
                <option value="carteira" @if($produto->category == 'carteira') selected @endif>Carteira</option>
                <option value="chinelo" @if($produto->category == 'chinelo') selected @endif>Chinelo</option>
                <option value="joia" @if($produto->category == 'joia') selected @endif>Joía</option>
                <option value="chapeu" @if($produto->category == 'chapeu') selected @endif>Chapéu</option>
                <option value="calçado" @if($produto->category == 'calçado') selected @endif>Calçado</option>
                <option value="mochila" @if($produto->category == 'mochila') selected @endif>Mochila</option>
                <option value="blusa" @if($produto->category == 'blusa') selected @endif>Blusa</option>
                <option value="casaco" @if($produto->category == 'casaco') selected @endif>Casaco</option>
                <option value="vestido" @if($produto->category == 'vestido') selected @endif>Vestido</option>
                <option value="macacao" @if($produto->category == 'macacao') selected @endif>Macacão</option>
            </select>

            <label for="description">Descrição</label>
            <textarea name="description" id="description">{{ $produto->description }}</textarea>

            <label for="image">Alterar Imagem</label>
            <input type="file" id="image" name="image" value="{{ $produto->image }}">

            <input type="submit" style="background-color: aliceblue; border: 1px solid black;">
        </form>
    </main>
</body>
</html>