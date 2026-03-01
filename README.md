# 🛍️ LIONANDRE - Loja Virtual de Moda

**Sistema completo de gestão e venda online de artigos de moda**

Uma plataforma moderna e intuitiva para gerir uma loja virtual de roupas, acessórios e jóias, com funcionalidades avançadas de controlo de inventário, movimentos e análise de vendas.

---

## 📋 Sobre o Projeto

**LIONANDRE** é uma solução empresarial completa para a gestão de uma loja virtual de moda. O sistema foi desenvolvido em **Laravel** e oferece:

- 🛒 Catálogo dinâmico de produtos de moda
- 📊 Dashboard com análise de vendas em tempo real
- 📦 Gestão completa de inventário e movimentos
- 👥 Sistema de utilizadores com diferentes roles
- 🧾 Faturação automática de encomendas
- 📱 Interface responsiva e moderna

---

## 🎯 Funcionalidades Principais

### Para Clientes
- ✨ Navegação intuitiva por categorias e géneros
- 🛒 Carrinho de compras funcional
- 🔍 Filtros avançados de produtos
- 📄 Visualização de faturas em PDF
- 👤 Gestão do perfil pessoal
- 📋 Histórico de encomendas

### Para Administradores
- 📊 Dashboard com métricas de vendas
- ➕ Gestão de produtos e inventário
- 📦 Controlo de encomendas
- 📈 Análise de movimentos do sistema
- 👥 Gestão de utilizadores
- 🔒 Sistema de autenticação seguro

---

## 🏗️ Estrutura do Projeto

```
SistemaGestao/
├── app/
│   ├── Http/Controllers/       # Controladores da aplicação
│   │   ├── ProdutoController.php
│   │   ├── EncomendaController.php
│   │   ├── CarrinhoController.php
│   │   └── UserController.php
│   └── Models/                 # Modelos de dados
│       ├── Produto.php
│       ├── Encomenda.php
│       ├── Movimento.php
│       ├── Categoria.php
│       ├── Carrinho.php
│       └── User.php
├── resources/views/            # Templates Blade
│   ├── sistema/               # Páginas do sistema
│   │   ├── dashboard.blade.php
│   │   ├── factura.blade.php
│   │   ├── meuperfil.blade.php
│   │   └── movimentodetalhes.blade.php
│   └── produto/               # Páginas de produtos
├── routes/web.php             # Definição de rotas
├── database/
│   ├── migrations/            # Migrações do banco de dados
│   └── seeders/              # Seeders para dados iniciais
└── public/                    # Assets públicos
    └── imagens/              # Imagens de produtos
```

---

## 📊 Modelos de Dados

### Produto
- ID, Nome, Preço, Quantidade, Descrição
- Género (Masculino/Feminino)
- Categoria (Jóias, Roupas, Acessórios, etc)
- Imagem

### Encomenda
- ID, User ID, Estado, Total, Endereço
- Itens da encomenda
- Data de criação

### Movimento
- ID, User ID, Categoria, Objeto, Código
- Tipo (Criação, Edição, Eliminação, Venda, etc)
- Quantidade, Nota, Alterações (old_name)
- Timestamps

### Utilizador
- ID, Nome (First + Last), Email, Password
- Role (Cliente, Admin, Funcionário)
- Timestamps

### Carrinho
- ID, User ID, Produto ID, Quantidade
- Relacionado com produtos e utilizadores

---

## 🌐 Categorias de Produtos

### Masculino
- 👕 Camisas
- 👖 Calças
- 👞 Calçados
- 💼 Carteiras
- 🧢 Chapéus
- 👟 Chinelos
- 🎒 Mochilas
- 🧥 Casacos
- 👔 Macacões
- ✨ Jóias

### Feminino
- 👚 Blusas
- 👖 Calças
- 👞 Calçados
- 💼 Carteiras
- 🧢 Chapéus
- 👟 Chinelos
- 🎒 Mochilas
- 🧥 Casacos
- 👗 Macacões e Vestidos
- ✨ Jóias

---

## 🔐 Segurança

- ✅ Autenticação com Laravel Auth
- 🔒 Encriptação de palavras-passe
- 🛡️ Proteção contra CSRF
- 👮 Middleware de autenticação
- 📝 Auditoria de movimentos

---

## 📈 Funcionalidades do Dashboard

O dashboard oferece visualização em tempo real de:

- **Estatísticas Principais**
  - Total de produtos
  - Total de encomendas
  - Receita total
  - Total de clientes

- **Encomendas Recentes**
  - Últimas 5 encomendas
  - Estado da encomenda
  - Valor total
  - Ações rápidas

- **Produtos Populares**
  - Top 5 produtos mais vendidos
  - Níveis de stock
  - Preços
  - Gestão de inventário

---

## 💾 Banco de Dados

As migrações incluem tabelas para:
- `users` - Utilizadores do sistema
- `produtos` - Catálogo de moda
- `encomendas` - Pedidos dos clientes
- `encomenda_items` - Itens de cada encomenda
- `carrinhos` - Carrinhos de compra
- `movimentos` - Auditoria de ações
- `categorias` - Categorias de produtos

---

## 🚀 Como Começar

### Requisitos
- PHP 8.2+
- Composer
- Laravel 11
- MySQL/MariaDB
- Node.js (para assets)

### Instalação

1. **Clonar o repositório**
   ```bash
   git clone https://github.com/lionelandre01-programmer/Loja-Virtual.git
   cd Loja-Virtual/SistemaGestao
   ```

2. **Instalar dependências PHP**
   ```bash
   composer install
   ```

3. **Copiar arquivo de ambiente**
   ```bash
   cp .env.example .env
   ```

4. **Gerar chave de aplicação**
   ```bash
   php artisan key:generate
   ```

5. **Configurar banco de dados**
   - Editar `.env` com credenciais do banco
   - Executar migrações:
   ```bash
   php artisan migrate
   ```

6. **Instalar assets frontend** (se aplicável)
   ```bash
   npm install
   npm run dev
   ```

7. **Iniciar servidor**
   ```bash
   php artisan serve
   ```

A aplicação estará disponível em `http://localhost:8000`

---

## 🛣️ Rotas Principais

### Públicas
- `GET /` - Página inicial
- `GET /user/registrar` - Formulário de registo
- `GET /user/fazerLogin` - Página de login

### Autenticadas
- `GET /dashboard` - Dashboard principal
- `GET /user/perfil` - Perfil do utilizador
- `GET /loja` - Catálogo de produtos
- `GET /carrinho` - Carrinho de compras
- `GET /encomendas` - Minhas encomendas
- `POST /encomenda/store` - Criar encomenda
- `GET /encomenda/pdf/{id}` - Gerar fatura PDF

### Admin
- `GET /produto/create` - Adicionar produto
- `POST /produto/store` - Guardar produto
- `GET /categoria` - Gestão de categorias

---

## 📄 Documentação de Recursos

### Factura (Fatura)
Relatório detalhado de encomendas incluindo:
- ID da encomenda
- Dados do cliente
- Produtos e quantidades
- Preços unitários e totais
- Estado da encomenda
- Endereço de entrega
- Impressão em PDF

### Dashboard
Painel de controlo com:
- Estatísticas em cards
- Tabelas de encomendas recentes
- Produtos populares
- Ações rápidas

### Movimentos
Sistema completo de auditoria com:
- Detalhes de cada ação
- Utilizador responsável
- Alterações (incluindo old_name)
- Histórico completo

---

## 🎨 Interface Gráfica

A aplicação utiliza:
- **Design Moderno** com gradientes e cores profissionais
- **CSS Grid e Flexbox** para layouts responsivos
- **Blade Templates** para renderização dinâmica
- **Responsive Design** para mobile e desktop
- **Transições Suaves** e feedback visual

---

## 👥 Tipos de Utilizador

1. **Cliente** - Pode comprar, ver perfil e encomendas
2. **Admin** - Acesso completo ao sistema
3. **Funcionário** - Gestão de produtos e encomendas

---

## 📞 Suporte

Para suporte ou questões, entre em contacto através de:
- 📧 Email: lionandre@company.pt
- 🌐 Website: https://lionelandre01-programmer.github.io/portfolio/
- 🐙 GitHub: https://github.com/lionelandre01-programmer

---

## 📜 Licença

Este projeto está sob licença MIT. Veja o arquivo LICENSE para mais detalhes.

---

## 🚀 Roadmap Futuro

- [ ] Integração de pagamentos (Stripe, PayPal)
- [ ] Sistema de notificações por email
- [ ] Avaliações e comentários de produtos
- [ ] Wishlist/Favoritos
- [ ] Chat de suporte ao cliente
- [ ] Programa de fidelidade
- [ ] Análise avançada com gráficos
- [ ] Integração com redes sociais

---

## 📝 Notas

- Todos os preços estão em EUR (€)
- IVA padrão: 23%
- Sistema de movimentos rastreia todas as alterações incluindo mudanças de nomes (old_name)
- Backup automático recomendado

---

**Versão 1.0** | Desenvolvido com ❤️ para moda