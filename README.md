# CRUD DE ESCOLAS

Aplicação web do tipo monolítica criada com:
- PHP para o back-end ^7.4
- HTML, CSS e Javascript para front-end. 
- MySQL/MariaDB para o banco de dados.

## Funcionalidades:
- CRUD de Alunos (Emitindo PDF utilizando DomPDF)
- CRUD de Professores (Não finalizado)
- Crud de Cursos (Emitindo PDF utilizando DomPDF)
- CRUD de Categorias (Relacionamento com o CRUD de Cursos)
- CRUD de Usuarios

## Passo a passo para rodar o projeto
Certifique-se que seu computador tem os softwares
- PHP
- MySQL ou MariaDB
- Editor de texto (por exemplo VScode)
- Navegador Web (EX: Chrome, Firefox, Edge)
- Composer (Gerenciador de pacotes do PHP)

#### Clone o projeto
Baixe ou faça o clone do repositorio:
- Copie o endereço do repositorio
- Abra o terminal e execute o comando `git clone (endereçodoprojeto)`
Após isso, entre no diretorio que foi gerado e rode o comando:
- `cd PHP-CRUD-COMPOSER`

#### Habilitar as extensões do PHP
Abra o diretorio de instalação do PHP, encontre o arquivo ***php-ini-production***, renomeie-o para ***php-ini*** e abra com algum editor de texto.

Encontre as seguintes linhas e descomente-as, removendo ; que precede a linha.

- pdo_mysql
- curl
- mb_string
- openssl

#### Instalar as dependencias
Dentro do diretorio da aplicação execute no terminal:
`composer install`

Certifique-se que um diretorio chamo **/vendor** foi criado.

### Banco de Dados
> O banco de dados é do tipo relacional e contém as tabelas com até 2 niveis de normatização.

#### Criando o banco de dados
Entre no seu cliente de banco de dados, e execute o comando:
```sql 
CREATE DATABASE db_escola;  
```

#### Migrar a estrutura do banco de dados
Ainda dentro do cliente de banco de dados, copie e cole o conteudo do arquivo **db.sql** e execute.
Certifique-se que as tabelas foram criadas, executando o comando:
```sql
SHOW TABLES;
```

Se o resultado for a lista de tabelas existentes, então funcionou!

#### Configure as credenciais de acesso
Encontre o arquivo **/config/database.php** e edite-o conforme as credenciais do seu usuário do banco de dados.

### Crie o primeiro usuário de acesso
Dentro do diretorio da aplicação, execute no terminal o comando:
`php config/create-admin.php`;
Isso criará um usuário com as credenciais:
|Nome|Email|Senha|
| -  |  -  |  -  |
| Administrador | admin@admin.com | 123456 |

### Executando a aplicação:
Para executar e testar a aplicação, rode no terminal o seguinte comando:
`php -S localhost:(porta desejada) -t public`
Agora acesse o endereço http://localhost:8000 em seu navegador