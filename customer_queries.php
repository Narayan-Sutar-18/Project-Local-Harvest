<?php

$conn = mysqli_connect("localhost", "root", "");

// Check the connection
if ($conn) {
    echo "Connected" . "<br>";
} else {
    echo "Not connected" . "<br>";
}

// Create the database
$q1 = "CREATE DATABASE CUSTOMER";
$r1 = mysqli_query($conn, $q1);

if ($r1) {
    echo "Database 'CUSTOMER' created" . "<br>";
} else {
    echo "Failed to create 'CUSTOMER' database: " . mysqli_error($conn) . "<br>";
}

// Select the database for creating tables
mysqli_select_db($conn, "CUSTOMER");

// Create c_account table
$q2 = "CREATE TABLE c_account (
    role VARCHAR(50),
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    username VARCHAR(50),
    email VARCHAR(100),
    password VARCHAR(100),
    address VARCHAR(150),
    gender VARCHAR(10)
)";
$r2 = mysqli_query($conn, $q2);

if ($r2) {
    echo "Table 'c_account' created" . "<br>";
} else {
    echo "Failed to create 'c_account' table: " . mysqli_error($conn) . "<br>";
}

// Create order table
$q3 = "CREATE TABLE `order` (
    id INT(5) PRIMARY KEY,
    c_fn VARCHAR(50),
    c_ln VARCHAR(50),
    c_address VARCHAR(150),
    c_email VARCHAR(100),
    pname VARCHAR(100),
    quantity INT(3),
    price INT(5),
    status VARCHAR(50)
)";
$r3 = mysqli_query($conn, $q3);

if ($r3) {
    echo "Table 'order' created" . "<br>";
} else {
    echo "Failed to create 'order' table: " . mysqli_error($conn) . "<br>";
}

// Create contact_form table
$q4 = "CREATE TABLE contact_form (
    id INT(5) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    message VARCHAR(150) NOT NULL
)";
$r4 = mysqli_query($conn, $q4);

if ($r4) {
    echo "Table 'contact_form' created" . "<br>";
} else {
    echo "Failed to create 'contact_form' table: " . mysqli_error($conn) . "<br>";
}

// Create feedback_form table
$q5 = "CREATE TABLE feedback_form (
    id INT(3) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    role VARCHAR(50) NOT NULL,
    rating INT(3) CHECK (rating >= 1 AND rating <= 5),
    feedback VARCHAR(100) NOT NULL
)";
$r5 = mysqli_query($conn, $q5);

if ($r5) {
    echo "Table 'feedback_form' created" . "<br>";
} else {
    echo "Failed to create 'feedback_form' table: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);

?>
