# easy-php
PHP Data Access Object Library. Making PHP easy and fast to use.

## How to use
Download the library, extract and save it in your project folder. 

Include the path to the **easy-php.php** file to the file you intend to use in your project.
```php
<?php 
require "path to your connection file";
require "path to easy-php.php file";
...
```

## Features
1. Database connection.
2. Delete data.
3. Update data.
4. Select data.
5. Insert data.

### Functions explained
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
4. **delete_data()** This function executes the delete action and returns a failure of success message. -[see code](#delete-data)

**INSERT functions**
It has 4 functions. 
1. Set connection as explained above.
2. **set_insertstatement("insert sql statement")** You pass your sql statement using this function. 
3. **set_data(array("put the data here"));** This function lets you pass the data to the prepared statement. Data is passed in array format. 
4. **insert_data()** This function executes the insert action and returns a failure of success message.-[see code](#insert-data)

**UPDATE functions**
It has 4 functions. 
1. Set connection as explained above.
2. **set_updatestatement("update sql statement")** You pass your sql statement using this function. 
3. **set_data(array("put the data here"));** This function lets you pass the data to the prepared statement. Data is passed in array format. 
4. **update_data()** This function executes the insert action and returns a failure of success message.-[see code](#update-data)


**SELECT functions**
It has 4 functions. 
1. Set connection as explained above.
2. **set_selectstatement("select sql statement")** You pass your sql statement using this function. 
3. **set_data(array("put the data here"));** This functions accepts two types of data types(An array with the data and the word false). If you pass false it means there are no conditions in the select statement. If you pass data in array format it means there are conditions in the select statement . 
4. **select_data()** This function executes the insert action and returns a failure of success message.-[see code](#select-data)




#### 1. Database connection
Inclucde the **Dbconnection.php** file.

Set the **hostname**, **database name**, **username**, **password** then call the **get_connection()** function and set it to a variable. 

```php
<?php 
require "path to Dbconnection.php";
$db=new Dbconnection();
$db->set_hostname("localhost");
$db->set_databasename("websample");
$db->set_username("root");
$db->set_password("");
$conn=$db->get_connection();
```
#### Delete data
Include the connection and the **actions.php** file. Then set the required functions.
Use ```$delete->report``` to get the response after the execution.

```php
<?php 
require "path to your connection file";
require "path to easy-php.php file";

$delete->set_connection($conn);//set the connection
$delete->set_deletestatement("DELETE FROM tbl_arrays WHERE id=?");//pass the sql statement
$delete->set_data(array("1"));//pass data
$delete->delete_data();//execute
echo $delete->report;//get the response
```
#### Insert data
Include the connection and the **actions.php** file. Then set the required functions.
Use ```$insert->report``` to get the response after the execution.

```php
<?php 
require "path to your connection file";
require "path to easy-php.php file";

$insert->set_connection($conn);
$insert->set_insertstatement("INSERT INTO tbl_arrays(name,age,location)VALUES(?,?,?)");
$insert->set_data(array("Victor","20","Kenya"));
$insert->insert_data();
echo $insert->report;
```
#### Update data
Include the connection and the **actions.php** file. Then set the required functions.
Use ```$update->report``` to get the response after the execution.

```php
<?php 
require "path to your connection file";
require "path to easy-php.php file";

$update->set_connection($conn);
$update->set_updatestatement("UPDATE tbl_arrays SET name=?,age=?,location=? WHERE id=?");
$update->set_data(array("Vic","30","Uganda","15"));
$update->update_data();
echo $update->report;
```
#### Select data
Include the connection and the **actions.php** file. Then set the required functions.
Use ```$select->report``` to get the response after the execution.

```php
<?php 
require "path to your connection file";
require "path to easy-php.php file";

$select->set_connection($conn);
$select->set_selectstatement("SELECT * FROM tbl_arrays WHERE id=?");
$select->set_data(array("3"));//pass data or use the next line of code
//$select->set_data("false");//use this if there are is no data being passed
$select->select_data();
while($data=$select->report->fetch_array()){
echo " id ".$data[0]." ";
echo " name ".$data[1];
}
```

