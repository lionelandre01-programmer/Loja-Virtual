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

        form{
            width: 50%;
            height: 85%;
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            justify-content: space-evenly;
            padding: 2%;
            border-radius: 8px;
            animation: formAni 1s infinite alternate;
            transition: all 0.9s ease-in-out;
        }

        form:hover{
            cursor: pointer;
            background-color: aliceblue;
            box-shadow: 0 0 15px 20px #e6eaed;
            border-color: skyblue;
        }

        @keyframes formAni {
            from{
                transform: translateX(-10px);
            }
            to{
                transform: translateX(10px);
            }
        }

        form input, form select{
            height: 9%;
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

    @if (session('success'))

        <div style="width: 100%; height: 10vh; background: linear-gradient(97deg, rgb(133, 249, 133), rgb(161, 247, 161), transparent);
        border-radius: 5px; margin: 2%; padding: 2% 1%; justify-content: start;">
            <h3>{{ session('success') }}</h3>
        </div>

    @elseif (session('error'))

        <div style="width: 80%; height: 10vh; background: linear-gradient(97deg, rgba(239, 106, 106, 1), rgba(241, 145, 145, 1), transparent);
            border-radius: 5px; margin: 2%; padding: 2% 1%; justify-content: start;">
                <h3>{{ session('error') }}</h3>
        </div>

    @endif

    <main>
        <h1 style="margin-bottom: 1rem; color: #1c2a33;">CADASTRAR-SE</h1>
        <form action="{{ route('registrar.post') }}" method="POST">
            @csrf
            <label for="firstName">Primeiro Nome</label>
            <input type="text" name="first_name" id="firstName" onchange="maiusculo()" required>
            
            <label for="lastName">Último Nome</label>
            <input type="text" name="last_name" id="lastName" onchange="maiusculo()" required>

            <label for="phone">Telefone</label>
            <input type="number" name="phone" id="phone" max="999999999" required>

            <label for="yourEmail">E-Mail</label>
            <input type="email" name="email" id="yourEmail" required>

            @if (Auth::check() or !$user)
                <label for="yourRole">Função</label>
                <select name="role" id="yourRole">
                    <option value="cliente">Cliente</option>
                    <option value="funcionario">Simples Funcionário</option>
                    <option value="gestor">Gestor</option>
                    @if (!$user)
                        <option value="administrador">Administrador</option>
                    @endif
                </select>
            @endif

            <span id="erroSenha" style="height: auto; width: auto; border: none;"></span>
            <label for="senha">Palavra-Passe</label>
            <input type="password" name="password" id="senha" onkeyup="senhaForte()" required>

            <span id="coincidir" style="height: auto; width: auto; border: none;"></span>
            <label for="password_confirm">Confirmar Palavra-Passe</label>
            <input type="password" name="password_confirm" id="confirmSenha" onkeyup="coincidirSenha()" required>

            <div style="margin-top: 1%;">
                <input type="submit" value="Cadastrar-se" style="background-color: aliceblue; border: 1px solid black;" id="buttonSubmit">
                <input type="reset" value="Cancelar" style="background-color: whitesmoke; border: 1px solid black;">
            </div>
        </form>
    </main>

    <script src="{{ asset('script.js') }}"></script>

</body>
</html>