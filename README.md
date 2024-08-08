# Guincho  Tech - :construction: em desenvolvimento :construction:
Projeto desenvolvido a fim de auxiliar o gerenciamento das empresas de guincho, reduzindo custos operacionais e aprimorando a
experiência do armazenamento e gerenciamento de serviços prestados no dia-a-dia. <br>
O desenvolvimento foi projetado com a finalidade principal de estudos, futuramente será realizado a integração de fato
com a empresa realizando os ajustes necessários.

## Tecnologias utilizadas
Ferramenta foi desenvolvida em duas partes, a API desenvolvida com framework php Laravel, com o uso de pacotes como o Laravel Sanctum
para gerenciar os acessos a ferramenta com base no login e role de cada usuário. <br>
O repositorio para o front-end da aplicação pode ser encontrado [por aqui](https://github.com/lanng/front-guincho-tech)

## Tabela de conteúdo
 - [Início](#guincho--tech)
 - [Tecnologias](#tecnologias-utilizadas)
 - [Instalação](#instalação)

## Instalação

### Pré-requisitos

Antes de começar, certifique-se de que você tem os seguintes softwares instalados:

- **PHP** (versão 8.x ou superior)
- **Composer** (gerenciador de dependências do PHP)
- **Git** (para clonar o repositório)
- **MySQL** (para o banco de dados)

### Passo a Passo

### 1. Clonar o Repositório

```bash
 git clone https://github.com/lanng/guincho-tech
```

### 2. Navegar até o Diretório do Projeto

```bash
 cd guincho-tech
```

### 3. Instalar as Dependências do PHP

```bash
  composer install
```

### 4. Configurar o Arquivo `.env`

```bash
cp .env.example .env
```
Abra o arquivo `.env` no editor de texto de sua escolha e altere conforme necessário.

### 5. Gerar a Chave da Aplicação

```bash
  php artisan key:generate
```

### 6. Configurar o Banco de Dados

```bash
  php artisan migrate
```

### 7. Executar o seeders para ter acesso aos usuários autenticados

```bash
    php artisan db:seed
```
Será gerado um usuário administrador e um usuário normal, pode ser alterado editando o seeder.

### 8. Rodar o Servidor de Desenvolvimento

```bash
  php artisan serve
```
A aplicação ficará disponível em `http://localhost:8000`.

## Projeto em desenvolvimento
