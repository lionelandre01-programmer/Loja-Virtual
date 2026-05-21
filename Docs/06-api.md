# APIs e Rotas do Sistema

## Visão geral

O sistema é construído como uma aplicação Laravel com rotas web organizadas em `routes/web.php` e uma rota API simples em `routes/api.php`. A maior parte das funcionalidades está exposta através de rotas web protegidas por middleware de autenticação, sendo o sistema orientado ao acesso via views e formulários.

## Rotas principais do frontend e backend web

### Rota pública
- `GET /` → `ProdutoController@index`
  - Página inicial do sistema.
  - Exibe o painel principal ou a página de entrada.

### Dashboard e páginas autenticadas
- `GET /dashboard` → `ProdutoController@dashboard`
  - Apenas para utilizadores autenticados.
  - Mostra métricas administrativas como total de produtos, encomendas, receita e clientes.

### Gestao de produtos (`/produto/*`)
Todas as rotas abaixo exigem autenticação (`auth`):
- `GET /produto/create` → formulário de criação de produto.
- `POST /produto/store` → cria um novo produto.
- `GET /produto/roupeiro-masculino` → lista produtos masculinos.
- `GET /produto/show/{id}` → mostra detalhe de um produto.
- `GET /produto/edit/{id}` → formulário de edição do produto.
- `POST /produto/update/{id}` → atualiza produto existente.
- `GET /produto/delete/{id}` → página de confirmação de exclusão.
- `DELETE /produto/destroy/{id}` → exclui o produto.
- `GET /produto/maioresPrecos` → lista produtos por preço decrescente.

### Loja e categorias públicas autenticadas (`/loja/*`, `/masculino/*`, `/feminino/*`)
- `GET /loja` → lista geral de produtos.
- `GET /loja/roupeiro-feminino` → produtos femininos.
- `GET /loja/joias` → seção de joias.
- `GET /loja/joias/masculinas` → joias masculinas.
- `GET /loja/joias/femininas` → joias femininas.
- Rotas sob `/masculino` e `/feminino` também filtram produtos por categorias específicas.

### Carrinho de compras (`/carrinho/*`)
- `GET /carrinho` → exibe o carrinho do utilizador.
- `POST /carrinho/adicionar` → adiciona produto ao carrinho.
- `GET /carrinho/alterForm/{id}` → formulário para alterar quantidade de item.
- `POST /carrinho/alter` → atualiza quantidade do item no carrinho.
- `DELETE /carrinho/destroy/{id}` → remove item do carrinho.

### Usuários (`/user/*`)
- `GET /user/registrar` → formulário de registo.
- `POST /user/postRegistrar` → cria novo utilizador.
- `GET /user/fazerLogin` → formulário de login.
- `POST /user/postLogin` → autentica o utilizador.
- `GET /user/logout` → encerra a sessão.
- `GET /user/perfil` → exibe o perfil do utilizador autenticado.
- `POST /user/edit` → atualiza dados do perfil do utilizador.

### Categorias (`/categoria/*`)
- `GET /categoria` → formulário/listagem de categorias.
- `POST /categoria/store` → cria nova categoria.

### Encomendas (`/encomenda/*`)
- `GET /encomenda` → lista encomendas; clientes veem apenas as suas.
- `POST /encomenda/store` → gera uma nova encomenda a partir do carrinho.
- `GET /encomenda/show/{id}` → exibe a factura/detalhes da encomenda.
- `GET /encomenda/cancelar/{id}` → cancelamento imadiato da encomenda, válido até 5 minutos após a criação.
- `GET /encomenda/enviar/{id}` → marca encomenda como enviada (administrador/gestor).
- `GET /encomenda/entregar/{id}` → marca encomenda como entregue (administrador/gestor).
- `GET /encomenda/reembolso/{id}` → marca encomenda como reembolsada (administrador/gestor).
- `GET /encomenda/pdf/{id}` → gera PDF da encomenda.

### Movimentos (`/movimento/*`)
- `GET /movimento` → lista todos os movimentos registrados no sistema.
- `GET /movimento/detalhes/{id}` → exibe detalhe de um movimento.

## API REST disponível

### `routes/api.php`
- `GET /api/produto` → `ProdutoController@index_API`
  - Endpoint API para listar produtos.
  - Esta é a única rota API definida no código atual.

## Observações sobre o funcionamento das rotas

- O middleware `auth` aplica-se a quase todas as rotas de gestão e compra, garantindo que apenas utilizadores autenticados possam atuar no sistema.
- O controlo de perfis e permissões é feito principalmente nos controllers, verificando o `role` do utilizador para ações sensíveis como mudanças de estado de encomenda ou criação de utilizadores.
- As rotas do front-end são usadas tanto para exibir views quanto para processar formulários que atualizam o estado do sistema.
- Embora existam muitas rotas web, o sistema não utiliza um conjunto completo de API RESTful para todos os recursos; a maior parte das interações ocorre via formulários Laravel tradicionais.

## Estrutura de fluxo de rota

1. O cliente navega pela loja via rotas `/loja`, `/masculino`, `/feminino` e páginas de produto.
2. Ao adicionar ao carrinho, o sistema chama `/carrinho/adicionar` e atualiza o carrinho ativo do utilizador.
3. Para finalizar compra, o cliente cria uma encomenda em `/encomenda/store`.
4. Ao criar a encomenda, o sistema move itens do carrinho para `encomenda_items`, define o total e ajusta o estoque.
5. Gestores e administradores usam `/encomenda/enviar`, `/encomenda/entregar` e `/encomenda/reembolso` para controlar o ciclo do pedido.
