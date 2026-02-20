<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIONANDRE - COMPANY</title>
    <link rel="stylesheet" href="{{ asset('second_style.css') }}">
</head>
<body>
    <header>
        <div>
            <span>👨‍💼</span>
            <p>
                <a href="{{ route('meuPerfil') }}">MEU PERFIL</a>
            </p>
        </div>

        <div style="align-items: start; padding: 0 2%;">
            <h1><a href="{{ route('index') }}">LIONANDRE'S FASHION</a></h1>
        </div>

        <div>
            <span>🛒</span>
            <p>
                <a href="{{ route('carrinho') }}">CARRINHO</a>
            </p>
        </div>

        <div style="flex-direction: row; padding: 0.5rem; justify-content: space-around; border-top: 2px solid black;">
            
            <button id="clikc" class="botao">
                <a href="{{ route('loja') }}">LOJA</a>
            </button>

            <button id="clikc" class="botao">
                <a href="{{ route('feminino') }}">ROUPEIRO FEMININO</a>
            </button>
            
            <button id="clikc" class="botao">
                <a href="{{ route('masculino') }}">ROUPEIRO MASCULINO</a>
            </button>
            
            <button id="clikc" class="botao">
                <a href="{{ route('joias') }}">JOALHERIA / ACESSÓRIOS</a>
            </button>
        </div>

    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="div-footer">
            <div style="width: 45%; color: white;">
                <h3>Informações de Contacto</h3>
                <br>
                <p style="color: white;">
                    Endereço: Av. 21 de janeiro, Maianga, frente a pedonal do triângulo <br>
                    Tell: 948972536/ 950030201 <br>
                    E-mail: lionelgomes@gmail.com <br>
                </p>
            </div>

            <div>
                <h3>Links Úteis</h3>
                <br>
                <p>
                    <a href="#">Sobre Nós</a> <br>
                    <a href="#">Politica de Privacidade</a> <br>
                    <a href="#">Termos e Condições</a>
                </p>
            </div>

            <div>
                <h3>Serviços ao Cliente</h3>
                <br>
                <p>
                    <a href="#">Entregas</a> <br>
                    <a href="#">Devolução e Trocas</a> <br>
                    <a href="#">Pagamento e Segurança</a>
                </p>
            </div>

            <div>
                <h3>Redes Sociais</h3>
                <br>
                <p>
                    <a href="#">Facebook</a> <br>
                    <a href="#">WhatsApp</a> <br>
                    <a href="#">Instagram</a>
                </p>
                
            </div>

            <div style="width: 100%; height: 7%; padding: 1%;">
                <p style="color: white;">&copy; 2026 - LIONANDRE'S FASHION</p>
            </div>
        </div>
    </footer>

    <script>
        const botoes = document.querySelectorAll('.botao');

        botoes.forEach(function(botao) {
            botao.addEventListener('click', function() {
                botoes.forEach(b => b.classList.remove('ativo'));

                botao.classList.add('ativo');
            });
        });
    </script>

</body>
</html>