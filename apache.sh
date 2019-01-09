#! /bin/bash
# Run this script if you need to change the apache configs
docker-compose down
docker image rm docker-db_apache
docker-compose up