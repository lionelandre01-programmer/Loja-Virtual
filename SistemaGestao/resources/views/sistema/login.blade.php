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
            background-color: #e5e2dd;
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
            height: 40%;
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            justify-content: space-evenly;
            padding: 2%;
            border-radius: 8px;
            transition: all 0.9s ease-in-out;
        }

        form:hover{
            cursor: pointer;
            background-color: aliceblue;
            box-shadow: 0 0 15px 20px #e6eaed;
            width: 55%;
            height: 45%;
            border-color: skyblue;
        }

        form input{
            height: 20%;
            transition: all 0.9s ease-in-out;
        }

        form input:hover{
            color: #1c2a33;
            border-radius: 10px;
        }

        div{
            height: 20%;
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
        <h1 style="margin-bottom: 1rem; color: #1c2a33;">FAZER LOGIN</h1>
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <label for="email">E-Mail</label>
            <input type="email" name="email" id="email" required>
            
            <label for="password">Palavra-Passe</label>
            <input type="password" name="password" id="password" required>

            <div>
                <input type="submit" value="Entrar" style="background-color: aliceblue; border: 1px solid black;">
                <input type="reset" value="Cancelar" style="background-color: whitesmoke; border: 1px solid black;">
            </div>
        </form>
    </main>
</body>
</html>