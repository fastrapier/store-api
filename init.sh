docker-compose exec app php artisan migrate:fresh --seed
docker-compose exec app php artisan jwt:secret
