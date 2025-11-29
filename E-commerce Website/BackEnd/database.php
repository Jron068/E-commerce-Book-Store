<?php 
    define('DB_HOST', 'localhost');
    define('DB_USER', 'account' );
    define('DB_PASS', '123456' );
    define('DB_NAME', 'acc_credential');


    //create a connection
    //NEED THE SEQUENCE OF THE DEFINE
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    //checking the connection
    if($connection->connect_error){
        die('Connection Failed' . $connection->connect_error);
    }

?>

