<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic mindtree test project</h1>
    <br>
</p>

Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.


DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.6.0.


INSTALLATION
------------
import db file which is in porject root file

~~~
http://localhost/basic/web/
~~~

### Install from an Archive File

Extract the archive file downloaded from [yiiframework.com](http://www.yiiframework.com/download/) to
a directory named `basic` that is directly under the Web root.

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<KJyoOY1sCtyH8yLs6dwLJoIT6eDHKrAp>',
],
```

You can then access the application through the following URL:

~~~
http://localhost:81/basictest/web/
~~~



CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=network_devices',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
```
Description for test :
All the excecise are done in one project . kindly let me know at time of reviewing my code i will give you dry run

Excercise 1:
Q1 : made a cron url => http://localhost:81/basictest/web/ManageRouter/manage-router/index
Q2 : made a cron 
Q3 : made a console controller 
sample command  : php yii router/create

Q4 : url => http://localhost:81/basictest/web/ManageRouter/manage-router/draw-shape

Excercise 3:
Q1 : made a rest api controller individual need to run using postman

Deploy database file present in path : project root directory 

database file name : network_devices.sql

Note : you can test rest api methods using postman

