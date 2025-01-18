<?php

    $role = $_POST['role'];
    $username = $_POST['ur'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

   
    if ($role == "Farmer")
    {
        $conn = mysqli_connect("localhost", "root", "", "farmer");
        $table = "f_account";
    } 
    else
    {
        $conn = mysqli_connect("localhost", "root", "", "customer");
        $table = "c_account";
    }

    // Searching
    $q1 = "SELECT * FROM $table WHERE username='$username' AND email='$email'";
    $r1 = mysqli_query($conn, $q1);

   
    if ($r1) 
    {
        // Fetch user data
        if ($info = mysqli_fetch_array($r1)) 
        {
            if ($info['password'] === $password) 
            { 
                if ($role === "Farmer") 
                {
                    header("Location: farmer_homepage.php");
                    exit();
                } 
                elseif ($role === "Customer") 
                {
                    header("Location: homepagenew.php");
                    exit();
                }
            } 
            else 
            {
                echo "<script>alert('Incorrect password. Please try again.');</script>";
            }
        
        }
        else 
        {
            echo "<script>alert('No user found with that username.');</script>";
        }
    } 
   
    else 
    {
        echo "<script>alert('Query failed: " . mysqli_error($conn) . "');</script>";
    }

    // Close the connection
    mysqli_close($conn);

?>
