<?php

$db['db_host'] = 'pakmetal.mysql.database.azure.com';
$db['db_user'] = 'sdadmin@pakmetal';
$db['db_pass'] = 'Allah786$';
$db['db_name'] = 'u107205359_pmi';

foreach ($db as $key => $value) {
    define(strtoupper($key),$value);
}
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(!$connection){
    echo "Cannot able to connect to the database";
}

 ?>
