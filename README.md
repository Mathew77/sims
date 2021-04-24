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


8. GET LIST OF LGS  BY USER ID and STATE ID

POST : http://simis.cleavey.com.ng/api/v1/lga
REQUEST BODY :
{
    "user_id": "admin",  
    "state_id": 2
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
        {
            "StateId": "2",
            "RegionId": "2",
            "Fullname": "ADAMAWA",
            "Label": "AD",
            "Zone": "North East",
            "Description": null
        },
        {
            "StateId": "3",
            "RegionId": "5",
            "Fullname": "AKWA IBOM",
            "Label": "AK",
            "Zone": "South South",
            "Description": null
        },
        {
            "StateId": "4",
            "RegionId": "4",
            "Fullname": "ANAMBRA",
            "Label": "AN",
            "Zone": "South East",
            "Description": null
        },
        {
            "StateId": "5",
            "RegionId": "2",
            "Fullname": "BAUCHI",
            "Label": "BA",
            "Zone": "North East",
            "Description": null
        },
        {
            "StateId": "6",
            "RegionId": "5",
            "Fullname": "BAYELSA",
            "Label": "BY",
            "Zone": "South South",
            "Description": null
        },
        {
            "StateId": "7",
            "RegionId": "1",
            "Fullname": "BENUE",
            "Label": "BE",
            "Zone": "North Central",
            "Description": null
        },
        {
            "StateId": "8",
            "RegionId": "2",
            "Fullname": "BORNO",
            "Label": "BO",
            "Zone": "North East",
            "Description": null
        },
        {
            "StateId": "9",
            "RegionId": "5",
            "Fullname": "CROSS RIVER",
            "Label": "CR",
            "Zone": "South South",
            "Description": null
        },
        {
            "StateId": "10",
            "RegionId": "5",
            "Fullname": "DELTA",
            "Label": "DE",
            "Zone": "South South",
            "Description": null
        },
        {
            "StateId": "11",
            "RegionId": "4",
            "Fullname": "EBONYI",
            "Label": "EB",
            "Zone": "South East",
            "Description": null
        },
        {
            "StateId": "12",
            "RegionId": "5",
            "Fullname": "EDO",
            "Label": "ED",
            "Zone": "South South",
            "Description": null
        },
        {
            "StateId": "13",
            "RegionId": "6",
            "Fullname": "EKITI",
            "Label": "EK",
            "Zone": "South West",
            "Description": null
        },
        {
            "StateId": "14",
            "RegionId": "4",
            "Fullname": "ENUGU",
            "Label": "EN",
            "Zone": "South East",
            "Description": null
        },
        {
            "StateId": "15",
            "RegionId": "1",
            "Fullname": "FCT",
            "Label": "FC",
            "Zone": "North Central",
            "Description": null
        },
        {
            "StateId": "16",
            "RegionId": "2",
            "Fullname": "GOMBE",
            "Label": "GO",
            "Zone": "North East",
            "Description": null
        },
        {
            "StateId": "17",
            "RegionId": "4",
            "Fullname": "IMO",
            "Label": "IM",
            "Zone": "South East",
            "Description": null
        },
        {
            "StateId": "18",
            "RegionId": "3",
            "Fullname": "JIGAWA",
            "Label": "JI",
            "Zone": "North West",
            "Description": null
        },
        {
            "StateId": "19",
            "RegionId": "3",
            "Fullname": "KADUNA",
            "Label": "KD",
            "Zone": "North West",
            "Description": null
        },
        {
            "StateId": "20",
            "RegionId": "3",
            "Fullname": "KANO",
            "Label": "KN",
            "Zone": "North West",
            "Description": null
        },
        {
            "StateId": "21",
            "RegionId": "3",
            "Fullname": "KATSINA",
            "Label": "KT",
            "Zone": "North West",
            "Description": null
        },
    ]
