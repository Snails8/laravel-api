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
	${DC} php artisan stub:publish

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
	${DC} php artisan make:test Controller/${a}ControllerTest

model:
	${DC} php artisan make:model ${a}

request:
	${DC} php artisan make:request ${a}PostRequest

seeder:
	${DC} php artisan make:seed ${a}TableSeeder

factory:
	${DC} php artisan make:factory ${a}

migration:
	${DC} php artisan make:migration ${a}_table

migrate:
	${DC} php artisan migrate:fresh --seed

seed:
	${DC} php artisan db:seed

test-migrate:
	${DC} php artisan migrate:refresh --database=testing --seed

test:
	${DC} php ./vendor/bin/phpunit

test-filter:
	${DC} php ./vendor/bin/phpunit --filter=${a}

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

design:
	docker-compose down
	docker-compose build
	docker-compose up -d
	docker-compose exec app php artisan migrate:fresh --seed
	docker-compose exec app npm run dev
	sh clear-cache.sh

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

c-%:
	${DC} php artisan make:controller ${a}

# app/Http/Controllers/Admin/WorkController を作成したい場合
# make crud module=Admin/Work sed=work SED=Work namespace=Admin\Work namespace=Ajax\\\\\\Test
crud:
	mkdir app/Http/Controllers/${module}
	cp -R ._module/Controllers/Crud/IndexController.php   app/Http/Controllers/${module}/${SED}IndexController.php
	cp -R ._module/Controllers/Crud/CreateController.php  app/Http/Controllers/${module}/${SED}${a}CreateController.php
	cp -R ._module/Controllers/Crud/EditController.php    app/Http/Controllers/${module}/${SED}EditController.php
	cp -R ._module/Controllers/Crud/StoreController.php   app/Http/Controllers/${module}/${SED}StoreController.php
	cp -R ._module/Controllers/Crud/UpdateController.php  app/Http/Controllers/${module}/${SED}UpdateController.php
	cp -R ._module/Controllers/Crud/DestroyController.php app/Http/Controllers/${module}/${SED}DestroyController.php

	sed -i '' -e "s/sample/${sed}/g"           app/Http/Controllers/${module}/${SED}IndexController.php
	sed -i '' -e "s/Sample/${SED}/g"           app/Http/Controllers/${module}/${SED}IndexController.php
	sed -i '' -e "s@_Templates@${namespace}@g" app/Http/Controllers/${module}/${SED}IndexController.php
	sed -i '' -e "s/sample/${sed}/g"           app/Http/Controllers/${module}/${SED}CreateController.php
	sed -i '' -e "s/Sample/${SED}/g"           app/Http/Controllers/${module}/${SED}CreateController.php
	sed -i '' -e "s@_Templates@${namespace}@g" app/Http/Controllers/${module}/${SED}CreateController.php
	sed -i '' -e "s/sample/${sed}/g"           app/Http/Controllers/${module}/${SED}EditController.php
	sed -i '' -e "s/Sample/${SED}/g"           app/Http/Controllers/${module}/${SED}EditController.php
	sed -i '' -e "s@_Templates@${namespace}@g" app/Http/Controllers/${module}/${SED}EditController.php
	sed -i '' -e "s/sample/${sed}/g"           app/Http/Controllers/${module}/${SED}StoreController.php
	sed -i '' -e "s/Sample/${SED}/g"           app/Http/Controllers/${module}/${SED}StoreController.php
	sed -i '' -e "s@_Templates@${namespace}@g" app/Http/Controllers/${module}/${SED}StoreController.php
	sed -i '' -e "s/sample/${sed}/g"           app/Http/Controllers/${module}/${SED}UpdateController.php
	sed -i '' -e "s/Sample/${SED}/g"           app/Http/Controllers/${module}/${SED}UpdateController.php
	sed -i '' -e "s@_Templates@${namespace}@g" app/Http/Controllers/${module}/${SED}UpdateController.php
	sed -i '' -e "s/sample/${sed}/g"           app/Http/Controllers/${module}/${SED}DestroyController.php
	sed -i '' -e "s/Sample/${SED}/g"           app/Http/Controllers/${module}/${SED}DestroyController.php
	sed -i '' -e "s@_Templates@${namespace}@g" app/Http/Controllers/${module}/${SED}DestroyController.php


# app/Http/Controllers/Admin/WorkController を作成したい場合
# make crud a=Admin/Work sed=work SED=Work namespace=Admin\Work
crud-api-fast:
	cp -R ._module/Controllers/Crud/CrudController.php app/Http/Controllers/${a}/${SED}Controller.php
	sed -i '' -e "s/sample/${sed}/g"  app/Http/Controllers/${a}/${SED}Controller.php
	sed -i '' -e "s/Sample/${SED}/g"  app/Http/Controllers/${a}/${SED}Controller.php
	#sed -i '' -e "s/_Template\/\${a}Controller/g" app/Http/Controllers/${a}Controller.php


# ex) views/admin/works で作成したい場合 crud-view a=admin/works sed=work
crud-view:
	mkdir resources/views/${a}
	cp -R ._module/views/blade/crud/index.blade.php  resources/views/${a}/index.blade.php
	cp -R ._module/views/blade/crud/create.blade.php resources/views/${a}/create.blade.php
	cp -R ._module/views/blade/crud/edit.blade.php   resources/views/${a}/edit.blade.php
	cp -R ._module/views/blade/crud/_form.blade.php  resources/views/${a}/_form.blade.php
	sed -i '' -e "s/sample/${sed}/g" resources/views/${a}/index.blade.php
	sed -i '' -e "s/sample/${sed}/g" resources/views/${a}/create.blade.php
	sed -i '' -e "s/sample/${sed}/g" resources/views/${a}/edit.blade.php
	sed -i '' -e "s/sample/${sed}/g" resources/views/${a}/_form.blade.php
