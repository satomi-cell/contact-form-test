# Mogitate

## アプリケーション概要

商品を登録・管理できる商品管理アプリです。
商品の登録、一覧表示、編集、削除を行うことができます。

---

## 環境構築

### Dockerビルド

```
git clone https://github.com/satomi-cell/mogitate.git
cd mogitate
docker-compose up -d --build
```

### Laravel環境構築

```
docker-compose exec app bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
```

---

## 使用技術

* PHP 8.x
* Laravel 8.x
* MySQL 8.0
* Docker
* Nginx

---

## ER図

![ER図](./ER.png)

---

## URL

* 開発環境：http://localhost:8000
* phpMyAdmin：http://localhost:8080
