<?php
$host = "localhost";
$name = "logindata";
$user = "root";
$passwort = "se1gutzuD!R";

try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort); //PDO ist eine Abstraktionsschicht, die es ermöglicht, mit verschiedenen Datenbanksystemen (MySQL, PostgreSQL, Oracle usw.) zu kommunizieren, ohne den Code jedes Mal ändern zu müssen.
}catch(PDOException $e){
    echo "SQL Error: ".$e->getMessage();
}