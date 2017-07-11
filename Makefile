.DEFAULT_GOAL := help

TAG = latest
IMAGE_NAME = graphql_php
PROYECT_NAME = graphQL
CONTAINER_NAME = graphql_backend

build: ## build IMAGE, use me with: make build
	@docker-compose -f docker-compose.build.yml build

up: ## up docker containers
	docker-compose -p $(PROYECT_NAME) up -d
	docker-compose -p $(PROYECT_NAME) ps

stop: ## Stops and removes the docker containers, use me with: make down
	docker-compose -p $(PROYECT_NAME) stop

down: ## Stops and removes the docker containers, use me with: make down
	docker-compose -p $(PROYECT_NAME) down

restart: ## Restart all containers, use me with: make restart
	docker-compose -p $(PROYECT_NAME) restart
	docker-compose -p $(PROYECT_NAME) ps

status: ## Show containers status, use me with: make status
	docker-compose -p $(PROYECT_NAME) ps

ssh: ## Connect to conainer for ssh protocol
	docker exec -it $(CONTAINER_NAME) bash

composer:
	@docker exec -ti $(CONTAINER_NAME) composer update

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-16s\033[0m %s\n", $$1, $$2}'