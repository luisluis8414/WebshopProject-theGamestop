<?php
require_once __DIR__.('/../vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');

$dotenv->load();

$host = $_ENV['DB_HOST'];
$name = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$passwort = $_ENV['DB_PASSWORD'];

try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort); //PDO ist eine Abstraktionsschicht, die es ermöglicht, mit verschiedenen Datenbanksystemen (MySQL, PostgreSQL, Oracle usw.) zu kommunizieren, ohne den Code jedes Mal ändern zu müssen.
}catch(PDOException $e){
    echo "SQL Error: ".$e->getMessage();
}