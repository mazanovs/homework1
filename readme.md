# Homework -> Calculator

Breef:
API => Writen on Lumen php framework, latest version.
    => Database used sqlite.
    => On api directory have file phpunit for test our API.
    => Test have on tests directory
    => Frontend writed on JS + Jquery + Less + SASS
    => Frontend is packed with Webpack5.

1. Need to be clone this repository

2. docker build -t homework1 .

3. docker run -d -p 8080:8080 -e MODE=dev --rm --name homework homework1:latest

3.1. After docker run need wait some 2-3 min for install dependencies on php framework 

4. Go to your local maschine ip on port 8080.. Example http://127.0.0.1:8080