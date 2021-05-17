<p align="center">Mentes Notáveis PHP Puro</p>
API que terá os recursos abaixo:

- CRUD de usuário
- Obter endereços
- Obter endereço por id
- Obter Cidades
- Obter Cidades por id
- Obter Estados
- Obter Estado por id
- Obter total de usuários cadastrados por cidade
- Obter total de usuários cadastrados por estado


### Instalação

Ambiente local, considerando que você já tenha o PHP e o Composer instalado.

- Clonar o projeto
```bash
git clone https://github.com/bandrade93/mentes-notaveis-php-puro.git && cd mentes-notaveis-php-puro
```

- Instalação da base de dados (Após criar a base "mentes-notaveis"):
```bash
Seguir os passos que estão dentro do arquivo database/dump.sql
```

Requisições da api feitos pelo Insomnia 

- Requisições GET

```bash
http://url-local/mentes-notaveis-puro/states
http://url-local/mentes-notaveis-puro/states/{id}
http://url-local/mentes-notaveis-puro/cities
http://url-local/mentes-notaveis-puro/cities/{id}
http://url-local/mentes-notaveis-puro/address
http://url-local/mentes-notaveis-puro/address/{id}
http://url-local/mentes-notaveis-puro/users
http://url-local/mentes-notaveis-puro/users/{id}
```

- Requisições PUT, PATCH, POST (Via insomnia), passar arquivo localizado na pasta json
```bash
http://url-local/mentes-notaveis-puro/users
http://url-local/mentes-notaveis-puro/users/{id}
```

### Sobre

#### Requerimentos

- Essa API trabalha com PHP (^7.3)
- Mysql (8.0.18)

#### Files for review

```bash
config
├── Validation.php
connection
├── config.php
├── Connection.php
controller
├── AddressController.php
├── CityController.php
├── StateController.php
├── UserController.php
database
├── dump.sql
json
├── user.json
model
├── Address.php
├── City.php
├── State.php
├── User.php
index.php
Route.php
```

