<?php
$host = "localhost:3308";
$user = "root";
$password = "";
$dbname = "lagmay";
$dsn = "mysql:host={$host};dbname={$dbname}";

$pdo = new PDO($dsn, $user, $password);
$pdo->exec("SET time_zone = '+08:00';");
?>

<!--Sir nahirapan ako dito mag connect, kapag hindi naka port sa 3306-->