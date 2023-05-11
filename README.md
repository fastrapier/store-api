# Запуск проекта
- Установить зависимости
  - `composer install`
  - `npm install`
- Создать файл `.env`, делаете копию `.env.example`
- `php artisan key:generate`
- `php artisan jwt:secret`
- `php artisan storage:link`
- `docker-compose up -d`
# Postman export    

Чтобы получить файл для импорта в коллекции Postman нужно запустить команду:
```bash
php artisan export:postman
```
- Файлы храняться в `/storage/app/postman/{timestamp}_{app_name}_collection.json`
- Ссылка на документацию https://github.com/andreaselia/laravel-api-to-postman/blob/master/README.md
