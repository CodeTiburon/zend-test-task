#!/bin/bash
set -ex

sed -ri "s/log_statement = 'all'/log_statement = 'ddl'/g" /var/lib/postgresql/data/postgresql.conf
