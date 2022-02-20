DC := docker-compose exec app
a := $1
sed := $2
SED := $3
# ====================================================================
# docker command
# ====================================================================
up:
	docker-compose up --build

stop:
	docker-compose stop

restart:
	docker-compose down
	docker-compose up -d

down:
	docker-compose down

destroy:
	docker-compose down --rmi all --volumes

app:
	${DC} /bin/bash
# ====================================================================
# setup command
# ====================================================================
create-project:
	docker-compose up -d --build
	${DC} composer create-project --prefer-dist laravel/laravel .
	${DC} composer require predis/predis

install:
	cp .env.example .env
	docker-compose up -d --build
	${DC} composer install
	${DC} npm install
	${DC} npm run dev
	${DC} php artisan key:generate
	docker-compose exec app php artisan migrate:fresh --seed
	docker-compose exec app chmod -R 777 storage
	docker-compose exec app chmod -R 777 bootstrap/cache
	docker-compose down
	docker-compose up --build

reinstall:
	@make destroy
	@make install

# ====================================================================
# default FlameWork command
# ====================================================================
controller:
	${DC} php artisan make:controller ${a}Controller
	#${DC} php artisan make:test Controller/${a}ControllerTest

model:
	${DC} php artisan make:model ${a}

request:
	${DC} php artisan make:request ${a}PostRequest

migration:
	${DC} docker-compose exec app php artisan make:migration

migrate:
	${DC} php artisan migrate:fresh --seed

seed:
	${DC} php artisan db:seed

test-migrate:
	${DC} php artisan migrate:refresh --database=testing --seed

test:
	${DC} php ./vendor/bin/phpunit

# ===== あんま使わない  ==================================================
tinker:
	${DC} php artisan tinker

dump:
	${DC} php artisan dump-server

cs:
	${DC} vendor/bin/phpcs

cbf:
	${DC} vendor/bin/phpcbf

sql:
	docker-compose exec db bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'

# ====================================================================
# front
# ====================================================================
yarn:
	docker-compose exec node yarn
	docker-compose exec node yarn dev

watch:
	${DC} npm run watch


# ====================================================================
# オレオレコマンド
# ====================================================================
cache:
	sh clear-cache.sh

sed:
	sed -i -e "s/sample/${a}/g" -e "s/Sample/${A}/g" sample.txt

c-%:
	${DC} php artisan make:controller ${a}

# app/Http/Controllers/Admin/WorkController を作成したい場合 make crud-api a=Admin/Controller sed=work SED=Work
make crud-api:
	make controller
	cp -R ._module/Controller/Crud/CurdController.php app/Http/Controllers/${a}Controller.php
	sed -i '' -e "s/sample/${a}/g"  app/Http/Controllers/${a}Controller.php
	sed -i '' -e "s/_Template\/\${a}Controller/g" app/Http/Controllers/${a}Controller.php
	#make request

# ex) views/admin/works で作成したい場合 crud-view a=admin/works sed=work
make crud-view:
	mkdir resources/views/${a}
	touch resources/views/${a}/index.blade.php
	touch resources/views/${a}/create.blade.php
	touch resources/views/${a}/edit.blade.php
	touch resources/views/${a}/_form.blade.php
	cp -R ._module/views/blade/crud/index.blade.php  resources/views/${a}/index.blade.php
	cp -R ._module/views/blade/crud/create.blade.php resources/views/${a}/create.blade.php
	cp -R ._module/views/blade/crud/edit.blade.php   resources/views/${a}/edit.blade.php
	cp -R ._module/views/blade/crud/_form.blade.php  resources/views/${a}/_form.blade.php
	sed -i '' -e "s/sample/${sed}/g" resources/views/${a}/index.blade.php
	sed -i '' -e "s/sample/${sed}/g" resources/views/${a}/create.blade.php
	sed -i '' -e "s/sample/${sed}/g" resources/views/${a}/edit.blade.php
	sed -i '' -e "s/sample/${sed}/g" resources/views/${a}/_form.blade.php
