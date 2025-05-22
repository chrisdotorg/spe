FROM php:8.0-apache
RUN docker-php-ext-install pdo pdo_mysql
WORKDIR /var/www/html
COPY add.html add.html
COPY addAccount.php addAccount.php
COPY addo.html addo.html
COPY adDomain.php adDomain.php
COPY clock.js clock.js
COPY connectdb.php connectdb.php
COPY display.css display.css
COPY display.php display.php
COPY domaines.php domaines.php
COPY favicon.ico favicon.ico
COPY index.css index.css
COPY index.php index.php
COPY index.js index.js
COPY removeAcc.php removeAcc.php
COPY removeAccount.html removeAccount.html
COPY removeDom.php removeDom.php
COPY removeDomain.html removeDomain.html 
COPY users.php users.php
EXPOSE 80