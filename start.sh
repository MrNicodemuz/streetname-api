#!/bin/bash
set -o errexit

# Script to run when you start developing stuff
DOMAIN=127.0.0.1
PORT=8009

# Define root directory
ROOTDIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd );
cd $ROOTDIR;
cd symfony;

symfony local:server:stop;
symfony local:server:start --daemon --no-tls --port=$PORT;
symfony open:local;
symfony local:server:log;
