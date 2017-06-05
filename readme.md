
# Contacts App 

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/hello-deepak/contacts-app/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/hello-deepak/contacts-app/?branch=master)

## Requirement
* PHP 7.1.4
* Postgressql 9.5
* Apache2 Or Nginx

## Install

Contacts App can be cloned from github repository and installed. Follow the procedure given below:

* git clone https://github.com/hello-deepak/contacts-app.git contactApp
* cd contactApp
* install the application dependencies using command: `composer install`
* copy .env.example to .env and update your configuration
* give all the permission to the storage folder using `chmod -R 777 storage`
* run migration using `php artisan migrate`
* run the server `php artisan serve`
* open [http://localhost:8000](http://localhost:8000)


## Framework
The application is built on PHP based [Laravel 5.4](http://laravel.com) framework.
 

## Tools and packages

This application uses many tools and packages, the packages can 
be seen in the [composer.json](https://github.com/hello-deepak/contacts-app/blob/master/composer.json) file and javascript
packages are listed in the [package.json](https://github.com/hello-deepak/contacts-app/blob/master/package.json) file.


Some major PHP packages used are listed below:

* [laravel/socialite](https://github.com/laravel/socialite) - for social login/register
* [spatie/laravel-activitylog](https://github.com/spatie/laravel-activitylog) - for activity log

## Structure

The application is structured in a very simple way in `app\ContactsApp` folder.

ContactsApp folder contains 3 folders
- Repositories: Contains all data access logic. 
- Model: Contains all the eloquent model classes.
- Services: Contains the classes which serves as the intermediate for Controllers and Repositories. All the application logic are handled here.  The purpose of using services is to keep our controllers slim.

Classes inside each of the above directories are properly written within corresponding modules namespace. 

## Coding Conventions

[PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) 
coding standard  


## Tests

PhpUnit is used for unit test. [Mockery](https://github.com/mockery/mockery) is used as tool for mocking.

```
phpunit
```



