FROM nginx:1.15.2
COPY conf/nginx.conf /etc/nginx/nginx.conf
RUN useradd -m develop \
    && usermod -a -G sudo develop \
    && chsh -s /bin/bash develop
RUN usermod -a -G develop www-data