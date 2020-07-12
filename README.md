This is a simple application to show how to use any sms provider to verify user
and if that fails sends email :

## Setup

-   clone the project
-   run composer install
-   generate app key
-   run php artisan serve
-   test the api [localhost:8000/api/v1/verify] , [method: POST] , [data: email , phone-number]
