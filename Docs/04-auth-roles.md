# Autenticação e Permissões

## Mecanismo de autenticação

O sistema utiliza o mecanismo de autenticação do Laravel com o model `User` e o método `Auth::attempt()` para login. Os dados de acesso são validados por email e password, e os utilizadores autenticados têm sessão mantida pelo Laravel.

### Rotas abertas
- `/` → página inicial do sistema.
- `/user/registrar` → página de registo.
- `/user/fazerLogin` → página de login.

### Rotas protegidas por middleware `auth`
- `/dashboard`
- `/produto/*`
- `/loja/*`
- `/masculino/*`
- `/feminino/*`
- `/carrinho/*`
- `/user/perfil`
- `/categoria/*`
- `/encomenda/*`
- `/movimento/*`

## Perfis de utilizadores

O campo `role` em `users` define o perfil do utilizador e controla regras de acesso.

### `administrador`
- Acesso completo ao sistema.
- Pode criar utilizadores com qualquer role.
- Acede ao dashboard administrativo e às funções de gestão de produtos, encomendas, categorias e movimentos.
- Pode marcar encomendas como enviadas, entregues e reembolsadas.

### `gestor`
- Acesso ampliado ao sistema, similar ao administrador em relatórios e processamento de pedidos.
- Pode criar utilizadores, mas não pode delegar os papéis `gestor` ou `administrador` para outros gestores.
- Pode marcar encomendas como `enviado`, `entregue` e `reembolsado`.

### `funcionario`
- Perfil de trabalho operacional.
- Acede às rotas protegidas por autenticação para operar o sistema.
- Não tem privilégios explícitos para mudar o estado de encomendas para `enviado`, `entregue` ou `reembolsado` na lógica atual.

### `cliente`
- Acesso ao catálogo de produtos e carrinho.
- Pode registrar-se, fazer login, consultar o perfil e realizar encomendas.
- Visualiza apenas as suas próprias encomendas no painel de encomendas.

## Permissões e regras implementadas no código

### Regras de criação de utilizadores
- Se o registo não informar `role`, o novo utilizador é registrado como `cliente`.
- Apenas um `administrador` ou `gestor` autenticado pode criar utilizadores com role diferente de `cliente`.
- Um `gestor` não pode criar outro `gestor` ou `administrador`.
- Se um utilizador autenticado sem permissão tentar criar roles superiores, o sistema registra o novo usuário como `cliente` ou bloqueia a operação.

### Controle de acesso em controllers
- `ProdutoController::dashboard()` bloqueia usuários com role `cliente` e retorna `403`.
- `EncomendaController::index()` lista todas as encomendas para utilizadores não-clientes, e apenas as encomendas próprias para `cliente`.
- `EncomendaController::enviado()`, `entregue()` e `reembolso()` só autorizam `administrador` ou `gestor`.

## Middleware usado

O único middleware de rota configurado no código é o middleware `auth` do Laravel. Ele garante que apenas utilizadores autenticados entrem em áreas restritas.

### Observação sobre roles e middleware
- Não existe, no código atual, um middleware personalizado para roles como `admin` ou `gestor`.
- O controlo de funções é feito principalmente dentro dos controllers usando verificações de `Auth::user()->role`.

## Fluxo de autorização

1. O utilizador acede à página de login ou registo.
2. Após autenticação bem-sucedida, o Laravel guarda a sessão e permite acesso às rotas com middleware `auth`.
3. Dentro dos controllers, algumas ações verificam o `role` do utilizador e aplicam regras adicionais.
4. Os clientes têm acesso limitado a compras e visualização de pedidos próprios.
5. Gestores e administradores têm acesso ampliado a painéis, produtos e gestão de encomendas.
