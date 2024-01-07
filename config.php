<?php

if (!defined('db_SERVER')) {
    define('db_SERVER', 'localhost');
}

if (!defined('db_USER')) {
    define('db_USER', 'root');
}

if (!defined('db_PASSWORD')) {
    define('db_PASSWORD', '');
}

if (!defined('db_DBNAME')) {
    define('db_DBNAME', 'isddb');
}

$conn =
mysqli_connect(db_SERVER,db_USER,db_PASSWORD,db_DBNAME);
if (!$conn) {
    echo '<script type="text/javascript">
alert("Error connecting the server ".
mysqli_connect_error()) </script>';
}
