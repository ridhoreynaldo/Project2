chmod +x setup-docker.sh
./setup-docker.sh


docker-compose build
docker-compose up -d

docker-compose down
docker-compose build --no-cache
docker-compose up -d

docker-compose ps


docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate
docker-compose exec app php artisan config:cache
docker-compose exec app php artisan route:cache


docker-compose down
docker-compose build --no-cache
docker-compose up -d


#### kalau ada perubahan ini aja biar cepat
docker-compose down && docker-compose up -d


#####hapus cache
docker system prune -a --volumes

##### FIRST
docker-compose build --no-cache
docker-compose up -d
docker-compose ps

docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate
docker-compose exec app php artisan config:cache



##### hapus sampah docker
docker system prune -a --volumes


###### build ulang dan restart
docker-compose build --no-cache app
docker-compose restart app


###### perbaiki env dll 
php artisan config:clear
php artisan tinker
>>> DB::connection('sqlsrv')->getPdo();