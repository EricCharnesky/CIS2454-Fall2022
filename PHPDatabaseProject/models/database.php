<?php

// database server type, location, database name
$data_source_name = 'mysql:host=localhost;dbname=stock';
// feels bad, but we don't have time to show a better way
$username = 'stockuser';
$password = 'test';
$database = new PDO($data_source_name, $username, $password);
