# UNIFY - Sistema de Streaming de Música 🎵

## Descrição da Aplicação
O UNIFY é uma plataforma inicial para um sistema de streaming de música (Tema 13). Esta aplicação permite o cadastro e a visualização do catálogo de músicas, onde os usuários podem registrar o nome da faixa, o artista e o gênero musical.

## Tecnologias Utilizadas
* **Back-end:** Node.js com Express
* **Front-end:** HTML, CSS e JavaScript (Vanilla)
* **Banco de Dados:** MySQL 8.0
* **Infraestrutura:** Docker e Docker Compose

## Arquitetura Utilizada
A aplicação utiliza uma arquitetura multicontainer composta por:
1. **Container App:** Roda o Node.js expondo uma API REST e servindo o frontend estático.
2. **Container DB:** Roda o MySQL. 
Os containers se comunicam através de uma rede Docker interna (`unify_network`). Os dados do banco são persistidos utilizando um Docker Volume (`unify_data`).

## Variáveis de Ambiente
As variáveis são gerenciadas pelo arquivo `.env`:
* `DB_HOST`: unify_db
* `DB_USER`: root
* `DB_PASSWORD`: unify_secret
* `DB_NAME`: unify_database

## Portas Utilizadas
* **Aplicação Web (Node):** Porta `3000` (acessível via `http://localhost:3000`)
* **Banco de Dados (MySQL):** Porta `3306`

## Instruções Completas de Execução

### Pré-requisitos
Ter o [Docker](https://docs.docker.com/get-docker/) e o Docker Compose instalados em sua máquina.

### Comandos Necessários
1. Clone este repositório.
2. Navegue até a pasta do projeto via terminal.
3. Para construir a imagem e iniciar os containers, execute:
   ```bash
   docker compose up -d --build