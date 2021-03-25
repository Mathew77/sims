### PHP Mini Rest Api


#### Steps....

1. Clone the project
2. Open the project in your terminal and run the command `composer install`. This will install all of the project dependencies.
3. Create your database and upload the sql file in the project's root dir.
4. Open the Model Folder and edit the Model.php file. You are editing the protected properties of this class. Replace them with your system environment variables.
5. You can now begin creating your own Controllers, Models or Middlewares inside of the already created directory called Controller, Model and Middleware respectively.
6. After doing the above instructions, you can open the project in your terminal or cmd and run the command `php -S 127.0.0.1:8000`
7. Well, your project is up and running now. you can now open [Postman](https://postman.io) and begin consuming endpoints.


#### EndPoints

By default, these are the list of endpoints available when you clone the project. Your router || `api.php` lives inside of the `router directory` inside of the `App folder`.

#### User Endpoints

1. Create New User **`/api/v1/user`**: **`HTTP POST`**

```php
    $Klein->respond('POST', '/api/v1/user', [ new UserController(), 'createNewUser' ]);
```

2. Login A User **`/api/v1/user-auth`**: **`HTTP POST`**

```php
    $Klein->respond('POST', '/api/v1/user-auth', [ new UserController(), 'login' ]);
```
