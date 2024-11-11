# FashionabilyLate

## 環境構築
Dockerビルド

    1.git clone リンク
    2.docker compose up -d --build

Laravel環境構築

    1.docker compose exec php bash
    2.composer install
    3..env.exampleファイルから.envを作成し、環境変数を変更
    4.php artisan key:generate
    5.php artisan migrate
    6.php artisan db:seed

## 使用技術

    ・PHP 7.4.9-fpm
    ・Laravel 8.83.27
    ・nginx 1.21.1
    ・MySQL 8.0.26

## ER図

    https://github.com/user-attachments/assets/d6b2a181-5c77-437c-b0e0-c691b1eb1592


## URL

    ・開発環境：http://localhost/
    ・phpMyAdmin：http://localhost:8080/# FashionabilyLate
