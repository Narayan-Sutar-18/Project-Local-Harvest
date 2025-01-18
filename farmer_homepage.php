<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Page (Farmers)</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        button {
            background-color: blue;
            color: aliceblue;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            width: 100%; 
        }
        button:hover {
            background-color: darkblue;
        }
        .button {
            display: inline-block; 
            background-color: blue; 
            color: aliceblue; 
            padding: 10px 20px; 
            border: none;
            border-radius: 5px;
            text-decoration: none; 
            width: 100%; 
        }
        .button:hover {
            background-color: darkblue; 
        }
        #button {
            display: inline-block; 
            background-color: blue; 
            color: aliceblue; 
            padding: 10px 20px; 
            border: none;
            border-radius: 5px;
            text-decoration: none; 
            width: 150px;
            height: 35px;
        }
        #button:hover {
            background-color: darkblue; 
        }
        input {
            width: 400px;
            padding: 5px;
        }
        .tc {
            background-color: blue;
            color: white;
            margin-left: 65px;
        }
        .main-container {
            display: flex;
        }
        .sidebar {
            width: 25%;
            background-color: greenyellow;
            border: 2px solid black;
            padding: 10px;
            box-sizing: border-box;
        }
        .products {
            width: 75%;
            padding: 10px;
            box-sizing: border-box;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr); /* 5 products per row */
            gap: 20px;
            
        }
        .product-item {
            text-align: center;
            border: 2px solid black;
        }
        .products img {
            width: 100%;
            height: 150px; 
            object-fit: cover; 
            padding: 5px;
        }
        footer {
            clear: both;
            margin-top: 20px;
            background-color: lightgray;
            text-align: center;
            padding: 15px 0;
            font-size: 16px;
        }
        h2 {
            font-size: 24px;
            margin-bottom: 15px;
        }
        h3 {
            font-size: 20px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <table border="1px" width="100%" height="60px" class="header-bg" style="background: linear-gradient(to right, #FF5722, #FFEB3B);">
            <tr style="border: 2px solid black; font-size: large; color: black;">
                <th style="padding: 10px; text-align: left; font-size: 24px;">Local Harvest: Fresh and Healthy</th>
                <th style="text-align: center;">
                    <div style="display: flex; align-items: center;">
                        <input type="search" placeholder="Search here" autofocus style="padding: 5px; border-radius: 5px; width: 350px;">
                        <button id="search-button" style="margin-left: 5px; width:100px">Search</button>
                    </div>
                </th>
                <th><a href="about_us1.html" style="color: black; text-decoration: none;">About Us</a></th>
                <th><a href="account1.php" style="color: black; text-decoration: none;">My Account</a></th>
                <th><a href="login1.html" style="color: black; text-decoration: none;">Log Out</a></th>  
            </tr>  
        </table>
    </header>
    <div class="main-container">
        <div class="sidebar">
            <h2>Product Options</h2>
            <h3><a href="add_product.html" class="button">Add Product</a></h3>
            <h3><a href="modify_product.php" class="button">Modify Product</a></h3>
            <h3><a href="remove_product.php" class="button">Remove Product</a></h3>
            <h3><a href="view_orders.php" class="button">Manage Orders</a></h3>
            <div class="bordered" style="background-color: orange; width: 90%; height: 130px; margin: 14px; border-style: dashed;">
                <p style="background-color: blue; color: white;">Follow us on:</p>
                <ol>
                    <li><a href="https://www.instagram.com" target="_blank">Instagram</a></li>
                    <li><a href="https://www.facebook.com" target="_blank">Facebook</a></li>
                    <li><a href="https://www.twitter.com" target="_blank">Twitter</a></li>
                </ol>
            </div>
            <p style="background-color: blue; color: white;">Source Images from: <a href="https://www.google.com" target="_blank">Click Here</a></p>
            <p class="tc">Read T&C: <a href="Terms and Conditions.pdf" target="_blank">Click Here</a></p>
        </div>

        <div class="products">
            <fieldset style="border: 1px solid; font-family: Arial, Helvetica, sans-serif;">
                <h2>All Products:</h2>
                <div class="product-grid">
    <?php
    $conn = mysqli_connect("localhost", "root", "", "farmer");
    $q1 = "SELECT sr_no, image, pname, price FROM add_product"; // Make sure to select the product ID
    $r1 = mysqli_query($conn, $q1);

    if ( mysqli_num_rows($r1) > 0)
    {
        while ($row = mysqli_fetch_array($r1)) {
            echo "
            <div class='product-item'>
                <img src='uploads/" . $row['image'] . "' alt='" . $row['pname'] . "' title='" . $row['pname'] . "'>
                <figcaption>" . $row['pname'] . "</figcaption>
                <p style='color:green;'><b>Price: " . $row['price'] . " /-</b></p>
                <p><a href='view_product.php?id=" . $row['sr_no'] . "' id='button'>View Product</a></p>
            </div>
            ";
        }
    } else {
        echo "<p style='color: red; text-align: center;'>No products found or something went wrong.</p>";
    }
    mysqli_close($conn);
    ?>
</div>

            </fieldset>
        </div>
    </div>
    <footer style="background-color: blue;">
        <p>&copy; 2024 Local Harvest. All Rights Reserved.</p>
    </footer>
</body>
</html>
