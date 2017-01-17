УСТАНОВКА В ТЕКУЩУЮ ДИРЕКТОРИЮ
------------

composer create-project kllakk/uc ./

распаковать prod.env.zip в корень

создать бд `uc` и пользователя `uc` со всеми привиегиями к ней и паролем из .env DB_PASSWORD

composer install-app

при необходимости восстановить бэкап бд из db.sql