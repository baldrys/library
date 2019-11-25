### Настройка

- Установить зависимости `$ composer install` и `$ npm install`
- Настроить соединение с базой данных в *.env*
- Запустить миграции командой `$ php bin/console doctrine:migrations:migrate`
- Создать и настроить файл *.htaccess* в папке *public* для *apache* сервера, или использвать путь *localhost/index.php* или запускать локальный сервер `$ php bin/console server:run`