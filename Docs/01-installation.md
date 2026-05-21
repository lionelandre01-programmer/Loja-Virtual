# Instalação do Sistema

## Requisitos mínimos

- PHP 8.1 ou superior
- MySQL 8.0 / MariaDB 10.5 ou superior
- Composer
- Node.js 16+ e npm
- Servidor web (Apache ou Nginx) ou ambiente local como Laragon

## Passos de instalação

1. **Clonar o repositório**
   ```bash
   git clone https://seu-repositorio/Loja-Virtual.git
   cd Loja-Virtual/SistemaGestao
   ```

2. **Instalar dependências PHP**
   ```bash
   composer install
   ```

3. **Instalar dependências JavaScript**
   ```bash
   npm install
   ```

4. **Configurar arquivo .env**
   - Copie o arquivo de exemplo:
     ```bash
     cp .env.example .env
     ```
   - Defina as variáveis de ambiente no `.env`, incluindo:
     - `APP_NAME`
     - `APP_ENV`
     - `APP_URL`
     - `DB_CONNECTION=mysql`
     - `DB_HOST`
     - `DB_PORT`
     - `DB_DATABASE`
     - `DB_USERNAME`
     - `DB_PASSWORD`

5. **Gerar chave da aplicação**
   ```bash
   php artisan key:generate
   ```

6. **Criar e migrar o banco de dados**
   - Crie o banco de dados no MySQL/MariaDB com o nome definido em `DB_DATABASE`.
   - Execute as migrations:
     ```bash
     php artisan migrate
     ```
   - Se houver seeders necessários, execute:
     ```bash
     php artisan db:seed
     ```

7. **Executar o backend**
   ```bash
   php artisan serve
   ```
   - O aplicativo ficará disponível em `http://127.0.0.1:8000` por padrão.

8. **Executar o frontend (se aplicável)**
   - Caso o frontend dependa do Vite e assets do Laravel:
     ```bash
     npm run dev
     ```
   - Para compilar para produção:
     ```bash
     npm run build
     ```

## Observações adicionais

- Garanta que o servidor web tenha acesso à pasta `public/`.
- Verifique permissões de escrita para `storage/` e `bootstrap/cache/`.
- Caso use Laragon, configure o host virtual para apontar para `SistemaGestao/public`.
