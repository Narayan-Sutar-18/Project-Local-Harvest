<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            background-image: url(add_bg.png);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        #add {
            border: 2px solid black;
            background-color: antiquewhite;
            padding: 50px;
            border-radius: 20px;
            margin: 125px auto;
            width: 70%;
            text-align: center;
        }
        header, footer {
            width: 100%;
            position: fixed;
            left: 0;
            padding: 10px 0;
            text-align: center;
            color: white;
            z-index: 999;
        }
        header {
            top: 0;
            background: linear-gradient(to right, #FF5722, #FFEB3B);
            border-bottom: 2px solid black;
        }
        footer {
            bottom: 0;
            background-color: blue;
        }
        table {
            width: 100%;
            margin: 30px auto;
            border-collapse: collapse;
            font-size: 18px;
        }
        table, th, td {
            border: 2px solid black;
        }
        th, td {
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: #FFEB3B;
            color: black;
        }
        td img {
            max-width: 100px;
            height: auto;
        }
        #btn {
            width: 100px;
            background-color: rgba(0, 0, 255, 0.907);
            color: white;
            border-radius: 50px;
            font-size: larger;
        }
        #btn:hover {
            background-color: darkblue; 
        }
        a {
            color: black;
            text-decoration: none;
        }
        a:hover {
            color: red;
        }
        label {
            font-size: large;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        select, input[type="text"], input[type="number"], input[type="email"] {
            font-size: 16px; 
            width: 90%;      
            margin: 10px 0;  
            border: 2px solid black; 
            border-radius: 10px; 
            text-align: center; 
            height:30px;
        }
        body > *:not(header):not(footer) {
            padding-top: 80px;
            padding-bottom: 80px;
        }
    </style>
</head>
<body>
    <header>
        <table border="0" width="100%" height="60px" class="header-bg" style="margin: 0; padding: 0;">
            <tr style="border: 2px solid black; font-size: large; color: black;">
                <th><a href="about_us.html">About Us</a></th>
                <th><a href="homepagenew.php">Home</a></th>
                <th style="padding: 10px; text-align: center; font-size: 24px;">Local Harvest: Fresh and Healthy</th>
                <th><a href="account.php">My Account</a></th>
                <th><a href="login1.html">Log Out</a></th>
            </tr>
        </table>
    </header>

    <div id="add">
    <?php
    $conn = mysqli_connect("localhost", "root", "", "farmer");

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); 

        $q1 = "SELECT image, pname, price, unit, category, edate, storage FROM add_product WHERE sr_no = $id";
        $r1 = mysqli_query($conn, $q1);

        if ($row = mysqli_fetch_array($r1)) {
            echo "<h2>Name : " . $row['pname'] . "</h2>";
            echo "<img src='uploads/" . $row['image'] . "' alt='" . $row['pname'] . "' height='350px' width='350px'>";
            echo "<p><b>Price:</b> " . $row['price'] . " /- per " . $row['unit'] . "</p>";
            echo "<p><b>Category:</b> " . $row['category'] . "</p>";
            echo "<p><b>Expiry Date:</b> " . $row['edate'] . "</p>";
            echo "<p><b>Storage :</b> " . $row['storage'] . "</p>";

            $name = $row['pname'];
            $price = $row['price'];
        } else {
            echo "<p>Product not found.</p>";
        }
    } else {
        echo "<p>No product ID specified.</p>";
    }
    ?>

    <form action="" method="POST">
        <br><label>Quantity </label><br>
        <input type="number" min="1" max="20" name="quantity" required><br><br>

        <label>Enter Username </label>
        <input type="text" name="ur" required><br><br>
        
        <label>Enter Email </label><br><br>
        <input type="email" name="email" required><br><br>

        <input type="submit" value="Order" id="btn">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $conn_order = mysqli_connect("localhost", "root", "", "customer");
        if ($conn_order) 
        {
            $Quantity = $_POST['quantity'];
            $username = $_POST['ur'];
            $email = $_POST['email'];

            $q2 = "SELECT * FROM c_account WHERE username = '$username' AND email = '$email'";
            $r2 = mysqli_query($conn_order, $q2);

            if ($r2 && mysqli_num_rows($r2) > 0) 
            {
                $q3 = "SELECT first_name, last_name, address FROM c_account WHERE username = '$username' AND email = '$email'";
                $r3 = mysqli_query($conn_order, $q3);

                if ($row = mysqli_fetch_array($r3)) 
                {
                    $fn = $row['first_name'];
                    $ln = $row['last_name'];
                    $add = $row['address'];

                    $q4 = "INSERT INTO `order` (c_fn, c_ln, c_address, c_email, pname, quantity, price) VALUES ('$fn', '$ln', '$add', '$email', '$name', '$Quantity', '$price')";
                    $r4 = mysqli_query($conn_order, $q4);

                    if ($r4) 
                    {
                        echo "<script>alert('Order placed successfully');</script>";
                    } 
                    else 
                    {
                        echo "<script>alert('Failed to place order');</script>";
                    }
                }
            } 
            else 
            {
                echo "<script>alert('No User found. Please enter correct username and email.');</script>";
            }
        }
        mysqli_close($conn_order);
    }
    mysqli_close($conn);
    ?>
    
    </div>

    <footer>
        <p>&copy; 2024 Local Harvest. All Rights Reserved.</p>
    </footer>
</body>
</html>
