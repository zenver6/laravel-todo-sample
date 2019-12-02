# docker-laravel-template

Build Laravel's development environment using docker.
PHP7.3/MySQL8.0/nginx/node/redis/mailhog

## Build

- docker-compose build

## up

- docker-compose up -d

## login app container

- docker-compose exec app ash

## composer install

- docker-compose exec app ash
- composer install

## application key generate

- php artisan key:generate

## npm install

- docker-compose exec node ash
- npm install
- npm run dev

## access

- localhost:10080

## create project

- composer create-project --prefer-dist laravel/laravel .

### Laravel のディレクトリについて

- モデル
  - app/Models
- サービス
  - app/Services
- リポジトリ
  - app/Repositories
