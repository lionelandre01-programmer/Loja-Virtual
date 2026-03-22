<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIONANDRE - FASHION</title>
    <link rel="stylesheet" href="{{ asset('second_style.css') }}">
</head>
<body>
    <header>
        <div>
            <div>
                <span>👤</span>
                <p><a href="{{ route('meuPerfil') }}">Meu Perfil</a></p>
            </div>

            <div>
                <span>🛒</span>
                <p><a href="{{ route('carrinho') }}">Carrinho</a></p>
            </div>
        </div>

        <div>
            <h1><a href="{{ route('index') }}">👗 LIONANDRE'S FASHION</a></h1>
        </div>

        <div>
            <button class="botao">
                <a href="{{ route('loja') }}">🏪 Loja</a>
            </button>

            <button class="botao">
                <a href="{{ route('feminino') }}">👠 Feminino</a>
            </button>

            <button class="botao">
                <a href="{{ route('masculino') }}">👔 Masculino</a>
            </button>

            <button class="botao">
                <a href="{{ route('joias') }}">✨ Jóias</a>
            </button>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="div-footer">
            <div>
                <h3>📍 Contacto</h3>
                <p>
                    Endereço: Av. 21 de janeiro, Maianga<br>
                    Tel: 948972536<br>
                    E-mail: lionelgomes@gmail.com
                </p>
            </div>

            <div>
                <h3>🔗 Links Úteis</h3>
                <p>
                    <a href="#">Sobre Nós</a><br>
                    <a href="#">Privacidade</a><br>
                    <a href="#">Termos</a>
                </p>
            </div>

            <div>
                <h3>🚚 Serviços</h3>
                <p>
                    <a href="#">Entregas</a><br>
                    <a href="#">Devoluções</a><br>
                    <a href="#">Pagamento</a>
                </p>
            </div>

            <div>
                <h3>📱 Redes Sociais</h3>
                <p>
                    <a href="#">Facebook</a><br>
                    <a href="#">WhatsApp</a><br>
                    <a href="#">Instagram</a>
                </p>
            </div>

            <div>
                <p>&copy; 2026 LIONANDRE'S FASHION - Todos os direitos reservados</p>
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

        // Auto-select based on current page
        const currentPath = window.location.pathname;
        botoes.forEach(botao => {
            const href = botao.querySelector('a').getAttribute('href');
            if (currentPath.includes(href.split('/')[1])) {
                botao.classList.add('ativo');
            }
        });
    </script>

</body>
</html>