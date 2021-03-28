install:
	docker run --rm -v $(shell pwd):/opt -w /opt -u $(shell id -u) laravelsail/php80-composer:latest composer install

build:
	cp -n .env.example .env|| true
	touch database/database.sqlite
	./vendor/bin/sail up -d --build
	./vendor/bin/sail php artisan key:generate --ansi
	./vendor/bin/sail php artisan migrate:fresh --seed
	./vendor/bin/sail npm install
	./vendor/bin/sail npm run dev
	./vendor/bin/sail php artisan queue:work --tries=3

docker-run:
	./vendor/bin/sail up -d

docker-stop:
	./vendor/bin/sail down

lint:
	./vendor/bin/sail composer phpcs

deploy:
	git push heroku main
