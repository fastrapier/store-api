# Запуск проекта
[comment]: <> (Добавить action чтобы все это запускалось)
- Установить зависимости
  - `composer install`
  - `npm install`
- Создать файл `.env`, делаете копию `.env.example`
- Создать ключ приложения `php artisan key:generate`
- Запускаете миграции, `php artisan migrate:fresh --seed`, если спросит в консоли создать ли базу данных, то напишите `yes`
- Запустить сервер `php artisan serve`

# Postman export    

Чтобы получить файл для импорта в коллекции Postman нужно запустить команду:
```bash
php artisan export:postman
```
- Файлы храняться в `/storage/app/postman/{timestamp}_{app_name}_collection.json`
- Ссылка на документацию https://github.com/andreaselia/laravel-api-to-postman/blob/master/README.md
