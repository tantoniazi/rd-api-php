FROM tiagoguerra/php73-fpm:1
RUN useradd -m develop \
    && usermod -a -G sudo develop \
    && chsh -s /bin/bash develop

RUN usermod -a -G develop www-data
RUN chown -R develop:develop /var/www
RUN sed -i s/'user = www-data'/'user = develop'/g /usr/local/etc/php-fpm.d/www.conf
RUN sed -i s/'group = www-data'/'group = develop'/g /usr/local/etc/php-fpm.d/www.conf
USER develop
WORKDIR /var/www/
