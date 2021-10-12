## setup
```
$ cp .env.example .env

$ docker-compose build
$ docker-compose up -d
$ docker-compose exec app composer install
$ docker-compose exec app npm install
$ docker-compose exec app npm run dev

$ docker-compose exec app php artisan key:generate
$ docker-compose exec app php artisan migrate:refresh --seed

$ docker-compose exec app chmod -R 777 storage
$ docker-compose exec app chmod -R 777 bootstrap/cache
```
## 開発時 コマンド
```
// 環境立ち上げ
$ docker-compose up

// sass js 監視
$ docker-compose exec app npm run watch

// サーバー設定変更時
$ docker-compose build
$ docker-compose up

// 各種ライブラリ変更時
$ docker-compose exec app composer install
$ docker-compose exec app npm install

```

