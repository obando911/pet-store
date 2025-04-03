<?php
include ('config>database.php');
$fname= $_POST['f_name'];
$lname= $_POST['l_name'];
$email= $_POST['e_mail'];
$passw= $_POST['p_assw'];

$sql = "INSERT INTO USERS
(firstname, lastname, email, password)
VALUES ('$fname', '$lname', '$email', '$passw')
";
$ans=pg_query($conn, $sql);
if($ans){
echo  "User has been created successfully";


}else {
echo "Error";


}



?>