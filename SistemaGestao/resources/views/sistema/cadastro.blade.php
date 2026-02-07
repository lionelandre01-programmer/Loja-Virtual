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
            height: 10%;
        }

        div{
            height: 10%;
            width: 80%;
            display: flex;
            justify-content: space-evenly;
        }

        div input{
            height: 100%;
            width: 35%;
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
        <h3><a href="{{ route('index') }}">Voltar</a></h3>
    </header>

    <main>
        <form action="{{ route('registrar.post') }}" method="POST">
            @csrf
            <label for="first_name">Primeiro Nome</label>
            <input type="text" name="first_name" id="first_name" required>
            
            <label for="last_name">Último Nome</label>
            <input type="text" name="last_name" id="last_name" required>

            <label for="email">Gênero</label>
            <input type="email" name="email" id="email" required>

            <label for="role">Função</label>
            <select name="role" id="role">
                <option value="cliente">Cliente</option>
                <option value="funcionario">Simples Funcionário</option>
                <option value="gestor">Gestor</option>
                <option value="administrador">Administrador</option>
            </select>

            <label for="password">Palavra-Passe</label>
            <input type="password" name="password" id="password" required>

            <div>
                 <input type="submit" value="Cadastrar" style="background-color: aliceblue; border: 1px solid black;">
                <input type="reset" value="Cancelar" style="background-color: whitesmoke; border: 1px solid black;">
            </div>
        </form>
    </main>
</body>
</html>