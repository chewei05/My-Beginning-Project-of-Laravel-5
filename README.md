# My-Beginning-Project-of-Laravel-5

[![Latest Stable Version](https://poser.pugx.org/chewei05/my-beginning-project-of-laravel-5/v/stable)](https://packagist.org/packages/chewei05/my-beginning-project-of-laravel-5)
[![Total Downloads](https://poser.pugx.org/chewei05/my-beginning-project-of-laravel-5/downloads)](https://packagist.org/packages/chewei05/my-beginning-project-of-laravel-5)
[![Latest Unstable Version](https://poser.pugx.org/chewei05/my-beginning-project-of-laravel-5/v/unstable)](https://packagist.org/packages/chewei05/my-beginning-project-of-laravel-5)
[![License](https://poser.pugx.org/chewei05/my-beginning-project-of-laravel-5/license)](https://packagist.org/packages/chewei05/my-beginning-project-of-laravel-5)

    This is a beginning project of Laravel 5. This package will install a lots of package via composer, and setting up configuration automatically. Like service providers and aliases in config\app.php.

## Installation
Open web directory of your web servers in terminal(CLI), and follow the following steps.

1. Install Laravel
    ```
    composer create-project laravel/laravel MyProjectFolder
    ```
2. Change directory to your laravel project folder.
    ```
    cd MyProjectFolder
    ```
3. Install this package
    ```
    composer require chewei05/my-beginning-project-of-laravel-5 dev-master
    ```
4. Run automatic setup
    ```
    php vendor\chewei05\my-beginning-project-of-laravel-5\src\setup.php
    ```
5. Done.

## Warning
This package maybe destroy your project, uses it in your beginning project.
