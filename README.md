# Laravel Sample Project

このリポジトリは、Laravelのサンプルプロジェクトです。
詳しくは [LaravelRead.md](https://github.com/kuroneko52/Laravel-Sample2/blob/main/LaravelRead.md) を参照してください

## Summary

Laravelを使ったWebアプリケーションの基本的な構造と実装例を提供します。

## Required Environment

- PHP8.3
- MariaDB
- Laravel11
- Composer
- Node.js & npm

## PHP Extentions
公式ドキュメント [Deployment](https://laravel.com/docs/11.x/deployment#server-requirements) のServer Requirementsを参照

## How to Install

1. Clone this Repository

   ```
   git clone git@github.com:kuroneko52/Laravel-Sample2.git
   cd Laravel-Sample
   ```

2. Install Package

   ```
   composer install
   npm install
   ```

3. Create and configure Environment Files

   ```
   cp .env.example .env
   ```

   `.env` ファイルを編集し、データベースなどの情報を設定してください。

4. Generate Application Key

   ```
   php artisan key:generate
   ```

5. Execute migration

   ```
   php artisan migrate
   ```

6. Install Laravel UI Package

   ```
   composer require laravel/ui
   php artisan ui vue --auth
   npm install
   ```
   
7. Build

   ```
   npm run build
   ```

8. Start the Server

   ```
   php artisan serve
   ```

9. Start the Dev Server

   ```
   npm run dev
   ```

## Treatment

ブラウザで `http://localhost:8000` and `http://127.0.0.1:8000`にアクセスしてください。

## Troubleshooting

`npm` コマンドが使えなくなってこんなエラーが出たら

   ```
   $ npm run build

   > build
   > vite build

   sh: 1: vite: not found
   ```

ログを見て

   ```
   $ ~/.npm/_logs/xxxxxxxx-eresolve-report.txt

   # npm resolution error report

   While resolving: undefined@undefined
   Found: vite@6.3.5
   node_modules/vite
   dev vite@"^6.0.11" from the root project

   Could not resolve dependency:
   peer vite@"^4.0.0 || ^5.0.0" from @vitejs/plugin-vue@4.6.2
   ```

`@vitejs/plugin-vue` のバージョンをアップ(推奨)するか、`vite` のバージョンを下げる

   ```
   Upgrade vite & @vitejs/plugin-vue

   $ npm install vite@latest @vitejs/plugin-vue@latest
   ```

or
   
   ```
   Downgrade vite
   
   $ npm install vite@^5.0.0
   ```

開発環境だけに適応させる末尾オプション

   ```
   --save-dev
   ```

`node_modules/`  フォルダーと `package-lock.json` を削除して `npm install` で依存解決

   ```
   rm -rf node_modules package-lock.json

   npm install
   ```

## How to Test

### Create Test Database Environment

1. Create Test Database

2. Create `.env.testing`

   ```
   cp .env .env.testing
   ```

   Edit Database Settings

### Important

`.gitignore` に `.env.testing` があることを確認

### Test Commands

1. all
   ```
   php artisan test
   ```

2. filter file or class
   ```
   php artisan test tests/xxxxx/ExampleTest.php
   ```

   or

   ```
   php artisan test --filter ExampleTest
   ```

3. filter method
   ```
   php artisan test --filter it_your_test_method_name
   ```

4. filter class and method
   ```
   php artisan test --filter ExampleTest::it_your_test_method_name
   ```

## License

このプロジェクトは [MIT License](https://github.com/kuroneko52/Laravel-Sample2/blob/main/LICENSE) のもとで公開されています。
