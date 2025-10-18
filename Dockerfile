# FROM php:8.2-fpm

# WORKDIR /var/www/html

# RUN apt-get update && apt-get install -y --no-install-recommends \
#     build-essential \
#     libpng-dev \
#     libjpeg62-turbo-dev \
#     libfreetype6-dev \
#     libonig-dev \
#     zip \
#     unzip \
#     git \
#     curl \
#     unixodbc-dev \
#     && rm -rf /var/lib/apt/lists/*

# RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
#     docker-php-ext-install -j$(nproc) gd pdo pdo_mysql bcmath mbstring

# RUN pecl install sqlsrv pdo_sqlsrv && \
#     docker-php-ext-enable sqlsrv pdo_sqlsrv

# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# COPY . /var/www/html



# RUN chown -R www-data:www-data /var/www/html && \
#     chmod -R 755 /var/www/html && \
#     mkdir -p /var/www/html/storage/logs && \
#     chmod -R 777 /var/www/html/storage && \
#     chmod -R 777 /var/www/html/bootstrap/cache

# EXPOSE 9000

# CMD ["php-fpm"]

FROM php:8.2-fpm

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    zip \
    unzip \
    git \
    curl \
    wget \
    gnupg \
    ca-certificates \
    && rm -rf /var/lib/apt/lists/*

# Install ODBC Driver 18
RUN curl https://packages.microsoft.com/keys/microsoft.asc | gpg --dearmor > /usr/share/keyrings/microsoft-prod.gpg && \
    echo "deb [arch=amd64 signed-by=/usr/share/keyrings/microsoft-prod.gpg] https://packages.microsoft.com/debian/12/prod bookworm main" > /etc/apt/sources.list.d/mssql-release.list && \
    apt-get update && \
    ACCEPT_EULA=Y apt-get install -y msodbcsql18 unixodbc-dev && \
    rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) \
    gd pdo pdo_mysql bcmath mbstring

# Install sqlsrv
RUN pecl install sqlsrv pdo_sqlsrv && \
    docker-php-ext-enable sqlsrv pdo_sqlsrv

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    mkdir -p /var/www/html/storage/logs && \
    chmod -R 777 /var/www/html/storage && \
    chmod -R 777 /var/www/html/bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]