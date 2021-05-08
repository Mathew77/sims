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

```

POST : http://simis.cleavey.com.ng/api/v1/user-auth

REQUEST BODY :

{

    "userid": "ab-001-0002",
    "pwd": "123456"
}

```

2B. Change  User Password **`/api/v1/update-password  `**: **`HTTP POST`**

```

POST : http://simis.cleavey.com.ng/api/v1/user-auth

REQUEST BODY :

{

    "userid": "ab-001-0002",
    "pwd": "123456",
    "old_password" : "123456"
}

```


3. Get All the State, LGA, Programmes assign to user **`/api/v1/user-privilege`**: **`HTTP GET`**

```

    GET : http://simis.cleavey.com.ng/api/v1/user-privilege
    


```
4.  Get All CCT Program Period **`/api/v1/cct-period`**: **`HTTP GET`**

```
    GET : http://simis.cleavey.com.ng/api/v1/cct-period


```
5. Get All CCT Program Period **`/api/v1/gee-period`**: **`HTTP GET`**

```
GET : http://simis.cleavey.com.ng/api/v1/gee-period


```
6. Get All NPO Program Period **`/api/v1/npo-period`**: **`HTTP GET`**

```GET : http://simis.cleavey.com.ng/api/v1/npo-periodod' ]);


```
7. Get All SFP Program Period **`/api/v1/sfp-period`**: **`HTTP GET`**



```
GET : http://simis.cleavey.com.ng/api/v1/sfp-period

8. GET LIST OF STATE BY USER ID

POST : http://simis.cleavey.com.ng/api/v1/state
REQUEST BODY :


 {
    "user_id": 2,
    "user_state"  : "abia,adamawa,sokoto,jos" 
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
    "user_id": 2,
    "lga"  : "Aba North, Aba South, Arochukwu,Demsa" ,
    "state_id" : 2
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
      
      
    ]



  8. GET LIST OF BENEFICIARY PER PROGRAMM 

POST : http://simis.cleavey.com.ng/api/v1/cct-summary  

        http://simis.cleavey.com.ng/api/v1/gee-summary

        http://simis.cleavey.com.ng/api/v1/npo-summary

        http://simis.cleavey.com.ng/api/v1/sfp-summary
####
REQUEST BODY :
{
    "period": 3,  
    "state_id": 2
    "user_lga": "Aba North,Aba South,Arochukwu,Demsa",  
    "user_id": 2

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
      
      
    ]


11.  GET LIST OF  PROGRAMMES 

   POST :      localhost/sim/api/v1/programmes
   ```
   REQUEST BODY :
{
    "user_id": 3,  
    "programmes": "cct, geep, nhgsfp, npower"
}
```
 
    
12. GET list of Beneficiary base on program type 

```
    POST : localhost/sim/api/v1/beneficiaries
#
```
REQUEST: 
    { 
    "state_id": 1, 
    "lga_id" : 1,
    "programme_type" : "gee"
 }
```
RESPONSE :
   {
    "status": 200,
    "data": [
        {
            "beneficiaryid": "1",
            "stateid": "1",
            "lgaid": "1",
            "ward": "",
            "batch": "Jan/Feb 2021",
            "geep_id": "BI/001/92929",
            "first": "James",
            "middle": "Kingsley",
            "last": "Ndidi",
            "gender": "Male",
            "phone": "08083838383",
            "start_date": "1970-01-01",
            "end_date": "1970-01-01",
            "primary_assignment": null,
            "qualification": "",
            "address": "",
            "biz_type": "Commercial Driver",
            "active": "1"
        },
      
    ],
    "message": ""
}

#
13. CREATING CCT DATA ENTRY FORM 
    ENDPOINT : localhost/sim/api/v1/cct

CREATE CCT DATA ENTRY 

```
REQYEST BODY 

{
"beneficiaryid":"4" ,
"periodid":"3",
"collected_date":"",
"is_disability":"6" ,
"is_bank":"3" ,
"bank_distance":"3",
"is_bvn":"",
"is_nin":"",
"is_household_head":"",
"income_source":"",
"household_income_perday":"",
"is_part_cooperative":"" ,
"person_in_household":"",
"dependant_below_18":"" ,
"dependant_below_2":"",
"dependent_in_school":"" ,
"children_immunized":"" ,
"remark":"",
"created":"",
"has_collected": 2,
"payment_date": 2,
"data_collected_date": 2,
"amount_paid": 3555,
"total_amount": 444,
"is_challenging": 1,
"gps": "5666,5555",
"user_id" : "1"
}
````
#
13. CREATING GEEP DATA ENTRY FORM 
    ENDPOINT : localhost/sim/api/v1/geep

CREATE GEEP DATA ENTRY 

```
REQYEST BODY 


{
"beneficiaryid":"4" ,
"periodid":"3",
"collected_date":"",
"avg_daily_expense":"6" ,
"avg_turnover_bf_loan":"3" ,
"category_of_loan":"6" ,
"avg_daily_turnover":"3" ,
"amount_received":"3",
"repayment_due":"",
"staff_employed_female":"",
"staff_employed_male":"",
"has_paid_back":"",
"profit_plough_back":"",
"person_in_household":"" ,
"is_tax_payer":"",
"frequency_of_tax":"" ,
"tax_amount":"",
"is_head_of_household":"" ,
"is_disabled":"" ,
"remark":"",
"created":"",
"is_dependent": 2,
"dependent_below_18": 2,
"dependent_below_2": 2,
"is_dependent_in_school": 3555,
"is_dependent_below_2": 444,
"dependent_immunized": 1,
"gps": "5666,5555",
"user_id" : "1"
}
````
###
15. CREATING NPO DATA ENTRY FORM 
    ENDPOINT : localhost/sim/api/v1/npo

CREATE NPO DATA ENTRY 

```
REQUEST BODY 

{
"beneficiaryid":"4" ,
"periodid":"3",
"collected_date": "2021-04-04",
"has_received_stipend":"3",
"work_days_inperiod":"3",
"total_work_days":"3",
"absent_reason":"3",
"has_gained_skill":"3",
"has_commence_trade":"3",
"plan_after":"3",
"user_id" : "1"
}


```

###
16. FETCH GEEP BY ID
    ENDPOINT : localhost/sim/api/v1/geep/1
    MENTHOD : POST


17. FETCH NPO BY ID
    ENDPOINT : localhost/sim/api/v1/npo/1
    MENTHOD : POST


#

18. UPDATE GEEP DATA ENTRY FORM 
    ENDPOINT : localhost/sim/api/v1/geep-update/1

UPDATE GEEP DATA ENTRY 

```
REQYEST BODY 


{
"id":1 ,
"beneficiaryid":"4" ,
"periodid":"3",
"collected_date":"",
"avg_daily_expense":"6" ,
"avg_turnover_bf_loan":"3" ,
"category_of_loan":"6" ,
"avg_daily_turnover":"3" ,
"amount_received":"3",
"repayment_due":"",
"staff_employed_female":"",
"staff_employed_male":"",
"has_paid_back":"",
"profit_plough_back":"",
"person_in_household":"" ,
"is_tax_payer":"",
"frequency_of_tax":"" ,
"tax_amount":"",
"is_head_of_household":"" ,
"is_disabled":"" ,
"remark":"",
"created":"",
"is_dependent": 2,
"dependent_below_18": 2,
"dependent_below_2": 2,
"is_dependent_in_school": 3555,
"is_dependent_below_2": 444,
"dependent_immunized": 1,
"gps": "5666,5555",
"user_id" : "1"
}
````

19. UPDATE NPO DATA ENTRY FORM 
    ENDPOINT : localhost/sim/api/v1/npo-update/2

UPDATE NPO DATA ENTRY 

```
REQYEST BODY 


{
"id":1 ,
"beneficiaryid":"4" ,
"periodid":"3",
"collected_date": "2021-04-04",
"has_received_stipend":"3",
"work_days_inperiod":"3",
"total_work_days":"3",
"absent_reason":"3",
"has_gained_skill":"3",
"has_commence_trade":"3",
"plan_after":"3",
"user_id" : "1"
}
````
