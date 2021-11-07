FROM debian

WORKDIR /homework

COPY . /homework/

EXPOSE 8080

#EXPOSE 80

RUN apt-get -y update && apt-get install -y zip php-fpm php-mbstring php-sqlite3 php-xml git

CMD ["cd","/homework"]

#VOLUME ["/homework/db"]

#CMD ["bash"]

CMD ["bash","prepare.sh"]

#CMD ["php","-S", "0.0.0.0:8080"]