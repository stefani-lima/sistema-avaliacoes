#!/bin/bash
set -e

# O banco "avaliacao" já é criado pelo POSTGRES_DB, então removemos a linha
# "CREATE DATABASE avaliacao;" do schema e rodamos o restante dentro dele.
grep -vi '^[[:space:]]*CREATE DATABASE' /schema/schema.sql \
  | psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" --dbname "$POSTGRES_DB"
