cms
===

yet another custom cms [pongocms laravel 3.2 bundle based PHP 5.5 safe]

installation steps:

 - update application/config/application.php [url = 'http://app_url']
 ```php
php artisan key:generate
```
 - application/config/database.php [db_user must have permission to CREATE]
 - CHMOD storage 0770 or 0777
 ```php
php artisan cms::content
```
DONE!!!

http://app_url/cms -> admin:admin