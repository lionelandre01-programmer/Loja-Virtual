# Visão Geral do Sistema

## Objetivo do Sistema

O sistema Loja Virtual foi desenvolvido para gerir uma loja online com foco em vendas de produtos, controlo de stock, processamento de encomendas e atendimento aos clientes. O objetivo principal é oferecer uma plataforma simples e segura para gerir produtos, preços, carrinhos de compra, encomendas e movimentos de stock, permitindo que administradores, funcionários e clientes interajam de forma eficiente.

## Módulos Principais

1. **Gestão de Produtos**
   - Cadastro e manutenção de produtos.
   - Organização por categorias.
   - Controle de atributos como nome, preço, descrição e estoque.

2. **Carrinho de Compras**
   - Inclusão, alteração e remoção de itens do carrinho.
   - Cálculo automático de valores e quantidade de produtos.
   - Interface para o cliente finalizar a compra.

3. **Encomendas e Pagamentos**
   - Criação de encomendas a partir do carrinho.
   - Registro do estado da encomenda.
   - Vinculação de itens da encomenda e valores totais.

4. **Movimentos de Stock**
   - Controle de entrada e saída de produtos.
   - Registro de movimentos vinculados a operações de venda e inventário.
   - Relatórios sobre alterações de estoque.

5. **Usuários e Permissões**
   - Cadastro de utilizadores com diferentes perfis.
   - Controle de acesso baseado em funções.
   - Gestão de autenticação e sessões.

6. **Relatórios e Histórico**
   - Visualização de encomendas realizadas.
   - Histórico de movimentos de stock.
   - Monitorização do desempenho das vendas.

## Perfis de Utilizadores

- **Administrador**
  - Acesso completo ao sistema.
  - Pode gerir produtos, categorias, utilizadores, encomendas e movimentos.
  - Configura permissões e supervisiona o funcionamento geral.

- **Funcionário**
  - Opera na gestão de vendas e atendimento.
  - Regista encomendas, atualiza estados e executa movimentos de stock.
  - Pode consultar produtos e clientes, mas com permissões mais restritas que o administrador.

- **Cliente**
  - Navega pelo catálogo de produtos.
  - Adiciona itens ao carrinho e finaliza compras.
  - Consulta o histórico de encomendas e detalhamento dos pedidos.

## Fluxo Geral do Sistema

1. O cliente acede ao catálogo de produtos e seleciona itens.
2. Os produtos escolhidos são adicionados ao carrinho de compras.
3. O cliente revisa o carrinho e conclue a compra.
4. O sistema cria uma nova encomenda com os itens selecionados.
5. O stock do produto é atualizado através de um movimento de saída.
6. Os funcionários e administradores podem acompanhar e atualizar o estado da encomenda.
7. O administrador pode consultar relatórios de vendas e movimentos de stock para tomadas de decisão.

## Benefícios esperados

- Centralização da gestão do negócio em uma única plataforma.
- Redução de erros manuais no controle de estoque.
- Melhoria no atendimento aos clientes com acompanhamento transparente de encomendas.
- Agilidade na criação e monitorização de vendas.
