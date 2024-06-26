# web-3-1

メルカリ風アプリ『COACHTECH』
<img width="1882" alt="COACHTECH index" src="https://github.com/nojinogit/web-3-1/assets/127584258/372d59a0-3cc4-4e3e-83f4-9997d5dc5974">

#作成の目的  
coachtech ブランドのアイテムを出品する。

#アプリケーション URL  
検索ページ‥http://43.207.2.213/  
メールアドレス「admin@aol.com」パスワード「123456789」で管理者ログインできます。  
一般ユーザーについては管理画面から確認できます。パスワードは「123456789」です。  
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

追加実装項目について  
管理画面について、今回は権限は管理者と一般ユーザーの 2 つです（運営確認済み）  
QR コード機能については実装せず別の独自機能を実装しました（運営確認済み）

独自機能について  
・おすすめ商品の表示機能 ‥最後と最後から２番目に見た商品に付けられているタグを持つ商品を表示するようにしました  
・クレジット決済+コンビニ決済‥stripe を使い決済方法にクレジット決済(前回利用カードの再利用もできるようにする)・コンビニ決済を追加し、銀行振込決済と合わせて決済方法を３種類としました  
・購入後処理‥商品が購入された後に入金待ち・発送待ち・発送済みといったメッセージを商品画像上に表示。出品者のマイページに発送待ちアラートを表示、出品者の商品詳細ページに発送先と発送完了ボタンをつけました  
・ポイント‥購入額の１％のポイントを付与し、次回から 1 ポイント＝１円で使用可能にしました  
・出品者への入金表示と完了処理‥出品者の入金口座登録機能と入金残高・入金口座を管理画面に表示し、入金完了処理を行えるようにしました

#使用技術  
Laravel Framework 10.2.5/
php:8.2.4/
mysql:8.0.26/
phpmyadmin/
mailpit/
jquery:3.4.1/

#テーブル設計  
<img width="1152" alt="テーブル仕様書" src="https://github.com/nojinogit/web-3-1/assets/127584258/499328c6-cd67-4c89-bddd-23d7f21f428c">

#ER 図  
<img width="624" alt="rese-ER" src="https://github.com/nojinogit/web-3-1/assets/127584258/b24e8e62-20e2-4917-9a18-fb279b4f3b3b">

#環境構築  
・プロジェクトをコピーしたいディレクトリにて「git clone https://github.com/nojinogit/web-3-1.git/ 」を行いプロジェクトをコピー  
・「cd web-3-1/src」を行い.env.example のあるディレクトリに移動  
・.env.example をコピーし.env を作成  
・.env の　 DB_DATABASE=laravel_db DB_USERNAME=laravel_user DB_PASSWORD=laravel_pass を記載  
・docker-compose.yml の存在するディレクトリにて「docker-compose up -d --build」  
・php コンテナに入る「docker-compose exec php bash」  
・コンポーザのアップデート「composer update」  
・APP_KEY の作成「php artisan key:generate」  
・テーブルの作成「php artisan migrate」もしくは「php artisan migrate:fresh」※私の環境では「fresh」をつけないと git hub からクローンしたプロジェクトではテーブルを作成できませんでした  
・アイテムデータ・ユーザの作成「php artisan db:seed」  
・シンボリックリンク作成「php artisan storage:link」  
・権限のエラーが出た場合は「sudo chmod -R 777 src」にて権限解除してください  
以上でアプリ使用可能です「localhost/」にて店舗検索ページ開きます。  
管理者ユーザメールアドレス『admin@aol.com』パスワード『123456789』でログイン可能です。

##備考  
・決済システム stripe にはアカウント作成後にテスト環境の公開キー・シークレットキーを.env ファイルの STRIPE_PUBLIC_KEY=　 STRIPE_SECRET_KEY=　に下さい。

・github のファイルではローカルで環境が完結した方がよいと考え、画像ファイルは storage/app/public/sample に保存されます。デプロイしたアプリでは s3 に保存されるコードにしてあります。

・phpunit テストについて‥まず src の.env.testing.example をコピーして.env.example を作ります。php コンテナにて「php artisan key:generate --env=testing」→ テスト用テーブルの作成「php artisan migrate --env=testing または php artisan migrate:fresh --env=testing」。今回はコントローラごとに tests/Feature にテストファイルを作成しました。php コンテナにて「vendor/bin/phpunit tests/Feature」ですべてのテストが実行されますが、stripe の公開キーとシークレットキーを.env.testing に入れておかないと stripe の決済機能はエラーがでます。stripe_webhook は入れなくてもテストは実行できます。

・webhook について‥今回 stripe の webhook を使い銀行振込・コンビニ入金で購入した商品に対し、金額を入金した時に stripe からの webhook によりアプリのデータベースに入金が記録される機能を実装しました。ですが webhook が https のみに対応しているため aws では機能は反映されていません（ドメインが必要なため見送りました）。ローカル環境では ngork を使用して https 環境を再現し機能の確認ができています。

ローカル環境での webhook の受信の方法 → こちらのサイト「https://biz.addisteria.com/ngrok-windows/ 」を参考に ngrok を導入して下さい → 次にコードを一部修正します、app/Providers/AppServiceProvider.php の//URL::forceScheme('https');のコメントアウトを外してコードを有効にしてください（https では js・css が崩れてしまうためそれを防ぎます）→ngrok.exe のあるフォルダで shift+右クリックで powershell ウインドウをここで開く →「./ngrok http 127.0.0.1」を入力 →Forwarding の「（例）https://4aca-219-100-86-141.ngrok-free.app 」ここが https の url になるのでブラウザでトップページ開きます。

次に stripe の webhook の設定です → 開発者 →webhook→ エンドポイントを追加 → エンドポイント URL に先ほどの URL の後に/stripe/webhook をつけて入力「（例）https://4aca-219-100-86-141.ngrok-free.app/stripe/webhook 」します → バージョンを最新の API バージョン → リッスンするイベントで payment_intent.succeeded にチェックつけイベント追加。→ 開発者 →webhook の先ほど作成したオンラインエンドポイントをクリック → 署名シークレットをクリックしそこに表示された文字列を.env の STRIPE_WEBHOOK に入れてください。

最後にアプリで銀行振込にて商品を購入 →strip のページの支払に売上が反映するのでクリック → 顧客（例：admin）をクリック → 支払方法の右の三点リーダー → 預金残高に資金を追加（テスト環境のみ）→ 購入した商品の金額を入れてください。

これで webhook が動き purchases テーブルの deposited に入金日付が記録されます。コンビニ入金で購入した場合テスト環境では数分すると自動的に strip 側で入金判定が行われ webhook が動くようです。

circleCI について‥テストと aws の EC2 へのデプロイが可能となっておりますが、デプロイに使っているリポジトリは「https://github.com/nojinogit/web-3-dep 」（画像の保存先を s3 に変更したコードにするためリポジトリを分けました）のため現在のリポジトリ「https://github.com/nojinogit/web-3-1 」に push してもテスト・デプロイは行われません（circleCI のプロジェクトのセットアップを行っていません）。一応 web-3-1 の circleCI/config.yml は web-3-dep のファイルと同じものが入っていますので確認はできます。
# web-3-1
