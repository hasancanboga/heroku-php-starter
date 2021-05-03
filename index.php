<?php

// phpinfo();

echo "Hello from Heroku<br><br>";

$serverName = "herokuhostname";
$dbUsername = "username";
$dbUserPassword = "passowrd";
$dbName = "dbname";

try {
    $db = new PDO("mysql:dbname=$dbName;host=$serverName;charset=utf8mb4;", $dbUsername, $dbUserPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    exit("Database Connection failed"); // . $e->getMessage());
}

echo 'MySQL Version: ' . run('SHOW VARIABLES like "version"')->fetch()['Value'];

function run($query, $bind = [])
{
    $db = $GLOBALS['db'];
    $q = $db->prepare($query);
    $q->execute($bind);
    return $q;
}
