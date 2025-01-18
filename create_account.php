<?php
        $role =$_POST["role"];
        $fname = $_POST["fn"];
        $lname = $_POST["ln"];
        $username = $_POST["ur"];
        $email = $_POST["email"];
        $password = $_POST["pass"];
        $ad = $_POST["ad"];
        $gender = $_POST["gender"];


        //connection 
        if ($role == "Farmer") {
            $conn = mysqli_connect("localhost", "root", "", "farmer");
            $table = "f_account";
        } else {
            $conn = mysqli_connect("localhost", "root", "", "customer");
            $table = "c_account";
        }

        //if($conn)
        //{
        //    echo "<br>Connection successful";
        //}
        //else
        //{
        //    echo "<br>Connection failed";
        //    exit();
        //}

        //Insertion
        $q3 = "INSERT INTO $table (role, first_name, last_name, username, email, password, address, gender) 
        VALUES ('$role', '$fname', '$lname', '$username', '$email', '$password', '$ad', '$gender')";
 
        $r3 = mysqli_query($conn,$q3);
        
        //if($r3)
        //{
        //    echo "<br>Data Inserted into table successful";
        //}
        //else
        //{
            //echo "<br>Error while creating table";
        //    echo "<br>Error while inserting into table: " . mysqli_error($conn);
        //    exit();
        //}

        if ($role === "Farmer") {
            header("Location: farmer_homepage.php");
            exit();
        } elseif ($role === "Customer") {
            header("Location: homepagenew.php");
            exit();
        }

        mysqli_close($conn);
    ?>