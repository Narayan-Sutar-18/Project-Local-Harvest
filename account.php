<?php
$conn = mysqli_connect("localhost", "root", "", "customer");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['ur'];
    $email = $_POST['email'];

    $q1 = "SELECT role, first_name, last_name,username, email, password, gender, address FROM c_account WHERE username = '$username' AND email = '$email'";
    $r1 = mysqli_query($conn, $q1);

    if (mysqli_num_rows($r1) > 0) 
    {
        $row = mysqli_fetch_assoc($r1);
    } else {
        $error = "No account found with the given username and email.";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
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

        #btn:hover {
            background-color: darkblue; 
        }

        #btn {
            width: 100px;
            background-color: rgba(0, 0, 255, 0.907);
            color: white;
            border-radius: 50px;
            font-size: larger;
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

        select, input[type="text"], input[type="email"] {
            font-size: 16px; 
            width: 90%;      
            margin: 10px 0;  
            border: 2px solid black; 
            border-radius: 10px; 
            text-align: center; 
            height: 30px;
        }

        body > *:not(header):not(footer) {
            padding-top: 80px;
            padding-bottom: 80px;
        }

        .dis{
            font-size : larger;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;

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
                <th><a href="login1.html">Log Out</a></th>
            </tr>
        </table>
    </header>

    <div id="add">
        <h2>Account Details</h2><br>

       
        <form method="POST">
            <label>Enter Your Username</label>
            <input type="text" name="ur" required><br>
            <label>Enter Your Email Id</label>
            <input type="email" name="email" required><br>
            <input type="submit" value="Submit" id="btn">
        </form>

        
        <?php if (isset($row)): ?>
            <p class="dis">Role: <?= $row["role"]; ?></p>
            <p class="dis">First Name: <?= $row["first_name"]; ?></p>
            <p class="dis">Last Name: <?= $row["last_name"]; ?></p>
            <p class="dis">Username: <?= $row["username"]; ?></p>
            <p class="dis">Email: <?= $row["email"]; ?></p>
            <p class="dis">Password: <?= $row["password"]; ?></p>
            <p class="dis">Gender: <?= $row["gender"]; ?></p>
            <p class="dis">Address: <?= $row["address"]; ?></p>
        <?php elseif (isset($error)): ?>
            <p><?= $error; ?></p>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2024 Local Harvest. All Rights Reserved.</p>
    </footer>
</body>
</html>
