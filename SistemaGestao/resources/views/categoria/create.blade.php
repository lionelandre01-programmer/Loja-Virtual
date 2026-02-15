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
            width: 70%;
            height: 80%;
            display: flex;
            border: 1px solid black;
            border-radius: 8px;
            flex-wrap: wrap;
            overflow: hidden;
        }

        .input{
            height: 90%;
            width: 50%;
            display: flex;
        }

        .input div{
            height: 100%;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding: 2%;
        }

        @media(max-width: 768px){

            form{
                width: 90%;
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

    @if (session('success'))

        <div style="width: 100%; height: 10vh; background: linear-gradient(97deg, rgb(133, 249, 133), rgb(161, 247, 161), transparent, transparent);
        border-radius: 5px; margin-bottom: 10px; padding: 2%; margin: 20px;">
            <h3>{{ session('success') }}</h3>
        </div>
        
    @elseif(session('error'))

        <div style="width: 100%; height: 10vh; background: linear-gradient(97deg, rgba(239, 106, 106, 1), rgba(241, 145, 145, 1), transparent, transparent);
        border-radius: 5px; margin-bottom: 10px; padding: 2%;  margin: 20px;">
            <h3>{{ session('error') }}</h3>
        </div>

    @endif

    <main>
        <form action="{{ route('storeCategoria') }}" method="POST">
            @csrf

            <div class="input">
                <div>
                    <label for="calcas">Calças</label>
                    <label for="camisas">Camisas</label>
                    <label for="chapeus">Chapéus</label>
                    <label for="calcados">Calçados</label>
                    <label for="chinelos">Chinelos</label>
                    <label for="casacos">Casacos</label>
                </div>

                <div>
                    <input type="radio" name="name" id="calcas" value="calça">
                    <input type="radio" name="name" id="camisas" value="camisa">
                    <input type="radio" name="name" id="chapeus" value="chapeu">
                    <input type="radio" name="name" id="calcados" value="calçado">
                    <input type="radio" name="name" id="chinelos" value="chinelo">
                    <input type="radio" name="name" id="casacos" value="casaco">
                </div>
            </div>

            <div class="input">
                <div>
                    <label for="carteiras">Carteiras</label>
                    <label for="mochilas">Mochilas</label>
                    <label for="macacaos">Macacões</label>
                    <label for="joias">Joías</label>
                    <label for="blusas">Blusas</label>
                    <label for="vestidos">Vestidos</label>
                </div>

                <div>
                    <input type="radio" name="name" id="carteiras" value="carteira">
                    <input type="radio" name="name" id="mochilas" value="mochila">
                    <input type="radio" name="name" id="macacaos" value="macacao">
                    <input type="radio" name="name" id="joias" value="joia">
                    <input type="radio" name="name" id="blusas" value="blusa">
                    <input type="radio" name="name" id="vestidos" value="vestido">
                </div>
            </div>

            <input type="submit" value="Cadastrar Categoria" 
            style="background-color: aliceblue; border: 1px solid black; width: 100%; border-bottom: 5px; height: 10%;">
        </form>
    </main>
</body>
</html>