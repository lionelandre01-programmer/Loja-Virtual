# Estrutura do Sistema

## Visão Geral da Arquitetura

O sistema foi construído com base no framework Laravel, seguindo o padrão MVC (Model-View-Controller). A aplicação separa claramente responsabilidade de dados, lógica de negócio e apresentação, oferecendo uma estrutura modular e escalável.

## Componentes Principais

- **Models**: representam as entidades do domínio, como `Produto`, `Categoria`, `Encomenda`, `Carrinho`, `Movimento` e `User`.
- **Controllers**: gerenciam a lógica de requisição e resposta, coordenando operações entre as views e os models.
- **Views**: contêm a apresentação do conteúdo no frontend, utilizando templates Blade ou arquivos estáticos de HTML/CSS/JS.
- **Routes**: definem as rotas de acesso ao aplicativo em `routes/web.php` e `routes/api.php`, direcionando as requisições para os controllers apropriados.
- **Database**: usa migrations para definir a estrutura de tabelas e seeders para populá-las com dados iniciais.

## Estrutura de Pastas

- `app/`
  - `Models/`: entidades de domínio.
  - `Http/Controllers/`: controllers que processam as requisições.
  - `Http/Middleware/`: middleware de autenticação e autorização.
  - `Providers/`: provedores de serviços e configuração adicional.
- `bootstrap/`: inicialização do framework e cache de configuração.
- `config/`: arquivos de configuração da aplicação.
- `database/`
  - `migrations/`: scripts de criação e alteração de tabelas.
  - `seeders/`: classes para popular o banco de dados.
- `public/`: ponto de entrada web, arquivos públicos e ativos estáticos.
- `resources/`: arquivos de frontend, como CSS, JavaScript e views.
- `routes/`: definições de rotas da aplicação.
- `storage/`: armazenamento de logs, cache e arquivos gerados.
- `tests/`: testes automatizados de unidade e funcionalidade.

## Fluxo de Requisições

1. O usuário faz uma requisição HTTP para o servidor.
2. O framework carrega as rotas e encontra o controlador correspondente.
3. O controller executa a lógica de negócio usando os models.
4. Os models acessam o banco de dados e retornam os dados necessários.
5. O controller retorna uma view ou resposta JSON para o cliente.

## Padrões e Tecnologias

- Padrão MVC para separação de responsabilidades.
- Autenticação e autorização integradas via sistema de usuários do Laravel.
- Migrations para versionamento da base de dados.
- Composer para dependências PHP.
- Node.js e Vite para gerenciamento e build de assets front-end.

## Integrações e Extensões

O sistema pode ser estendido com novos módulos, como:
- gestão avançada de utilizadores e permissões;
- relatórios de vendas e estoque;
- integrações de pagamento;
- notificações por email ou SMS.
