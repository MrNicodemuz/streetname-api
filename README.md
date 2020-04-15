# Street API

REST API for searching Finnish and Swedish street names from database table. See [spec](README-en.md) for more details.

## Used software

* [Symfony 5](https://symfony.com/)
* [API Platform](https://api-platform.com/)
* PHP 7.3.5
* MySQL 5.7
* PHPUnit 7.5
* Composer
* Symfony binary

## Getting started

Install the symfony binary:
```
curl -sS https://get.symfony.com/cli/installer | bash
```

Install the dependencies using Composer:
```
cd symfony;
composer install
```

Setup the database:
```
MYSQL_USERNAME=root MYSQL_PASSWORD="" ./scripts/database/init.sh
```

Start developing:
```
./start.sh
```

## Bonus task

To import data from posti.fi via a command line script, run:
```
# Downloads BAF_20191116.dat into /data folder
./scripts/data/download.sh;

# Recreates database and runs database fixtures that uses BAF_20191116.dat
./scripts/init/database.sh;
```

## Running the tests

To run all the tests, run:
```
cd symfony;
php bin/phpunit;
```

To run the unit tests, run:
```
cd symfony;
php bin/phpunit --group=unit;
```

To run the functional tests, run:
```
cd symfony;
php bin/phpunit --group=functional;
```

## Notes

* To get results in a JSON API 1.0 compliant standard, please use the `Accept` header as `application/vnd.api+json` in your requests.
* The `minimum` and `maximum` keys in the spec (api.yml) were a bit unclear. Typo?