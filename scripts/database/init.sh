#!/bin/bash

# Declare the project root directory
ROOTDIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && cd ../.. && pwd );

cd $ROOTDIR;

# Check for environment vars and set defaults if not exist
[ -z "$MYSQL_USERNAME" ] && MYSQL_USERNAME="root";
[ -z "$MYSQL_PASSWORD" ] && MYSQL_PASSWORD="";

# Drop any previous database user
mysql --user=$MYSQL_USERNAME --password=$MYSQL_PASSWORD -e "drop user 'streetnames'@'localhost';";

# Recreate database user
mysql --user=$MYSQL_USERNAME --password=$MYSQL_PASSWORD -e "flush privileges; create user 'streetnames'@'localhost' identified by 'qyh873arugjkgkkb';";

# Drop any previous database
mysql --user=$MYSQL_USERNAME --password=$MYSQL_PASSWORD -e "DROP DATABASE streetnames;";

# Recreate database
mysql --user=$MYSQL_USERNAME --password=$MYSQL_PASSWORD -e "CREATE DATABASE IF NOT EXISTS streetnames; GRANT ALL PRIVILEGES ON streetnames.* TO 'streetnames'@'localhost' IDENTIFIED BY 'qyh873arugjkgkkb'; FLUSH PRIVILEGES;";

# Create database tables
php ./symfony/bin/console doctrine:schema:update --force --dump-sql;

# Create test data
php ./symfony/bin/console doctrine:fixtures:load --no-interaction --verbose --append;
