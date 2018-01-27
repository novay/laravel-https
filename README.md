# Laravel Force HTTPS

[![Latest Stable Version](https://poser.pugx.org/novay/laravel-https/v/stable)](https://packagist.org/packages/novay/laravel-https)
[![Total Downloads](https://poser.pugx.org/novay/laravel-https/downloads)](https://packagist.org/packages/novay/laravel-https)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

- [About](#about)
- [Requirements](#requirements)
- [Installation Instructions](#installation-instructions)
- [Configuration](#configuration)
- [Usage](#usage)
    - [From Route File](#from-route-file)
        - [Route Group Example](#route-group-example)
        - [Individual Route Examples](#individual-route-examples)
    - [From Controller File](#from-controller-file)
        - [Controller File Example](#controller-file-example)
- [File Tree](#file-tree)
- [License](#license)

### About

Laravel Https is middleware to force us into Secure HTTP requests.

### Requirements
* [Laravel 5.1, 5.2, 5.3, 5.4, or 5.5+](https://laravel.com/docs/installation)

### Installation Instructions
1. From your projects root folder in terminal run:

    ```bash
        composer require novay/laravel-https
    ```

2. Register the package

    * Laravel 5.5 and up
    Uses package auto discovery feature, no need to edit the `config/app.php` file.

    * Laravel 5.4 and below
    Register the package with laravel in `config/app.php` under `providers` with the following:

    ```php
        'providers' => [
        ...
            Novay\ForceHttps\ForceHttpsServiceProvider::class,
        ];
    ```

3. Optionally publish the packages views, config file, and language files by running the following from your projects root folder:

    ```bash
        php artisan vendor:publish --tag=ForceHttps
    ```

4. Add the middleware to your routes or controller. See [Usage](#usage).

### Configuration
laravel-https can be configured in directly in `/config/laravel-https.php` if you published the assets.
Or you can variables to your `.env` file.

### Usage

##### From Route File:
* You can include the `https` in a route groups or on individual routes.

###### Route Group Example:

```php
    Route::group(['middleware' => ['web', 'https']], function () {
        Route::get('/', 'WelcomeController@welcome');
    });
```

###### Individual Route Examples:

```php
    Route::get('/', 'WelcomeController@welcome')->middleware('https');
```

##### From Controller File:
* You can include the `https` in the contructor of your controller file.

###### Controller File Example:

```php
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('https');
    }
```

### File Tree

```bash
├── .gitignore
├── LICENSE
├── README.md
├── composer.json
└── src
    ├── ForceHttpsServiceProvider.php
    ├── app
    │   └── Http
    │       └── Middleware
    │           └── ForceHttps.php
    └── config
        └── laravel-https.php
```

### License
Laravel-Https is licensed under the MIT license. Enjoy!