<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testando API</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body{
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        div{
            background-color: aqua;
            width: 80vw;
            height: 80vh;
        }

    </style>
</head>
<body>
    <div>
        <ul id="list">
            <li id="item">Teste</li>
        </ul>
    </div>

    <script>

        fetch("http://localhost:8000/api/produto")
        .then(function (response) {
            return response.json();
        })
        .then( produtos => {

            console.log(produtos);
            let lista = document.querySelector('#list');

            produtos.forEach( produto => {

                let itensName = document.createElement("li");
                itensName.textContent = "Name: " + produto.name + " Code: " + produto.id;
                lista.appendChild(itensName);
            });
            
        })
        .catch(erro => {
            document.getElementById("item").textContent = "Erro: " + erro;
        });

    </script>

</body>
</html>