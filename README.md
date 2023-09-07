# web-3-1

メルカリ風アプリ『COACHTECH』
<<img width="1882" alt="COACHTECH index" src="https://github.com/nojinogit/web-3-1/assets/127584258/372d59a0-3cc4-4e3e-83f4-9997d5dc5974">>

#作成の目的  
coachtech ブランドのアイテムを出品する。

#アプリケーション URL  
検索ページ‥http://43.207.2.213/  
メールアドレス「admin@aol.com」パスワード「123456789」で管理者ログインできます。  
Mailpit‥メールテストページ　http://43.207.2.213:8025/  
phpMyAdmin‥データベース確認ページ　http://43.207.2.213:8080/

#機能一覧  
会員登録ページ表示  
会員登録  
ログイン  
ログアウト  
商品一覧ページ表示  
商品詳細ページ表示  
商品一覧ページ検索  
商品一覧(売約済み含む)ページ検索  
コメントページ表示  
銀行振込・コンビニ入金情報受信  
おすすめ商品表示  
お気に入り商品一覧ページ表示  
商品お気に入り追加  
商品お気に入り削除  
コメント追加  
コメント削除  
マイページ表示  
購入商品一覧ページ表示  
プロフィール更新ページ表示  
プロフィール更新機能  
入金口座登録ページ表示  
入金口座登録  
出品ページ表示  
出品機能  
商品取り下げ機能  
購入確認ページ表示  
銀行振込にて購入機能  
コンビニ入金にて購入機能  
配達先変更ページ表示  
配達先変更機能  
クレジットカードにて購入機能  
以前利用したクレジットカードにて購入機能  
商品発送完了記録機能  
管理ページ表示  
アカウント検索表示機能  
アカウント削除機能  
アカウントへの管理者権限付与機能  
アカウントへの管理者権限削除機能  
メール送信機能  
商品検索表示機能  
入金残高検索機能  
入金残高有ユーザーのみ表示機能  
入金完了記録機能

#使用技術  
Laravel Framework 10.2.5/
php:8.2.4/
mysql:8.0.26/
phpmyadmin/
mailpit/
jquery:3.4.1/

#テーブル設計  
<img width="1152" alt="テーブル仕様書" src="https://github.com/nojinogit/web-3-1/assets/127584258/eddd06d0-3cb7-4cde-8afe-04c8cafa4d73">

#ER 図  
<img width="624" alt="rese-ER" src="https://github.com/nojinogit/web-3-1/assets/127584258/b24e8e62-20e2-4917-9a18-fb279b4f3b3b">

#環境構築  
・プロジェクトをコピーしたいディレクトリにて「git clone https://github.com/nojinogit/web-2-1.git」を行いプロジェクトをコピー  
・「cd web-2-1/src」を行い.env.example のあるディレクトリに移動  
・.env.example をコピーし.env を作成  
・.env の　 DB_DATABASE=laravel_db DB_USERNAME=laravel_user DB_PASSWORD=laravel_pass を記載  
・docker-compose.yml の存在するディレクトリにて「docker-compose up -d --build」  
・php コンテナに入る「docker-compose exec php bash」  
・コンポーザのアップデート「composer update」  
・APP_KEY の作成「php artisan key:generate」  
・テーブルの作成「php artisan migrate」もしくは「php artisan migrate:fresh」※私の環境では「fresh」をつけないと git hub からクローンしたプロジェクトではテーブルを作成できませんでした  
・店舗データ・マスターユーザの作成「php artisan db:seed」  
・シンボリックリンク作成「php artisan storage:link」  
・php コンテナから「exit」し node コンテナに入る「docker-compose exec node bash」  
・npm インストール「npm install && npm run build」  
・権限のエラーが出た場合は「sudo chmod -R 777 src」にて権限解除してください  
以上でアプリ使用可能です「localhost/」にて店舗検索ページ開きます。  
管理者ユーザメールアドレス『admin@admin』パスワード『123456789』でログイン可能です。  
パスワードリセットメール・認証メール・お知らせメールは Mailpit「localhost:8025/」 に届きます。

##備考  
決済システム stripe にはアカウント作成後にテスト環境の公開キー・シークレットキーを.env ファイルの STRIPE_PUBLIC_KEY=　 STRIPE_SECRET_KEY=　に下さい。  
スケジューラーのテストはコンテナにて『php artisan schedule:work』を行ってください。  
マネジメント画面から送信できるお知らせメールと当日 AM8:00 に届くお知らせメールは同じ内容です  
予約時間の 1 時間後になるとレビュー箇所が店舗詳細にでてきますので、すぐに表示したい場合は phpmyadmin「localhost:8080/」から予約時間を作成/変更し、コンテナにて『php artisan schedule:work』を動かしてテストしてください。  
github のファイルではローカルで環境が完結した方がよいと考え、画像ファイルは storage/app/public/sample に保存されます。デプロイしたアプリでは s3 に保存されるコードにしてあります。  
店舗代表者を設定すると代表者のマイページに QR コードが表示され、当日の予約一覧にリンクします。
