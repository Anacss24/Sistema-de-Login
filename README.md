


# 💻 Sistema de Login 

Projeto front-end de login e registro de usuário, com integração de Api.



## 🚀 Pré-Requisitos 

Software necessários para a instalação:

<ul>
 <li>PHP 7.1 ou superior</li>
 <li>Composer</li>
 <li>MySql</li>
 <li>Laravel</li>
 <li>Postman</li>
</ul>

## 🔧 Instalação

### Clonar o projeto
```
git clone http://10.6.43.209:3000/Estagiarios/Sistema-de-Login.git  
```
### Entrar no diretório criado 
```
cd Sistema_de_Login
```
### Instalar as dependências do projeto
```
composer install
composer update
```

### Crie o Arquivo .env
```
cp .env.example .env
```
### Atualize as variáveis de ambiente do arquivo .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= ""
DB_USERNAME=root
DB_PASSWORD= ""
```

### Gerar a key do projeto Laravel
```
php artisan key:generate
```

### Migrar as tabelas 
```
php artisan migrate
```
### Instalar npm
```
npm install
npm run build
npm run dev
```

### Iniciar o servidor
```
php artisan serve
```

## Administrador da Página 

- Alterar o 'id' para definir o administrador.
- Alteração no diretório App\Policies\AuthenticationPolicy.php;
- A capacidade de exclusão de usuários é uma funcionalidade exclusiva do administrador.
 
 ## Acessar todos os usuários cadastrados
  ```
  http://127.0.0.1:8000\api\login
 ```
 ## Gerar o Token via API para a Autorização

- Método 'Post', inserir o email e a senha do usuário  
```
http://127.0.0.1:8000\api\auten
```
Inserir o token na Autorização, para que o usuário possa excluir o usuário. 






