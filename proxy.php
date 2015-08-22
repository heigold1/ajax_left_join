<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);

$username = "brent";
$password = "brent";
$hostname = "heigold1.apollomysql.com"; 

//connection to the database
 $dbhandle = mysql_connect($hostname, $username, $password)
    or die("Unable to connect to MySQL");  

 $selected = mysql_select_db("tasks",$dbhandle)
    or die("Could not select tasks");  

// Execute the SQL and bring back the records 

  $sql = "
    SELECT emp.first_name as first_name,
          emp.last_name as last_name,
          dpt.dept_id as dept_id
    FROM   task_2_employees emp
          LEFT JOIN task_2_departments dpt
                  ON emp.dept_id = dpt.dept_id";

  $result = mysql_query($sql) or die(mysql_error());

  $rows = array();
  while ($row = mysql_fetch_assoc($result)) 
  {
    $arr_new_row = array();
     $arr_new_row['first_name'] = $row['first_name'];
     $arr_new_row['last_name'] = $row['last_name'];
     $arr_new_row['dept_id'] = $row['dept_id'];
     $rows[] = $row;
  }

 print json_encode($rows);
?>