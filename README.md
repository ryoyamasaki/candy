## 商品管理システム

最初にbasicauth認証でユーザー名とパスワードが要求されます。
ユーザー名 dogotyarinko
パスワード otsukareyumin

そして次にユーザーログイン画面が出ます
メールアドレス yaryo1229@yahoo.co.jp
パスワード tesuto123

## 動作環境
- PHP 8.4.5
- Laravel 8.x
- バージョンの関係で、エラーが出ることがありますが動作に影響はないので `php.ini` で以下のエラー設定を行ってください：
  ```ini
  error_reporting = E_ALL & ~E_DEPRECATED & ~E_NOTICE

### 環境構築手順

* Gitクローン
* .env.example をコピーして .env を作成
* MySQLかPostgreSQLのデータベース作成（名前：candy-store-main）  
ローカルでMAMPを使用しているのであれば、MySQL推奨
* .env にデータベース接続情報追加
```


```
* APP_KEY生成
```
$ php artisan key:generate
```
* Composerインストール
```
$ composer install
```
* フロント環境構築
```
$ npm install
$ npm run dev
```
* マイグレーション
```
$ php artisan migrate

* ローカルサーバーの起動

＄ php artisan serve

```

