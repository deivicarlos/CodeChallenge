**Show User** 
---
---
  Returns json data about a single user.

* **URL**
&emsp;api/users/:uid

* **Method:**
&emsp;`GET`
  
*  **URL Params**
   &emsp;**Required:**
    &emsp;&emsp;`id=[integer]`

* **Data Params**
  &emsp;None

* **Success Response:**
    * **Code:** 200
    **Status:** OK
    **Message:** Success
    **Response:** `{   
            id : 12, 
            first_name : "Carlos",
            last_name : "Garcia", 
            name : "CD", 
            email : "carlos.garcia@bluecoding.com", 
            date_of_birth : "2018-06-11 00:00:00",
            is_host : 1,
            latitude : 18.455829,
            longitude : -69.962637,
            created_at : null,
            updated_at : null,
            reservation_id : []
        }`
 
* **Error Response:**

  * **Code:** 400
    **Status:** BadRequest
    **Message:** error
    **Response:**`{
            errorCode : 404,
            errorMessage: "Record not found"
        }`

* **Sample Call:**

    ```javascript
    $.ajax({
      url: "api/users/1",
      dataType: "json",
      type : "GET",
      success : function(r) { console.log(r); }
    });
    ```
&nbsp;

**Create User**
----
---
Creates a new user.
  
* **URL**
    &emsp;api/users

* **Method:**
&emsp;`POST`
  
*  **URL Params**
   &emsp;None

* **Data Params**
    &emsp;**Required:** 
    &emsp;&emsp;`email = [string]`\
    &emsp;&emsp;`first_name = [string]`
    &emsp;&emsp;`last_name = [string]`
    &emsp;&emsp;`name = [string]`
    &emsp;&emsp;`is_host = [boolean]`
    &emsp;&emsp;`date_of_bith = [date]`
    &emsp;&emsp;`latitude = [decimal]`
    &emsp;&emsp;`longitude = [decimal]`

* **Success Response:**

  * **Code:** 200
    **Status:** OK
    **Message:** Success
    **Response:** true

* **Error Response:**

  * **Code:** 400
    **Status:** Bad
    **Message:** error
    **Response:**: `{
            errorCode : 404,
            errorMessage: "DB exception thrown"
        }`

* **Sample Call:**

    ```javascript
    $.ajax({
        type: "POST",
        url: "api/users",
        dataType: "json",
        data:{
            "email":"test2@company1.com",
	        "name":"John \"Johnnie\" Doe",
	        "first_name":"John",
	        "last_name":"Doe Curtis",
	        "is_host":false,
	        "date_of_birth":"1979-06-09"
	    },
        success: function(r) { console.log(r); },
    });
    ```
&nbsp;

**Delete User**
----
---
Deletes the specified user from the database.
  
* **URL**
    &emsp;api/users/:uid

* **Method:**
&emsp;`DELETE`
  
*  **URL Params**
   &emsp;**Required:**
        &emsp;&emsp;`id=[integer]`

* **Data Params**
    &emsp;None

* **Success Response:**

  * **Code:** 200
    **Status:** OK
    **Message:** Success
    **Response:** true

* **Error Response:**

  * **Code:** 400
    **Status:** Bad
    **Message:** error
    **Response:**: `{
            errorCode : 404,
            errorMessage: "DB exception thrown"
        }`

* **Sample Call:**

    ```javascript
    $.ajax({
      url: "api/users/1",
      dataType: "json",
      type : "DELETE",
      success : function(r) { console.log(r); }
    });
    ```
&nbsp;

**Update User**
----
---
Updates the user information.
  
* **URL**
    &emsp;api/users/:uid

* **Method:**
&emsp;`PUT | PATCH`
  
*  **URL Params**
   &emsp;**Required:**
    &emsp;&emsp;`id=[integer]`

* **Data Params**
    &emsp;**Optional:**
        &emsp;&emsp;`email = [string]`
        &emsp;&emsp;`first_name = [string]`
        &emsp;&emsp;`last_name = [string]`
        &emsp;&emsp;`name = [string]`
        &emsp;&emsp;`is_host = [boolean]`
        &emsp;&emsp;`date_of_bith = [date]`
        &emsp;&emsp;`latitude = [decimal]`
        &emsp;&emsp;`longitude = [decimal]`

* **Success Response:**

  * **Code:** 200
    **Status:** OK
    **Message:** Success
    **Response:** true

* **Error Response:**

  * **Code:** 400
    **Status:** Bad
    **Message:** error
    **Response:**: `{
            errorCode : 404,
            errorMessage: "DB exception thrown"
        }`

* **Sample Call:**

    ```javascript
    $.ajax({
        type: "PATCH",
        url: "api/users/1",
        dataType: "json",
        data:{
            "email":"test2@company1.com",
	        "name":"John \"Johnnie\" Doe",
	        "first_name":"John",
	        "last_name":"Doe Curtis",
	        "is_host":false,
	        "date_of_birth":"1979-06-09"
	    },
        success: function(r) { console.log(r); }
    });
    ```
&nbsp;    
    
**Create Reservation**
----
---
Creates a reservervation between a host user and others users.
  
* **URL**
    &emsp;api/reservation

* **Method:**
&emsp;`POST`
  
*  **URL Params**
   &emsp;None

* **Data Params**
    &emsp;**Required:** 
    &emsp;&emsp;`host = [integer]`\
    &emsp;&emsp;`guests[] = [integer]`
    
* **Success Response:**

  * **Code:** 200
    **Status:** OK
    **Message:** Success
    **Response:** true

* **Error Response:**

  * **Code:** 400
    **Status:** Bad
    **Message:** error
    **Response:**: `{
            errorCode : 404,
            errorMessage: "Unabled to create reservation, user is not host"
        }`
  
  OR
  * **Code:** 400
    **Status:** Bad
    **Message:** error
    **Response:**: `{
            errorCode : 404,
            errorMessage: "Unabled to create reservation without guests"
        }`

* **Sample Call:**

    ```javascript
    $.ajax({
        type: "POST",
        url: "api/reservations",
        dataType: "json",
        data:{
            "host": 1,
	        "guests": [2, 3]
	    },
        success: function(r) { console.log(r); },
    });
    ```
&nbsp;
    
**Show User Reservations** 
---
---
  Returns json data about the guests related to the user.

* **URL**
&emsp;api/users/:uid/guests

* **Method:**
&emsp;`GET`
  
*  **URL Params**
   &emsp;**Required:**
    &emsp;&emsp;`id=[integer]`

* **Data Params**
  &emsp;None

* **Success Response:**
    * **Code:** 200
    **Status:** OK
    **Message:** Success
    **Response:** 
`[  {
        "id": 2,
        "first_name": "Randall",
        "last_name": "Valenciano",
        "name": "Valen",
        "email": "rvalenciano@email.com",
        "date_of_birth": "2018-06-11 00:00:00",
        "is_host": 0,
        "latitude": "18.482843",
        "longitude": "-69.913290",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "pivot": {
        "reservation_id": 3,
        "user_id": 2
        }
    },
    {
        "id": 3,
        "first_name": "Douglas",
        "last_name": "De la Rosa",
        "name": "CD",
        "email": "douglas.delarosa@bluecoding.com",
        "date_of_birth": "2018-06-11 00:00:00",
        "is_host": 0,
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "pivot": {
            "reservation_id": 3,
            "user_id": 3
        }
    }
]`
 
* **Error Response:**

  * **Code:** 400
    **Status:** Bad
    **Message:** error
    **Response:**`{
            errorCode : 400,
            errorMessage: "Unabled to find reservations for the user"
        }`

* **Sample Call:**

    ```javascript
    $.ajax({
      url: "api/users/1/guests",
      dataType: "json",
      type : "GET",
      success : function(r) { console.log(r); }
    });
    ```
&nbsp;
    
**Delete User Reservation** 
---
---
  Deletes the relation between a host user and his guests in a reservation

* **URL**
&emsp;api/reservations/hosts/:uid/guests

* **Method:**
&emsp;`DELETE`
  
*  **URL Params**
   &emsp;**Required:**
    &emsp;&emsp;`id=[integer]`

* **Data Params**
  &emsp;None

* **Success Response:**
    * **Code:** 200
    **Status:** OK
    **Message:** Success
    **Response:** true
 
* **Error Response:**

  * **Code:** 400
    **Status:** Bad
    **Message:** error
    **Response:**`{
            errorCode : 400,
            errorMessage: "Unabled to delete reservations, user do not have reservations"
        }`

* **Sample Call:**

    ```javascript
    $.ajax({
      url: "api/reservations/hosts/1/guests",
      dataType: "json",
      type : "DELETE",
      success : function(r) { console.log(r); }
    });
    ```
  
**Show User Recommendations** 
---
---
  Shows guests recommendation to users based on locations.

* **URL**
&emsp;api/users/recommendations/:uid

* **Method:**
&emsp;`GET`
  
*  **URL Params**
   &emsp;**Required:**
    &emsp;&emsp;`id=[integer]`

* **Data Params**
  &emsp;None

* **Success Response:**
    * **Code:** 200
    **Status:** OK
    **Message:** Success
    **Response:** `["uids" : [2, 3]`
 
* **Error Response:**

  * **Code:** 400
    **Status:** Bad
    **Message:** error
    **Response:**`{
            errorCode : 400,
            errorMessage: "Unabled to find reservations for the user"
        }`

* **Sample Call:**

    ```javascript
    $.ajax({
      url: "api/users/recommendations/1",
      dataType: "json",
      type : "GET",
      success : function(r) { console.log(r); }
    });
    ```