# easy-php
PHP Data Access Object Library. Making PHP easy and fast to use

#### Features
1. Database connection.
2. Delete data.
3. Update data.
4. Select data.
5. Insert data.

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
