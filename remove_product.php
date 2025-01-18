<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "farmer");

if (isset($_GET['delete_id'])) 
{
    $id = $_GET['delete_id'];

    // Delete the product with the given id
    $q2 = "DELETE FROM add_product WHERE sr_no = '$id'";
    $r2 = mysqli_query($conn, $q2);

    if ($r2) 
    {
        echo "<script>alert('Product deleted successfully');</script>";
    } 
    else 
    {
        echo "<script>alert('Error deleting product');</script>";
    }
}

// Fetch products
$q1 = "SELECT * FROM add_product";
$r1 = mysqli_query($conn, $q1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Product</title>
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
                <th><a href="about_us1.html">About Us</a></th>
                <th><a href="farmer_homepage.php">Home</a></th>
                <th style="padding: 10px; text-align: center; font-size: 24px;">Local Harvest: Fresh and Healthy</th>
                <th><a href="account1.php">My Account</a></th>
                <th><a href="login1.html">Log Out</a></th>
            </tr>
        </table>
    </header>

    <div id="add">
        <h2>Remove Product</h2><br>
        
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Expiry Date</th>
                    <th>Price</th>
                    <th>Unit</th>
                    <th>Storage</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (mysqli_num_rows($r1) > 0) {
                    while ($row = mysqli_fetch_array($r1)) 
                    {
                        echo "<tr>
                            <td>" . $row['pname'] . "</td>
                            <td>" . $row['category'] . "</td>
                            <td>" . $row['edate'] . "</td>
                            <td>" . $row['price'] . " /-rs</td>
                            <td>" . $row['unit'] ."</td>
                            <td>" . $row['storage'] ."</td>
                            <td><img src='uploads/" . $row['image'] . "' alt='Product Image'></td>
                            <td><a href='?delete_id=" . $row['sr_no'] . "' onclick='return confirm(\"Are you sure you want to delete this product?\");'>Delete</a></td>
                        </tr>";
                    }
                } 
                else 
                {
                    echo "<tr><td colspan='6'>No products found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; 2024 Local Harvest. All Rights Reserved.</p>
    </footer>
</body>
</html>

<?php
// Close the connection
mysqli_close($conn);
?>
