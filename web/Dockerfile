FROM nginx

RUN apt-get update

RUN apt-get install -y certbot python3-certbot-nginx

COPY nginx.conf /etc/nginx/nginx.conf
