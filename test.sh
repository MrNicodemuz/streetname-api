#!/bin/bash
set -o errexit

# Define root directory
ROOTDIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd );
cd $ROOTDIR;

cd symfony;
php bin/phpunit;
