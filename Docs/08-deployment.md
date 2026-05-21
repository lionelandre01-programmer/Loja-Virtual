# Publicação do Sistema

## Objetivo

Este documento descreve o processo de deploy do sistema Loja Virtual em ambiente de produção, incluindo compilação, configuração do servidor, ambiente e segurança básica.

## Passos de build e preparação

1. **Instalar dependências**
   - PHP e Composer:
     ```bash
     composer install --optimize-autoloader --no-dev
     ```
   - Node.js e npm (se houver assets front-end):
     ```bash
     npm install
     npm run build
     ```

2. **Configurar variáveis de ambiente**
   - Copie o arquivo de exemplo:
     ```bash
     cp .env.example .env
     ```
   - Ajuste valores para produção:
     - `APP_ENV=production`
     - `APP_DEBUG=false`
     - `APP_URL=https://seu-dominio.com`
     - `DB_CONNECTION=mysql`
     - `DB_HOST`
     - `DB_PORT`
     - `DB_DATABASE`
     - `DB_USERNAME`
     - `DB_PASSWORD`
     - `MAIL_*` (se usar envio de e-mail)
   - Garanta que a chave da aplicação esteja gerada:
     ```bash
     php artisan key:generate
     ```

3. **Executar migrations**
   - No servidor de produção, rode:
     ```bash
     php artisan migrate --force
     ```
   - Se houver seeders necessários para dados iniciais:
     ```bash
     php artisan db:seed --force
     ```

4. **Cache e otimização**
   - Gerar cache de configuração e rotas:
     ```bash
     php artisan config:cache
     php artisan route:cache
     php artisan view:cache
     ```
   - Opcionalmente otimizar autoload:
     ```bash
     composer dump-autoload -o
     ```

## Configuração do servidor

### Requisitos de servidor
- PHP 8.1+ com extensões necessárias (PDO, mbstring, cURL, OpenSSL, fileinfo, tokenizer, xml, bcmath, etc.)
- MySQL / MariaDB
- Servidor web: Apache ou Nginx
- Certificado TLS/SSL para HTTPS

### Estrutura do diretório
- A raiz pública do domínio deve apontar para `SistemaGestao/public`.
- Os diretórios `storage/` e `bootstrap/cache/` devem ser graváveis pelo usuário do servidor web.

### Apache
- Use `DocumentRoot` apontando para `.../Loja-Virtual/SistemaGestao/public`
- Ative `mod_rewrite`
- Certifique-se de que o arquivo `.htaccess` está presente em `public/`

### Nginx
- Configure `root` para a pasta `.../Loja-Virtual/SistemaGestao/public`
- Redirecione todas as requisições para `index.php`
- Exemplo de configuração:
  ```nginx
  server {
      listen 80;
      server_name seu-dominio.com;
      root /var/www/Loja-Virtual/SistemaGestao/public;

      index index.php;

      location / {
          try_files $uri $uri/ /index.php?$query_string;
      }

      location ~ \.php$ {
          fastcgi_pass unix:/run/php/php8.1-fpm.sock;
          fastcgi_index index.php;
          include fastcgi_params;
          fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
      }

      location ~ /\.ht {
          deny all;
      }
  }
  ```

## Ambiente de produção

- Configure `APP_DEBUG=false` para não expor erros.
- Use `APP_ENV=production`.
- Ative cache de configuração e rotas para melhor performance.
- Configure logging em `storage/logs/` e monitore erros.
- Use `SESSION_DRIVER` e `CACHE_DRIVER` adequados ao ambiente, por exemplo `file`, `redis` ou `database`.

## Segurança básica

- Habilite HTTPS com certificado válido.
- Mantenha o Laravel atualizado e a dependências revisadas.
- Não exponha o diretório `.env` publicamente. Este deve ser extritamente confidencial.
- Ajuste permissões: `storage/` e `bootstrap/cache/` devem ser graváveis; outros arquivos não precisam ser graváveis.
- Desative `APP_DEBUG` em produção.
- Proteja o acesso ao servidor com firewall e atualizações de sistema.
- Verifique que o diretório `public/` é o único exposto pelo servidor web.

## Deploy contínuo e atualizações

- Use controle de versão Git para gerenciar o código.
- Para cada atualização, puxe o código no servidor e execute:
  ```bash
  git pull origin main
  composer install --optimize-autoloader --no-dev
  npm install
  npm run build
  php artisan migrate --force
  php artisan config:cache
  php artisan route:cache
  php artisan view:cache
  ```
- Reinicie o serviço PHP-FPM / servidor web se necessário.

## Backup e monitoramento

- Faça backup regular do banco de dados.
- Mantenha backups do arquivo `.env` em local seguro.
- Monitore os logs em `storage/logs/laravel.log`.
- Revise o uso de disco, memória e disponibilidade do banco de dados.
