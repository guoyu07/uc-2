УСТАНОВКА
------------

composer install

npm install

распаковать prod.env.zip в корень

создать бд `uc` и пользователя `uc` со всеми привиегиями к ней и паролем из .env DB_PASSWORD

php yii migrate/up

при необходимости восстановить бэкап бд из db.sql