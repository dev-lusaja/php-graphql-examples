FROM amazonlinux:latest

RUN yum -y update && yum -y install \
    nginx \
    php70 \
    php70-fpm \
    php70-phar \
    php70-mbstring \
    php70-xml \
    php70-curl \
    php70-intl \
    php70-phar \
    php70-json \
    php70-pecl-apcu \
    git \
    openssh \
    unzip

RUN curl -sS https://getcomposer.org/installer | php -- --filename=composer --install-dir=/bin/ && composer self-update
ADD config /tmp/
RUN /tmp/configservices.sh

WORKDIR /app
ENTRYPOINT /tmp/runservices.sh