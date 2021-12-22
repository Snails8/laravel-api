# usage:
# $ make ecr_repo
# $ make init-(dev or prod or etc.)
# $ make plan-(dev or prod or etc.)
# $ make apply-(dev or prod or etc.)

DC := docker-compose exec app
ARG := $1

up:
	docker-compose up --build

create-project:
	docker-compose up -d --build
	docker-compose exec app composer create-project --prefer-dist laravel/laravel .
	docker-compose exec app composer require predis/predis

install:
	cp .env.example .env
	docker-compose up -d --build
	docker-compose exec app composer install
	docker-compose exec app npm install
	docker-compose exec app npm run dev
	docker-compose exec app php artisan key:generate
	docker-compose exec app php artisan migrate:fresh --seed
	docker-compose exec app chmod -R 777 storage
	docker-compose exec app chmod -R 777 bootstrap/cache

reinstall:
	@make destroy
	@make install

stop:
	docker-compose stop

restart:
	docker-compose down
	docker-compose up -d

down:
	docker-compose down
destroy:
	docker-compose down --rmi all --volumes
ps:
	docker-compose ps
app:
	docker-compose exec app /bin/ash
fresh:
	docker-compose exec app php artisan migrate:fresh --seed
seed:
	docker-compose exec app php artisan db:seed
tinker:
	docker-compose exec app php artisan tinker
dump:
	docker-compose exec app php artisan dump-server
test:
	docker-compose exec app php ./vendor/bin/phpunit
cache:
	docker-compose exec app composer dump-autoload -o
	docker-compose exec app php artisan optimize:clear
	docker-compose exec app php artisan optimize
cache-clear:
	docker-compose exec app php artisan optimize:clear
cs:
	docker-compose exec app vendor/bin/phpcs
cbf:
	docker-compose exec app vendor/bin/phpcbf
db:
	docker-compose exec db bash
sql:
	docker-compose exec db bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'
node:
	docker-compose exec node ash
npm:
	docker-compose exec node npm install
	docker-compose exec node npm run dev
yarn:
	docker-compose exec node yarn
	docker-compose exec node yarn dev
c-%:
	docker-compose exec app php artisan make:controller ${@:c-%=%}
sample-%:
	echo ${@:%=%}