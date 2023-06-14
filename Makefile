up: docker-up
down: docker-down
restart: docker-down docker-up
init: docker-down-clear docker-pull docker-build docker-up e-commerce-init
test: e-commerce-test
test-coverage: e-commerce-test-coverage
test-unit: e-commerce-test-unit
test-unit-coverage: e-commerce-test-unit-coverage

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build

e-commerce-init: e-commerce-composer-install e-commerce-assets-install e-commerce-wait-db e-commerce-migrations

e-commerce-composer-install:
	docker-compose run --rm e-commerce-php-cli composer install

e-commerce-assets-install:
	docker-compose run --rm e-commerce-node yarn install
	docker-compose run --rm e-commerce-node npm rebuild node-sass

e-commerce-wait-db:
	until docker-compose exec -T e-commerce-postgres pg_isready --timeout=0 --dbname=app ; do sleep 1 ; done

e-commerce-migrations:
	docker-compose run --rm e-commerce-php-cli php artisan migrate

e-commerce-fixtures:
	docker-compose run --rm e-commerce-php-cli php bin/console doctrine:fixtures:load

e-commerce-assets-dev:
	docker-compose run --rm e-commerce-node npm run dev

e-commerce-test:
	docker-compose run --rm e-commerce-php-cli php bin/phpunit

e-commerce-test-coverage:
	docker-compose run --rm e-commerce-php-cli php bin/phpunit --coverage-clover var/clover.xml --coverage-html var/coverage

e-commerce-test-unit:
	docker-compose run --rm e-commerce-php-cli php bin/phpunit --testsuite=unit

e-commerce-test-unit-coverage:
	docker-compose run --rm e-commerce-php-cli php bin/phpunit --testsuite=unit --coverage-clover var/clover.xml --coverage-html var/coverage

build-production:
	docker build --pull --file=e-commerce/docker/production/nginx.docker --tag ${REGISTRY_ADDRESS}/e-commerce-nginx:${IMAGE_TAG} e-commerce
	docker build --pull --file=e-commerce/docker/production/php-fpm.docker --tag ${REGISTRY_ADDRESS}/e-commerce-php-fpm:${IMAGE_TAG} e-commerce
	docker build --pull --file=e-commerce/docker/production/php-cli.docker --tag ${REGISTRY_ADDRESS}/e-commerce-php-cli:${IMAGE_TAG} e-commerce
	docker build --pull --file=e-commerce/docker/production/postgres.docker --tag ${REGISTRY_ADDRESS}/e-commerce-postgres:${IMAGE_TAG} e-commerce
	docker build --pull --file=e-commerce/docker/production/redis.docker --tag ${REGISTRY_ADDRESS}/e-commerce-redis:${IMAGE_TAG} e-commerce
	docker build --pull --file=centrifugo/docker/production/centrifugo.docker --tag ${REGISTRY_ADDRESS}/centrifugo:${IMAGE_TAG} centrifugo

push-production:
	docker push ${REGISTRY_ADDRESS}/e-commerce-nginx:${IMAGE_TAG}
	docker push ${REGISTRY_ADDRESS}/e-commerce-php-fpm:${IMAGE_TAG}
	docker push ${REGISTRY_ADDRESS}/e-commerce-php-cli:${IMAGE_TAG}
	docker push ${REGISTRY_ADDRESS}/e-commerce-postgres:${IMAGE_TAG}
	docker push ${REGISTRY_ADDRESS}/e-commerce-redis:${IMAGE_TAG}
	docker push ${REGISTRY_ADDRESS}/centrifugo:${IMAGE_TAG}
