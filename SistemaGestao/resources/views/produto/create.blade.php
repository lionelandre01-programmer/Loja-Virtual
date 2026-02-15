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
            height: 80%;
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            justify-content: space-evenly;
            padding: 2%;
            border-radius: 8px;
        }

        form input, form select{
            height: 8%;
        }

        textarea{
            height: 15%;
        }

        div{
            width: 100%;
            height: auto;
            display: flex;
            gap: 5%;
            padding: 1%;
        }

        button{
            padding: 1%;
            margin-bottom: 2%;
            border-radius: 0.5rem;
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

    <div>
        <button>
            <a href="{{ route('createCategoria') }}" style="color: black;">Cadastrar Categoria</a>
        </button>

        <button>
            <a href="{{ route('showCategoria') }}" style="color: black;">Visualizar Categorias</a>
        </button>
    </div>

    <main>

        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Produto</label>
            <input type="text" name="name" id="name" required>
            
            <label for="price">Preço</label>
            <input type="number" name="price" id="price" required>

            <label for="quantity">Quantidade</label>
            <input type="number" name="quantity" id="quantity" min="1" required>

            <label for="genero">Gênero</label>
            <select name="genero" id="genero">
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
            </select>

            <label for="category">Categoria</label>
            <select name="category" id="category">
                @foreach( $categorias as $categoria )
                    <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                @endforeach
            </select>

            <label for="description">Descrição</label>
            <textarea name="description" id="description"></textarea>

            <label for="image">Imagem</label>
            <input type="file" id="image" name="image">

            <input type="submit" style="background-color: aliceblue; border: 1px solid black;">
        </form>
    </main>
</body>
</html>