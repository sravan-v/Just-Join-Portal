<?php
    define("DB_SERVER", "localhost");
    // define("DB_USER", "justjoin");
    define("DB_USER", "root");
//    define("DB_PASSWORD", "just_join_111");
    define("DB_PASSWORD", "");
        // define("DB_DATABASE", "just_join");
    define("DB_DATABASE", "test");


    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

    if(mysqli_connect_error()){
        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
?>