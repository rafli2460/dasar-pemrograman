<?php
/**
 * using mysqli_connect for database connection
 */

$databaseHost = 'mysql';
$databaseName = 'db_kelompok6';
$databaseUsername = 'root';
$databasePassword = 'rafli001';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

?>