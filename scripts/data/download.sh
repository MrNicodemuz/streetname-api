#!/bin/bash

# Declare the project root directory
ROOTDIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && cd ../.. && pwd );

cd $ROOTDIR;

mkdir -p $ROOTDIR/data;
cd $ROOTDIR/data;

wget https://www.posti.fi/webpcode/arch/BAF_20191116.zip -O $ROOTDIR/data/BAF_20191116.zip;

unzip -o BAF_20191116.zip -d .;
