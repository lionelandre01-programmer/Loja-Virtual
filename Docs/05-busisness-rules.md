# Regras do Negócio

## Princípios gerais

O sistema está desenhado para gerir uma loja virtual com foco em catálogo de produtos, carrinho de compras, encomendas e controlo de stock. As regras de negócio definem como clientes, funcionários e gestores interagem com o fluxo de compra e com os dados do sistema.

## Regras de cadastro e contas

- O utilizador pode registar-se como `cliente` através do formulário de registo.
- Se o campo `role` não for preenchido, o usuário é automaticamente cadastrado como `cliente`.
- Apenas `administrador` ou `gestor` autenticados podem criar utilizadores com roles especiais diferentes de `cliente`.
- Um `gestor` não pode criar outro `gestor` ou `administrador`.
- Um novo administrador gerado por um usuário autorizado fica registrado como movimento no sistema.

## Regras do carrinho de compras

- Cada usuário possui um carrinho associado ao seu `user_id`.
- Ao adicionar um produto, o sistema verifica se já existe o mesmo produto ativo no carrinho.
- Se o produto já estiver no carrinho, a operação é bloqueada com mensagem de erro.
- O total do carrinho é atualizado como a soma das quantidades pelos respectivos preços dos produtos.
- Itens removidos do carrinho são excluídos diretamente; não há item em estado `finalizado` para cancelamento no carrinho.
- O carrinho guarda apenas itens com `status = activo`.

## Regras de produtos e estoque

- Produtos têm atributos obrigatórios como `name`, `price`, `quantity`, `category`, `genero` e `image`.
- O estoque de produto (`quantity`) é ajustado automaticamente ao processar uma encomenda.
- Quando uma encomenda é criada, a quantidade vendida é subtraída de `Produto.quantity`.
- A exclusão ou alteração de produto gera um registro em `movimentos` para auditoria.

## Regras de encomenda e pagamento

- Uma encomenda é criada somente com itens de carrinho ativos do usuário autenticado.
- O total da encomenda é calculado com base no total existente do carrinho antes da finalização.
- Após a criação da encomenda, os itens do carrinho passam para `encomenda_items` e o carrinho é limpo.
- O status inicial da encomenda é `pendente`.
- O campo `endereco` tem valor padrão `Levantamento`, mas pode ser atualizado com o endereço informado pelo cliente.

## Regras de cancelamento e estados de encomenda

- O cliente pode cancelar a encomenda apenas se a encomenda tiver sido criada há menos de 5 minutos.
- Após 5 minutos, o cancelamento não é permitido e o usuário recebe uma mensagem de erro.
- Apenas `administrador` e `gestor` podem alterar o estado da encomenda para:
  - `enviado`
  - `entregue`
  - `reembolsado`
- O estado `reembolso` indica que o pedido está em processo de reembolso, e `reembolsado` indica que a devolução foi confirmada.

## Regras de movimeto e auditoria

- O sistema regista operações importantes em `movimentos` para histórico e auditoria.
- Movimentos são criados ao cadastrar usuário, cadastrar/atualizar/excluir produto, criar encomenda, cancelar encomenda e mudanças de estado de encomenda.
- Cada movimento registra:
  - `category`: tipo de objeto afetado
  - `user_id`: responsável pela ação
  - `objecto`: descrição do item ou entidade
  - `codigo`: identificador do item afetado
  - `movimento`: descrição da operação

## Regras de gestão de categorias

- Categorias são gerenciadas através de CRUD específico.
- A criação de categoria também é registrada em `movimentos`.
- Categorias são utilizadas para agrupar produtos e manter o catálogo organizado.

## Regras de acesso e autorização

- Todas as rotas críticas de gestão e compra são protegidas por middleware de autenticação (`auth`).
- As decisões de negócio dependem de `role` do usuário e são validadas nos controllers.
- Clientes podem visualizar e criar encomendas apenas para si mesmos.
- Utilizadores não autenticados não podem acessar o dashboard, carrinho, encomendas ou qualquer rota de gestão.

## Observações importantes

- A regra de negócio de quantidade em stock não impede explicitamente a compra de itens com `quantity` insuficiente no código atual; esse comportamento deve ser validado em futuras melhorias.
- O cálculo do total do carrinho e da encomenda é realizado no backend, mas deve ser ratificado para evitar discrepâncias com alterações de preço em produtos já adicionados.
- Movimentos são usados como histórico de auditoria, mas não são atualmente usados para reconciliar automaticamente o stock ou os estados de objeto.
