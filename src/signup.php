<?php
include ("config/database.php");

$fname = $_POST['f_name'];
$lname = $_POST['l_name'];
$email = $_POST['e_mail'];
$passw = $_POST['p_assw'];

//$hashed_password = password_hash($passw, PASSWORD_DEFAULT);//metodo de incriptacion
$hashed_password = $passw;

$sql_validate_email = "
        select
            count(id) as total
        from users
            where email = '$email' and 
        status = true
";
$ans = pg_query($conn, $sql_validate_email);

if($ans){ //$ans == true

$row = pg_fetch_assoc($ans);


if ($row['total'] > 0) {
    echo "User already exists !!!";
} else {
    // Insertar el nuevo usuario
    $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ($1, $2, $3, $4)";
    $ans = pg_query_params($conn, $sql, array($fname, $lname, $email, $hashed_password));

    if ($ans) {
        echo "User has been created successfully";
        //echo "<script>"
    } else {
        echo "Error inserting user";
    }
}

} else {
echo "Query Error";
}

?>