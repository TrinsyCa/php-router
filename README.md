# PHP Router Project

A simple PHP routing project template for handling URL routing in your PHP applications.

## Installation

To set up the PHP Router project, follow these steps:

1. **Clone the Repository**:

    ```sh
    git clone https://github.com/trinsyca/php-router.git
    cd php-router
    ```

2. **Install Dependencies**:

    ```sh
    composer install
    ```

## Configuration

Before using the router, configure your environment settings in the `.env` file.

### .env

```php
<?php

// Set the application name (folder name)
define('APP_NAME', 'php-router');

// Set the directory if the project is part of another project (e.g., "localhost/projects/php-router")
define('DIRECTORY', 'projects');
