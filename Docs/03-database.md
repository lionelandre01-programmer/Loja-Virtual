# Estrutura do Banco de Dados

## Visão geral

O sistema utiliza uma base de dados relacional para organizar usuários, produtos, categorias, carrinhos, encomendas e movimentos de stock. A estrutura foi modelada para suportar operações comerciais, controle de estoques e histórico de transações.

## Tabelas principais

### `users`
- Campos principais:
  - `id`
  - `first_name`, `last_name`
  - `role` (enum: `cliente`, `funcionario`, `gestor`, `administrador`)
  - `phone`
  - `email`
  - `password`
  - `email_verified_at`
  - `remember_token`
- Observações:
  - Utilizada para autenticação e controle de acesso.
  - O campo `role` define o perfil e as permissões básicas do utilizador.

### `categorias`
- Campos principais:
  - `id`
  - `name` (enum com tipos como `camisa`, `blusa`, `calça`, `casaco`, `calçado`, `chinelo`, `joia`, `mochila`, `carteira`, `chapeu`, `vestido`, `macacao`)
- Observações:
  - Agrupa produtos por categoria.

### `produtos`
- Campos principais:
  - `id`
  - `name`
  - `description`
  - `price`
  - `quantity`
  - `category` (FK para `categorias.id`)
  - `genero` (enum: `masculino`, `feminino`)
  - `image`
- Observações:
  - O campo `quantity` representa o estoque disponível.
  - Exclusão de categoria remove produtos associados via `onDelete('cascade')`.

### `carrinhos`
- Campos principais:
  - `id`
  - `user_id` (FK para `users.id`)
  - `session_id`
  - `total`
- Observações:
  - Cada cliente pode ter um carrinho ativo associado ao seu utilizador ou sessão.
  - O total é calculado com base nos itens adicionados.

### `carrinhoItems`
- Campos principais:
  - `id`
  - `carrinho_id` (FK para `carrinhos.id`)
  - `produto_id` (FK para `produtos.id`)
  - `quantidade`
  - `preco`
  - `status` (default `activo`)
- Observações:
  - Registra os itens incluidos no carrinho.
  - O campo `status` permite controlar itens removidos ou inativos.

### `encomendas`
- Campos principais:
  - `id`
  - `user_id` (FK para `users.id`)
  - `estado` (enum: `pendente`, `entregue`, `reembolso`, `reembolsado`, `enviado`)
  - `total`
  - `endereco` (padrão `Levantamento`)
- Observações:
  - Registra pedidos feitos pelos clientes.
  - O estado permite acompanhar o ciclo de atendimento.

### `encomenda_items`
- Campos principais:
  - `id`
  - `encomenda_id` (FK para `encomendas.id`)
  - `produto_id` (FK para `produtos.id`)
  - `quantidade`
  - `preco`
- Observações:
  - Cada item guarda o preço no momento da encomenda para histórico.

### `movimentos`
- Campos principais:
  - `id`
  - `category` (descrição do tipo de objeto afetado)
  - `user_id` (FK para `users.id`)
  - `objecto` (nome do objeto ou entidade)
  - `codigo` (identificador do objeto afetado)
  - `quantidade`
  - `movimento`
  - `nota`
  - `update`
- Observações:
  - Armazena logs de operações de stock e alterações em objetos.
  - O campo `user_id` identifica o responsável pela ação.

## Relacionamentos

- `users` 1:N `encomendas`
- `users` 1:N `carrinhos`
- `users` 1:N `movimentos`
- `categorias` 1:N `produtos`
- `produtos` 1:N `encomenda_items`
- `encomendas` 1:N `encomenda_items`
- `carrinhos` 1:N `carrinhoItems`

## Regras importantes

- As chaves estrangeiras usam `onDelete('cascade')` em várias tabelas, removendo dados relacionados quando o registro pai é apagado.
- A tabela `produtos` contém `quantity`, que deve refletir o estoque disponível após vendas e movimentos de stock.
- O campo `role` em `users` define perfis distintos e deve ser usado para aplicar controles de acesso.
- A tabela `encomendas` usa `estado` para acompanhar o fluxo de pedido e não deve ser alterada sem validação de negócio.
- A tabela `encomenda_items` guarda o preço do produto no momento da compra para manter histórico correto mesmo se o produto for alterado depois.
- A tabela `movimentos` é usada como histórico e auditoria, permitindo rastrear alterações em produtos, encomendas, usuários e outros objetos.

## Tabelas auxiliares

- `password_reset_tokens`: guarda tokens de recuperação de senha.
- `sessions`: armazena sessões de utilizador para o sistema de autenticação.
