## setup
```
$ touch .env
$ touch cp .env_aws.example .env_aws
$ echo 'APP_KEY=' > .env

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

### 目的
あくまで技術力、自力の証明によるポテンシャルアピール
```
1 必要な要件を作成し、一旦laravelで作る

2 SPAを採用して一旦Reactで作る

3 Rubyでlaravelと同じものを作る

4 そこにフロントを合わせる

5 マイクロサービスっていうほどでもないが、Vueで＋α作成

6 それらをインフラ構築する
```
### 方針
```
$ touch .env
$ touch cp .env_aws.example .env_aws
$ echo 'APP_KEY=' > .env

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

### やらないこと
凝ったアイデアを実現することや<br/>
サービスを見せることが目的ではない
```
・凝ったデザインは見せないしやらない

・SP版に特化した部分は見せない
→時間あればできるポテンシャル優先

・法律周りはざっくりで

・全部作るのは無理なのでシステム的に本質な部分を扱う
```
### 題材選択理由
```
1 実際に作っているものに近いサービスを開発することで<br/>
より温度感の理解と難しいだろうなという仕様の発見や<br/>
自分のアイディアを育成するため。

2 コードの書き方などが理解しやすいので性格とか開発者が理解しやすいし、
題材の関係上話もしやすい

3 技術力があり時間があって行動さえすれば、
いつでも作れるし、すぐ行動する力を持っているので
現時点(未熟な段階)でもアイディアの実現は一旦保留
```


## 要件定義
```
管理者が入力依頼を送る(TODOでプロセスがわかる)
従業員本人　入力
管理者がそのデータを管理
場合によっては書類作成などを行う

それらをサービスを管理する管理画面
```

管理画面とクライアントサイド側に２つ
### 最低限必要なもの
・クライアントサイド
```
・従業員認証
・通知を受け取る
・従業員情報登録 Form => users
・preview機能
```
・クライアント管理画面
```
・従業員管理データ一覧
・申請通知送信機能

・入退社手続き
　・users :
　・役職テーブル、部署、

```
・サービス管理画面
```
・会社一覧
・ID発行
```

## あったらいいな
```
・年末調整
・雇用契約
・Web給与明細
・各種労務手続き、電子申請
・分析レポート?
```
## table 
```
companies
・会社名、住所、tel、代表、会社ID、商号、業種、取引判定、契約期間、etc...
履歴？？

Service_users
姓、名、カナ、生年月日、性別、プロフィール画像、本人確認書類、ミドルネーム、tel、email
入社予定日、社員番号、雇用形態、役職、部署、特筆

// todo 認証
Service_Administrators -- users
姓、名、カナ、性別、プロフィール画像、本人確認書類、ミドルネーム、tel、email
入社予定日、社員番号、雇用形態、役職、部署、特筆

posts or positions
役職名、

Departments
部署名、


```