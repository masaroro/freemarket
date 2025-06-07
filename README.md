# freemarket

## 環境構築

### Docker ビルド

1. GitHub からクローン
    ```
    git clone git@github.com:masaroro/freemarket.git
    ```
2. DockerDesktop アプリを立ち上げ
3. ビルドの実行
    ```
    docker-compose up -d --build
    ```

### Laravel 環境構築

1. コンテナ内にログイン
    ```
    docker-compose exec php bash
    ```
2. パッケージのリストをインストール
    ```
    composer install
    ```
3. 「.env.example」ファイルを 「.env」ファイルに命名を変更。または、.env ファイルを作成
4. env に以下の環境変数を追加
    ```
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=laravel_db
    DB_USERNAME=laravel_user
    DB_PASSWORD=laravel_pass
    ```
5. アプリケーションキーの作成
    ```
    php artisan key:generate
    ```
6. マイグレーションの実行
    ```
    php artisan migrate
    ```
7. シーディングの実行
    ```
    php artisan storage:link
    ```
8. シンボリックリンク作成
    ```
    php artisan db:seed
    ```

## 使用技術(実行環境)

-   PHP 7.4.9
-   Laravel 8.83.8
-   MySQL 8.0.26

## テーブル設計

## ER 図

## URL

-   開発環境：http://localhost/
-   phpMyAdmin:：http://localhost:8080/
