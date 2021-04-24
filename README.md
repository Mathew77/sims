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


2. Login A User **`/api/v1/user-auth`**: **`HTTP POST`**

```php
    $Klein->respond('POST', '/api/v1/user-auth', [ new UserController(), 'login' ]);


```

3. Get All the State, LGA, Programmes assign to user **`/api/v1/user-privilege`**: **`HTTP POST`**

```php
    $Klein->respond('POST', '/api/v1/user-privilege', [ new PrivilegeController(), 'fetchUserPriviledgesById' ]);


```
3. Get All the State, LGA, Programmes assign to user **`/api/v1/user-privilege`**: **`HTTP POST`**

```php
    $Klein->respond('POST', '/api/v1/user-privilege', [ new PrivilegeController(), 'fetchUserPriviledgesById' ]);


```
4.  Get All CCT Program Period **`/api/v1/cct-period`**: **`HTTP POST`**

```php
    $Klein->respond('POST', '/api/v1/cct-period', [ new PrivilegeController(), 'fetch_cct_period' ]);


```
5. Get All CCT Program Period **`/api/v1/gee-period`**: **`HTTP POST`**

```php
    $Klein->respond('GET', '/api/v1/gee-period', [ new PrivilegeController(), 'fetch_gee_period' ]);


```
6. Get All NPO Program Period **`/api/v1/npo-period`**: **`HTTP POST`**

```php
    $Klein->respond('GET', '/api/v1/npo-period', [ new PrivilegeController(), 'fetch_npo_period' ]);


```
7. Get All SFP Program Period **`/api/v1/sfp-period`**: **`HTTP POST`**

```php
    $Klein->respond('GET', '/api/v1/sfp-period', [ new PrivilegeController(), 'fetch_sfp_period' ]);


8. GET LIST OF STATE BY USER ID

POST : http://simis.cleavey.com.ng/api/v1/state
REQUEST BODY :

{
    "user_id": "admin"  
}
```

RESPONSE :

"status": 200,
    "data": [
        {
            "StateId": "1",
            "RegionId": "4",
            "Fullname": "ABIA",
            "Label": "AB",
            "Zone": "South East",
            "Description": null
        },
    ]
