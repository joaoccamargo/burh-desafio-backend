# Desafio Backend BURH - API Restful Job Portal

Este projeto é uma API RESTful para gerenciamento de vagas de emprego e candidatos, desenvolvida em **Laravel 12** e utilizando **MySQL** como banco de dados.

---

## 🚀 Tecnologias
- PHP 8+
- Laravel 12
- MySQL 8 (Docker)
- Composer

---

## 📦 Instalação

### Pré-requisitos
- Docker instalado
- PHP 8 e Composer

### Passo a passo

1. Clone o repositório:
   ```sh
   git clone https://github.com/joaoccamargo/burh-desafio-backend.git
   cd burh-desafio-backend
2. Instalação composer
   ```sh
   composer install
3. Docker compose
   ```sh
   docker compose up -d
4. Configuração env
   ```sh
   Renomeie o arquivo env.example com os dados do banco de dados que estão no arquivo docker-compose.yml
5. Iniciando laravel
   ```sh
   php artisan serve

Para Acessar o banco de dados utilize um (SGBD) de sua preferencia, colocando os mesmos dados que estão no arquivo docker-compose.yml
