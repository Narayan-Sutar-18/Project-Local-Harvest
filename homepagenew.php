<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Page (Customer)</title>
    <link rel="stylesheet" href="styles.css"> 
    <style>
        button {
            background-color: blue;
            color: aliceblue;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: darkblue;
        }

        input {
            width: 400px;
            padding: 5px;
        }

        .Prod_table {
            background-color: lightcyan;
        }

        .disc_table {
            background-color: lightseagreen;
        }

        .tc {
            background-color: blue;
            color: white;
            margin-left: 65px;
        }

        .tab {
            display: inline-block;
            padding: 10px;
            border-radius: 5px;
        }

        .main-container {
            display: flex;
        }

        .categories {
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

        .products table {
            width: 100%;
            border-collapse: collapse;
        }

        .products td {
            border: 2px solid black;
            text-align: center;
            vertical-align: top;
            padding: 10px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr); /* 5 products per row */
            gap: 20px;
        }

        .product-item {
            text-align: center;
            border: 2px solid black;
            padding: 10px;
        }

        .products img {
            width: 210px; 
            height: 150px; 
            object-fit: cover; 
        }

        footer {
            clear: both;
            margin-top: 20px;
            background-color: blue;
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

        .button {
            display: inline-block;
            background-color: blue;
            color: aliceblue;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none; /* Remove underline from links */
        }

        .button:hover {
            background-color: darkblue;
        }

        
    </style>
</head>
<body>
<header>
    <table border="1px" width="100%" height="60px" class="header-bg" style="background: linear-gradient(to right, #FF5722, #FFEB3B);">
        <tr style="border: 2px solid black; font-size: large; color: black;">
            <th style="padding: 10px; text-align: left; font-size: 24px;">Local Harvest: Fresh and Healthy</th>
            <th style="text-align: center;">
                <input type="search" placeholder="Search here" autofocus style="padding: 5px; border-radius: 5px;">
                <button id="search-button">Search</button>
            </th>
            <th><a href="about_us.html" style="color: black; text-decoration: none;">About Us</a></th>
            <th><a href="account.php" style="color: black; text-decoration: none;">My Account</a></th>
            <th><a href="login1.html" style="color: black; text-decoration: none;">Log Out</a></th>  
        </tr>  
    </table>
</header>

<div class="main-container">
    <div class="categories bordered">
        <h2>Categories</h2>
        <ul>
            <li><a href="#" class="tab" style="color: black; background-color: yellow;"><b>Vegetables</b></a></li><br>
            <li><a href="#" class="tab" style="color: black; background-color: yellow;"><b>Dairy Products</b></a></li><br>
            <li><a href="#" class="tab" style="color: black; background-color: yellow;"><b>Fruits</b></a></li><br>
            <li><a href="#" class="tab" style="color: black; background-color: yellow;"><b>Grains</b></a></li><br>
            <a href="about_us.html" title="Visit about us page"><img src="aboutus.png" width="250px" alt="logo"></a>
        </ul>

        <dl class="bordered" style="background-color: blue; color: aliceblue; border-radius: 10px;">
            <dt><b>Our Mission :</b></dt>
            <dd><i>Empowering farmers, connecting communities.</i></dd>
        </dl>

        <div class="bordered" style="background-color: orange; width: 90%; height: 179px; margin: 14px;">
            <table width="100%" height="90px" border="2px" class="disc_table">
                <caption>Todays Special Discounts</caption>
                <tr>
                    <th>Items</th>
                    <th>Discounts</th>
                </tr>
                <tr>
                    <td>Tomatoes</td>
                    <td rowspan="2">50%</td>
                </tr>
                <tr>
                    <td>Carrot</td>
                </tr>
                <tr>
                    <td>Dal</td>
                    <td>10%</td>
                </tr>
                <tr>
                    <td colspan="2">Milk(Not Applicable)</td>
                </tr>
            </table>
        </div><br>

        <h3><a href="contact_us.html"><button class="bordered" style="height: 50px; width: 75%; font-size: large;">Contact Us</button></a></h3>
        <h3><a href="feedback.html"><button class="bordered" style="height: 50px; width: 75%; font-size: large;">Write Feedback</button></a></h3>

        <div class="bordered" style="background-color: orange; width: 90%; height: 130px; margin: 14px; border-style: dashed;">
            <p style="background-color: blue; color: white;">Follow us on:</p>
            <ol>
                <li><a href="https://www.instagram.com" target="_blank">Instagram</a></li>
                <li><a href="https://www.facebook.com" target="_blank">Facebook</a></li>
                <li><a href="https://www.twitter.com" target="_blank">Twitter</a></li>
            </ol>
        </div>

        <p style="background-color: blue; color: white;">Source Images from :<a href="https://www.google.com" target="_blank">Click Here</a></p>
        <p class="tc">Read T&C :<a href="Terms and Conditions.pdf" target="_blank">Click Here</a></p>
    </div>

    <div class="products">
        <fieldset style="border: 1px solid; font-family: Arial, Helvetica, sans-serif;">
            <h2>My Products:</h2>
            <div class="product-grid">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "farmer");
            $q1 = "SELECT sr_no, image, pname, price FROM add_product"; 
            $r1 = mysqli_query($conn, $q1);

            if (mysqli_num_rows($r1) > 0)
            {
                while ($row = mysqli_fetch_array($r1)) {
                    echo "
                    <div class='product-item'>
                        <img src='uploads/" . $row['image'] . "' alt='" . $row['pname'] . "' title='" . $row['pname'] . "'>
                        <figcaption>" . $row['pname'] . "</figcaption>
                        <p style='color:green;'><b>Price: " . $row['price'] . " /-</b></p>
                        <p><a href='checkout.php?id=" . $row['sr_no'] . "' class='button'>Buy Now</a></p>
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

<footer>
    <p>&copy; 2024 Local Harvest. All rights reserved.</p>
</footer>
</body>
</html>
