# PHP proficiency test

## Tasks

- Designing database table for storing addresses to MySQL, SQL Server or PostgreSQL database. Please refer to OpenAPI description to see what needs to be stored.
- REST API for searching Finnish and Swedish street names from database table.

Implementation does not have to be fully completed as long as you think we can assess your skills from what you have implemented.

### Optional bonus task

- PHP command line script to be run in crontab, which imports Finnish postal service basic address file to designed database table.

## Package files:

- **api.yml** - OpenAPI description of the API
- **BAF_20191116.zip** - Basic address file, ZIP-archived. File description can be found at https://www.posti.fi/en/customer-support/postal-code-services, under Service description and terms of use (pdf) -link
- **README-en.md** - This file

## Things expected from implementation

- Code runs on a Linux server
- Used PHP-version is 7.2, 7.3 or 7.4
- Implementation uses PHP objects / classes
- Compliance with PSR-4 and PSR-12 standards
- Automated unit / integration tests. 100% coverage is not needed, a minimum of a couple of key functionality tests is enough
- Compliance with JSON API 1.0 standard (https://jsonapi.org/)
