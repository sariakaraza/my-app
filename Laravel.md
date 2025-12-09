cp .env.example .env    # si .env n’existe pas déjà
sed -i 's/^DB_CONNECTION=.*/DB_CONNECTION=mysql/' .env
sed -i 's/^DB_HOST=.*/DB_HOST=mysql/' .env
docker exec -it laravel_app php artisan key:generate
docker exec -it laravel_app php artisan config:clear

docker compose down
docker compose build app
docker compose up -d
docker compose up -d

docker exec -it laravel_app php artisan migrate --force

docker exec app php artisan serve