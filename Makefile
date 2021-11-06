dev: 
	docker run -d -p 8080:8080 -e MODE=dev --rm --name homework homework1:latest
prod:
	docker run -d -p 8080:8080 -e MODE=prod --rm --name homework homework1:latest
stop:
	docker stop homework

