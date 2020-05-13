# easy-php
PHP Data Access Object Library. Making PHP easy and fast to use

#### Features
1. Database connection.
2. Delete data.
3. Update data.
4. Select data.
5. Insert data.

#### Functions explained
Here is an explanation of functions in this library.

**set_connection($connection)** This is function is found in INSERT, DELETE, UPDATE AND SELECT actions. It accepts one parameter which is the connection. It is a requiremnt to carry out any actions to the database. 

```php
<?php
$delete->set_connection($conn);
$insert->set_connection($conn);
$update->set_connection($conn);
$select->set_connection($conn);
```
**DELETE functions**
It has 4 functions. 
1. Set connection as explained above.
2. **set_deletestatement("delete sql statement")** You pass your sql statement using this function. 
3. **set_data(array("put the data here"));** This function lets you pass the data to the prepared statement. Data is passed in array format. 
4. **delete_data()** This function executes the delete action and returns a failure of success message.

**INSERT functions**
It has 4 functions. 
1. Set connection as explained above.
2. **set_insertstatement("insert sql statement")** You pass your sql statement using this function. 
3. **set_data(array("put the data here"));** This function lets you pass the data to the prepared statement. Data is passed in array format. 
4. **insert_data()** This function executes the insert action and returns a failure of success message.



##### 1. Database connection
Inclucde the **Dbconnection.php** file.

Set the **hostname**, **database name**, **username**, **password** then call the **get_connection()** function and set it to a variable. 

```php
<?php 
require "../connection/Dbconnection.php";
$db=new Dbconnection();
$db->set_hostname("localhost");
$db->set_databasename("websample");
$db->set_username("root");
$db->set_password("");
$conn=$db->get_connection();
