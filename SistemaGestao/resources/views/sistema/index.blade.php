<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIONANDRE - COMPANY</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <header class="slider" id="topo">
        <div class="slide active" style="background-image: url('{{asset('imagens/fundo/blusa.jpg')}}');"></div>
        <div class="slide" style="background-image: url('{{asset('imagens/fundo/casaco.jpg')}}');"></div>
        <div class="slide" style="background-image: url('{{asset('imagens/fundo/pulseira.jpg')}}');"></div>

        <div class="content-header">
            <h1><a href="#topo">LIONANDRE'S FASHION</a></h1>
            @if (Auth::check())
                <button id="btn-response">&#9776;</button>

            @else
            
                <div style="display: flex; width: 40%; gap: 5%;">
                    <button style="padding: 2%; width: 45%; background: none; border: none; border-radius: 3px;">
                        <a href="{{ route('login') }}" style="color: gold;">FAZER LOGIN</a>
                    </button>

                    <button style="padding: 2%; background: none; width: 45%; border: none; border-radius: 3px;">
                        <a href="{{ route('registrar') }}" style="color: gold;">CADASTRAR-SE</a>
                    </button>
                </div>

            @endif
            
        </div>
        <nav id="menu">
            <ul>
                <li><button><a href="#" style="color: black;">HOME</a></button></li>
                <li><button><a href="{{ route('loja') }}" style="color: black;">LOJA</a></button></li>
                <li><button><a href="#support" style="color: black;">SUPPORT</a></button></li>
                <li><button onclick="return confirm('Deseja Sair?')"><a href="{{ route('logout') }}" style="color: black;">TERMINAR SESSÃO</a></button></li>
            </ul>
        </nav>
        <div class="content-header-bottom">
            @if (Auth::check())
                <h3>
                    <h3>Olá {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}, Seja Bem-Vindo!</h3>
                    Se procura por estilos modernos e sofisticados... Então estás no lugar certo!
                    A <span style="color: goldenrod;">LIONANDRE'S FASHION</span> tem o melhor da moda para si
                </h3>
            @else
                <h3>
                    Se procura por estilos modernos e sofisticados... Então estás no lugar certo!
                    A <span style="color: goldenrod;">LIONANDRE'S FASHION</span> tem o melhor da moda para si
                </h3>
            @endif
        </div>
    </header>

    <aside>

    </aside>

    <main>
        <section class="nav-section">
            <div style="width: 95%; height: 35%; border-radius: 5px; color: aliceblue; padding: 2% 0;">
                <h2>NA LIONANDRE'S FASHION VOCÊ ENCONTRA LOOK PARA...</h2>
            </div>
            <div>
                <span style="font-size: 30px; padding-bottom: 5%;">👪</span>
                <p>
                    TODA A SUA FAMÍLIA
                </p>
            </div>

            <div>
                <span style="font-size: 30px; padding-bottom: 5%;">👗</span>
                <p>
                    TODO TIPO DE OCASIÃO
                </p>
            </div>

            <div>
                <span style="font-size: 30px; padding-bottom: 5%;">💰</span>
                <p>
                    TODO TIPO DE BOLSO
                </p>
            </div>
            <div>
                <span style="font-size: 30px; padding-bottom: 5%;">🕍</span>
                <p>
                    TODO LUGAR
                </p>
            </div>
        </section>

        <section class="main-section">
            <article>
                <div class="motivar">
                    <img src="{{asset('imagens/fundo/pulseira.jpg')}}" alt="primeira imagem">
                </div>
                <div style="width: 90%; padding: 1rem 0;">
                    <h2 style="color: goldenrod;">VISTA A SUA IDENTIDADE</h2>
                    <h3>Moda Urbana Elegante e Acessível</h3>
                </div>
                <div style=" width: 90%; height: 10%; display: flex; gap: 10%;">
                    <button class="btn-article"><a href="{{ route('loja') }}" style="color: black;">Comprar</a></button>
                    <button class="btn-article"><a href="{{ route('joias') }}" style="color: black;">Joalheria</a></button>
                </div>
            </article>
        </section>

        <section class="about-section">
            <h1>PRODUTOS EM DESTAQUES</h1>

            <div>
                <article>
                    <div class="motivar">
                        <img src="{{asset('imagens/Camisas_Casacos/camisa_casacos.jpg')}}" alt="primeira imagem">
                    </div>
                        <span style="font-size: 270%;" class="diamond">💎</span>
                    <div style="width: 90%; padding: 1rem 0; flex-direction: column;">
                        <h2 style="color: goldenrod;">ROUPEIRO MASCULINO</h2>
                        <h3>Encontre o melhor para si na nossa loja
                            <br>
                            Visite o vestuário masculino e encontre o estilo único
                            que combina consigo
                        </h3>
                    </div>
                    <div style=" width: 90%; height: 10%; display: flex; gap: 10%;">
                        <button class="btn-article" style=" width: 70%; margin-left: -20%;">
                            <a href="{{ route('masculino') }}" style="color: black;">Visitar Roupeiro</a>
                        </button>
                    </div>
                </article>

                <article>
                    <div class="motivar">
                        <img src="{{asset('imagens/Camisas_Casacos/blusas.jpg')}}" alt="primeira imagem">
                    </div>
                        <span style="font-size: 270%;" class="diamond">💎</span>
                    <div style="width: 90%; padding: 1rem 0; flex-direction: column;">
                        <h2 style="color: goldenrod;">ROUPEIRO FEMININO</h2>
                        <h3>Encontre o melhor para si na nossa loja
                            <br>
                            Visite o vestuário feminino e encontre o estilo único
                            que combina consigo
                        </h3>
                    </div>
                    <div style=" width: 90%; height: 10%; align-items: flex-start;">
                        <button class="btn-article" style=" width: 70%; margin-left: -20%;">
                            <a href="{{ route('feminino') }}" style="color: black;">Visitar Roupeiro</a>
                        </button>
                    </div>
                </article>

            </div>
        </section>

        <section class="services">
            <div class="subService" style="border-top: 2px solid gold;">
                <div style="width: 30%; height: 100%;">
                    <img src="{{asset('imagens/Modelos/modelo3.jpg')}}" alt="primeira imagem" class="service-image">
                </div>
                <div style="padding: 10% 5%;">
                    <h2 style="color: goldenrod;">ESTILOS FEMININOS</h2> <br>
                    <h4>
                        Venha conhecer o melhor da moda com a LIONANDRE'S FASHION. Em 
                        nossas lojas encontras todos os estilos femininos que possam 
                        satisfazer os seus desejos pela moda moderna, desde as cores até 
                        aos mais espantosos design
                    </h4>
                </div>
            </div>

            <div class="subService" style="border-bottom: 2px solid gold;">
                <div style="padding: 10% 5%;">
                    <h2 style="color: goldenrod;">ESTILOS MASCULINOS</h2> <br>
                    <h4>
                        Venha conhecer o as mais sofisticadas novidades da moda masculina com a LIONANDRE'S FASHION. Em 
                        nossa poderá ter o prazer de satisfazer os mais profundos desejos de estilos modernos que você 
                        está tentando suprir. Encontre o melhor aqui, e dê vida ao seu guarda-fato
                    </h4>
                </div>
                <div style="width: 30%; height: 100%;">
                    <img src="{{asset('imagens/Modelos/modelo1.jpg')}}" alt="primeira imagem" class="service-image">
                </div>
            </div>
            <div style="width: 100%; text-align: end; padding-top: 5px;">
                <span style="border-bottom: 1px solid black; padding-bottom: 5px; margin-top: 5px;">
                    <a href="{{ route('loja') }}" style="color: black;">VER MAIS...</a>
                </span>
            </div>
            
        </section>

        <section class="promo-section">
            <h1 style="text-align: center;">PROMOÇÕES E NOVIDADES</h1>
            <div style="width: 100%; height: 95%;">
                <div style="width: 100%; height: 48%; border-radius: 5px;  display: flex; flex-direction: column; align-items: center; padding: 2%;">
                    <div style="width: 82%; height: 20%;">
                        <h3>Na LIONANDRE'S FASHION voçê encontra as melhores promoções de descontos que 
                            poderia imaginar. Na busca por endumentária do seu nível, acabas encontrando
                            promoções inacreditável que apenas a LIONANDRE'S FASHION te pode oferecer.
                        </h3>
                    </div>
                    
                    <div class="div-promo">
                        <article class="article-promo">
                            <div class="div-image-promo">
                                <img src="{{asset('imagens/Camisas_Casacos/casacoM.jpg')}}" alt="primeira imagem" class="promo-image">
                            </div>
                            <div class="div-detail-promo">
                                <h2 style="color: red; text-align: center;">Promoção Inédita</h2>
                                <h3>Casaco Holandês Masculino</h3>
                                <h3>💰Preço: <span style="color: goldenrod;">58.799,99kz</span></h3>
                                <q>Realize uma compra e receba um desconto de até 5%</q>
                            </div>
                        </article>

                        <article class="article-promo">
                            <div class="div-image-promo">
                                <img src="{{asset('imagens/Camisas_Casacos/casacoF.jpg')}}" alt="primeira imagem" class="promo-image">
                            </div>
                            <div class="div-detail-promo">
                                <h2 style="color: red; text-align: center;">Promoção Inédita</h2>
                                <h3>Casaco Holandês Feminino</h3>
                                <h3>💰Preço: <span style="color: goldenrod;">53.649,99kz</span></h3>
                                <q>Realize uma compra e receba um desconto de até 5%</q>
                            </div>
                        </article>
                    </div>
                    

                    <div style="width: 100%; padding: 5px; text-align: end;">
                        <span style="border-bottom: 1px solid black; padding-bottom: 5px; margin-top: 5px;">
                            <a href="#" style="color: black;">VER MAIS POMOÇÕES...</a>
                        </span>
                    </div>
                </div>

                <div style="width: 100%; height: 50%; border-radius: 5px; margin-top: 1%; display: flex; flex-direction: column; align-items: center; padding: 2%;">
                    <div style="width: 82%; height: 20%;">
                        <h3>Na LIONANDRE'S FASHION voçê encontra as melhores novidades do mundo da moda
                             . Endumentárias estilosas com os preços mais sofisticados do mercado. Estas últimas 
                             novidades trazem Estilos, Belezas e Melhores Preços.
                        </h3>
                    </div>
                    
                    <div class="div-promo">
                        <article class="article-promo">
                            <div class="div-image-promo">
                                <img src="{{asset('imagens/Camisas_Casacos/t-shirts2.jpg')}}" alt="primeira imagem" class="promo-image" style="object-fit: fill;">
                            </div>
                            <div class="div-detail-promo">
                                <h2 style="color: red; text-align: center;">Melhores Preços</h2>
                                <h3>T-Shirt Alemã Simples</h3>
                                <h3 style="display: inline;">💰Preço: </h3>
                                 Antes:<span style="color: goldenrod;"><del style="text-decoration: line-through;">25.649,99kz</del></span>
                                 Agora: <span style="color: goldenrod;">23.649,99kz</span>
                                <q>Encontre os melhores preços</q>
                            </div>
                        </article>

                        <article class="article-promo">
                            <div class="div-image-promo">
                                <img src="{{asset('imagens/Camisas_Casacos/blusas.jpg')}}" alt="primeira imagem" class="promo-image" style="object-fit: fill;">
                            </div>
                            <div class="div-detail-promo">
                                <h2 style="color: red; text-align: center;">Melhores Preços</h2>
                                <h3>Blusa Alemã Simples</h3>
                                <h3 style="display: inline;">💰Preço: </h3>
                                 Antes:<span style="color: goldenrod;"><del style="text-decoration: line-through;">20.649,99kz</del></span>
                                 Agora: <span style="color: goldenrod;">17.649,99kz</span>
                                
                                <q>Encontre as melhores qualidades</q>
                            </div>
                        </article>
                    </div>
                    

                    <div style="width: 100%; padding: 5px; text-align: end;">
                        <span style="border-bottom: 1px solid black; padding-bottom: 5px; margin-top: 5px;">
                            <a href="#" style="color: black;">VER MAIS POMOÇÕES...</a>
                        </span>
                    </div>
                </div>
            </div>
        </section>
        <section class="acessorio-section">
            <h1 style="text-align: center;">ACESSÓRIOS</h1>
            <div class="acessorio">
                <h2>Também temos para si...</h2>
                <div class="div-acessorio">
                    <div class="first-acessorio">
                        <img src="{{asset('imagens/Carteiras/carteira.jpg')}}" alt="primeira imagem" class="promo-image" style="object-fit: fill;">
                    </div>

                    <div class="second-acessorio">
                        <img src="{{asset('imagens/Mochilas/mochila.jpg')}}" alt="primeira imagem" class="promo-image" style="object-fit: fill;">
                    </div>

                    <div class="third-acessorio">
                        <img src="{{asset('imagens/Relogios_Pulseiras/relogio.jpg')}}" alt="primeira imagem" class="promo-image" style="object-fit: fill;">
                    </div>

                    <div class="fourth-acessorio">
                        <img src="{{asset('imagens/Calçados/sapatos.jpg')}}" alt="primeira imagem" class="promo-image" style="object-fit: fill;">
                    </div>

                    <div class="fifth-acessorio">
                        <img src="{{asset('imagens/Chapeus/bone.jpg')}}" alt="primeira imagem" class="promo-image" style="object-fit: fill;">
                    </div>
                </div>
            </div>
            <div style="width: 100%; padding: 5px; text-align: end;">
                <span style="border-bottom: 1px solid black; padding-bottom: 5px; margin-top: 5px;">
                    <a href="{{ route('loja') }}" style="color: black;">VER MAIS ACESSÓRIOS...</a>
                </span>
            </div>
        </section>

        <section class="encomendas-section">

            <div style="width: 100%; height: 30%;">
                <h2>Para atender as suas necessidades e satisfazer os seus desejos
                    a <span>LIONANDRE'S FASHION</span> dispões dos seguintes métodos...
                </h2>
            </div>

            <div class="div-encomendas">
                <div>
                    <span style="font-size: 30px; padding-bottom: 5%;">📦</span>
                    <p>
                        MÉTODO DE OBTENÇÃO
                    </p>
                    <br>
                    <p style="text-align: start;">
                        Os produtos pagos, podem chegar até si via... <br>
                        🛵 - Entregas ao domicílio com uma taxa adicional <br>
                        🏢 - Levantamento em nossos centros de levantamento
                    </p>
                </div>

                <div>
                    <span style="font-size: 35px; padding-bottom: 5%;">💵</span>
                    <p>
                        MÉTODO DE PAGAMENTO
                    </p>
                    <br>
                    <p>
                        O pagamento é feito via Multicaixa Express
                    </p>
                </div>
            </div>

        </section>
    </main>

    <footer>
        <div class="div-footer" id="support">
            <div>
                <h3>Informações de Contacto</h3>
                <br>
                <p>
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

            <div style="width: 100%; height: 7%;">
                <p>&copy; 2026 - LIONANDRE'S FASHION</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('script.js') }}"></script>

</body>
</html>