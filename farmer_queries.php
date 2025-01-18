<?php

$conn = mysqli_connect("localhost", "root", "");

// Check the connection
if ($conn) {
    echo "Connected" . "<br>";
} else {
    echo "Not connected" . "<br>";
}

// Create the FARMER database
$q1 = "CREATE DATABASE FARMER";
$r1 = mysqli_query($conn, $q1);

if ($r1) {
    echo "Database 'FARMER' created" . "<br>";
} else {
    echo "Failed to create 'FARMER' database: " . mysqli_error($conn) . "<br>";
}

// Select the FARMER database for creating tables
mysqli_select_db($conn, "FARMER");

// Create f_account table
$q2 = "CREATE TABLE f_account (
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
    echo "Table 'f_account' created" . "<br>";
} else {
    echo "Failed to create 'f_account' table: " . mysqli_error($conn) . "<br>";
}

// Create add_product table
$q3 = "CREATE TABLE add_product (
    sr_no INT(5) PRIMARY KEY,
    pname VARCHAR(100),
    category VARCHAR(50),
    edate VARCHAR(50),
    price DECIMAL(10, 2),
    unit VARCHAR(20),
    storage VARCHAR(100),
    image VARCHAR(100)
)";
$r3 = mysqli_query($conn, $q3);

if ($r3) {
    echo "Table 'add_product' created" . "<br>";
} else {
    echo "Failed to create 'add_product' table: " . mysqli_error($conn) . "<br>";
}

// Close the connection
mysqli_close($conn);

?>
