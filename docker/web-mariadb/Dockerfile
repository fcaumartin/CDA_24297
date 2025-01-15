FROM debian:12

RUN apt-get update
RUN apt install curl wget lsb-release ca-certificates -y

# all php versions
RUN curl -sSLo /tmp/debsuryorg-archive-keyring.deb https://packages.sury.org/debsuryorg-archive-keyring.deb
RUN dpkg -i /tmp/debsuryorg-archive-keyring.deb
RUN sh -c 'echo "deb [signed-by=/usr/share/keyrings/deb.sury.org-php.gpg] https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'
RUN apt-get update
RUN apt install php8.4 php8.4-dom php8.4-mysql php8.4-mbstring php8.4-intl php8.4-xml php8.4-gd php8.4-xdebug php8.4-curl php8.4-zip -y

# install git
RUN apt install git -y
RUN git config --global --add safe.directory /var/www

# install symfony-cli
RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN cp /root/.symfony5/bin/symfony /usr/local/bin/
RUN symfony server:ca:install   
# After to enable TLS (SSL)... import /root/.symfony5/certs/rootCA.pem like "Authority Cert" in your navigator

#install composer
RUN wget https://getcomposer.org/installer -O /var/www/composer-setup.php
RUN php /var/www/composer-setup.php
RUN mv composer.phar /usr/bin/composer
RUN chmod +x /usr/bin/composer


ENV PHP_MEMORY_LIMIT=1024M

WORKDIR /var/www

ENTRYPOINT symfony server:start --allow-all-ip