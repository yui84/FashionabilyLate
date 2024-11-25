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

<img width="649" alt="スクリーンショット 2024-11-25 17 09 41" src="https://github.com/user-attachments/assets/94110312-ad0c-456c-8d96-6487f5fe36cf">



## URL

    ・開発環境：http://localhost/
    ・phpMyAdmin：http://localhost:8080/# FashionabilyLate
