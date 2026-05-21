# Workflow dos Utilizadores

## 1. Registo e autenticação

- O utilizador acede à rota `/user/registrar` para abrir o formulário de registo.
- Ao submeter os dados, o sistema cria um novo utilizador em `users` com role `cliente`, salvo se um administrador ou gestor autorizado criar um utilizador com role diferente.
- Se o utilizador já estiver autenticado e não for administrador/gestor, qualquer tentativa de definir outro role resulta no cadastro como `cliente`.
- Após criação de conta, o sistema autentica o utilizador e inicia a sessão.
- O login é feito em `/user/fazerLogin` com email e password, utilizando `Auth::attempt()`.
- O logout é realizado em `/user/logout`.

## 2. Navegação e exploração de produtos

- O utilizador autenticado pode aceder ao catálogo através de `/loja` e visualizar produtos por filtros de gênero e categoria.
- A navegação inclui rotas segmentadas como `/masculino/*` e `/feminino/*` para categorias específicas.
- A visualização de detalhe de produto é feita em `/produto/show/{id}`.

## 3. Processo de carrinho de compras

- O cliente adiciona produtos ao carrinho usando `POST /carrinho/adicionar`.
- O sistema cria ou reutiliza o carrinho associado ao `user_id` do utilizador.
- Não são permitidos produtos duplicados ativos no mesmo carrinho; uma tentativa de adicionar produto repetido retorna erro.
- O total do carrinho é atualizado com base na quantidade e no preço de cada item.
- O cliente pode alterar a quantidade de um item por meio de `/carrinho/alterForm/{id}` e `POST /carrinho/alter`.
- Item removido do carrinho é apagado com `DELETE /carrinho/destroy/{id}`.

## 4. Finalização de encomenda

- O cliente finaliza a compra com `POST /encomenda/store`.
- O sistema transfere os itens `activo` do carrinho para `encomenda_items` e cria um registro em `encomendas`.
- O estoque do produto (`produtos.quantity`) é reduzido de acordo com as quantidades compradas.
- O total da encomenda é gravado e o carrinho é limpo.
- O estado inicial da encomenda é `pendente`.

## 5. Gestão de encomendas e estados

- Clientes podem ver apenas suas próprias encomendas em `GET /encomenda`.
- Administradores e gestores podem ver todas as encomendas.
- Clientes podem cancelar uma encomenda em `/encomenda/cancelar/{id}` dentro de até 5 minutos após sua criação.
- Administradores e gestores podem controlar o status das encomendas com:
  - `/encomenda/enviar/{id}` → marcar como `enviado`
  - `/encomenda/entregar/{id}` → marcar como `entregue`
  - `/encomenda/reembolso/{id}` → marcar como `reembolsado`

## 6. Gestão de produtos e categorias

- Usuários autenticados com permissão podem acessar o formulário de produto em `/produto/create`, cadastrar, editar e excluir produtos.
- A criação, atualização e exclusão de produtos geram registos de movimentação em `movimentos`.
- Categorias são geridas em `/categoria` e podem ser criadas com `POST /categoria/store`.

## 7. Perfil do utilizador

- O perfil autenticado é visualizado em `/user/perfil`.
- Usuários podem atualizar seus dados pessoais via `POST /user/edit`.

## 8. Auditoria e histórico

- Todas as operações relevantes de gestão, como novo usuário, produtos criados/alterados/excluídos e estados de encomenda, geram registos em `movimentos`.
- O histórico de movimentos é consultado em `/movimento` e o detalhe em `/movimento/detalhes/{id}`.
