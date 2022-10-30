<?php
// include dbConfig
include_once './dbConfig.php';

// create users table if it does not exist
$adminSql = "CREATE TABLE IF NOT EXISTS admin_users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(255) DEFAULT 'Admin' NOT NULL
    )";
$seekersSql = "CREATE TABLE IF NOT EXISTS job_seekers (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    role VARCHAR(255) NOT NULL,
    age INT(11) NOT NULL
    )";
$employersSql = "CREATE TABLE IF NOT EXISTS employers (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    role VARCHAR(255) NOT NULL,
    school VARCHAR(255) NOT NULL,
    status VARCHAR(255) NOT NULL,
    age INT(11) NOT NULL
    )";
$requestSql = "CREATE TABLE IF NOT EXISTS employer_request (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    school VARCHAR(255) NOT NULL,
    age INT(11) NOT NULL
    )";

// execute the query
$db->query($adminSql);
// execute the query
$db->query($seekersSql);
// execute the query
$db->query($employersSql);
// execute the query
$db->query($requestSql);
?>