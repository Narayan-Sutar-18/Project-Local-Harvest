<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
    <style>
        body {
            background-image: url(add_bg.png);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            padding-top: 60px; 
            padding-bottom: 40px; 
        }

        header, footer {
            position: fixed;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        header {
            top: 0;
        }

        footer {
            bottom: 0;
            background-color: blue;
            text-align: center;
            padding: 10px 0;
            color: white;
        }

        #add {
            border: 2px solid black;
            background-color: antiquewhite;
            padding: 70px;
            border-radius: 20px;
            margin: 125px;
            width: 70%;
            text-align: center;
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        select {
            border-radius: 5px;
            padding: 4px;
        }

        thead {
            background-color: yellow;
        }

        #btn_update {
            background-color: blue;
            color: white;
            border-radius: 50px;
        }

        header table {
            background: linear-gradient(to right, #FF5722, #FFEB3B);
            border: 1px solid black;
            height: 60px;
        }

        header th {
            font-size: large;
            color: black;
        }

        header th a {
            color: black;
            text-decoration: none;
        }
    </style>
</head>
<body>
<header>
        <table border="0" width="100%" height="60px" class="header-bg" style="margin: 0; padding: 0;">
            <tr style="border: 2px solid black; font-size: large; color: black;">
                <th><a href="about_us1.html">About Us</a></th>
                <th><a href="farmer_homepage.php">Home</a></th>
                <th style="padding: 10px; text-align: center; font-size: 24px;">Local Harvest: Fresh and Healthy</th>
                <th><a href="account1.php">My Account</a></th>
                <th><a href="login1.html">Log Out</a></th>
            </tr>
        </table>
    </header>

    <div id="add">
        <h2>Manage Orders</h2>
        <?php
        // Database connection
        $conn = mysqli_connect("localhost", "root", "", "customer");

        if ($conn)
        {
            if (isset($_POST['update_status'])) {
                $orderId = $_POST['order_id'];
                $newStatus = $_POST['status'];
                $updateQuery = "UPDATE `order` SET status='$newStatus' WHERE id='$orderId'";
                mysqli_query($conn, $updateQuery);
                echo "<script>alert('Status updated successfully!');</script>";
            }

            $q1 = "SELECT * FROM `order`";
            $r1 = mysqli_query($conn, $q1);

            if (mysqli_num_rows($r1) > 0) {
                echo "<form method='POST'>";
                echo "<table>";
                echo "<thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Current Status</th>
                            <th>Modify Status</th>
                            <th>Action</th>
                        </tr>
                      </thead>";
                echo "<tbody>";

                while ($row = mysqli_fetch_array($r1)) {
                    echo "<tr>
                            <td>" . $row['c_fn'] . "</td>
                            <td>" . $row['c_ln'] . "</td>
                            <td>" . $row['c_address'] . "</td>
                            <td>" . $row['c_email'] . "</td>
                            <td>" . $row['pname'] . "</td>
                            <td>" . $row['quantity'] . "</td>
                            <td>" . $row['price'] . "</td>
                            <td>" . $row['status'] ."</td>
                            <td>
                                <select name='status'>
                                    <option " . ($row['status'] == 'Delivered' ? 'selected' : '') . ">Delivered</option>
                                    <option " . ($row['status'] == 'Not Delivered' ? 'selected' : '') . ">Not Delivered</option>
                                    <option " . ($row['status'] == 'Cancel' ? 'selected' : '') . ">Cancel</option>
                                </select>
                            </td>
                            <td>
                                <input type='hidden' name='order_id' value='" . $row['id'] . "'>
                                <button type='submit' name='update_status' id='btn_update'>Update</button>
                            </td>
                          </tr>";
                }

                echo "</tbody>";
                echo "</table>";
                echo "</form>";
            } else {
                echo "<p>No orders found.</p>";
            }
        } else {
            echo "<p>Connection failed!</p>";
        }
        ?>
    </div>

    <footer>
        <p>&copy; 2024 Local Harvest. All Rights Reserved.</p>
    </footer>
</body>
</html>
