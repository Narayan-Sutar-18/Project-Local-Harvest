<?php

  if(isset($_POST['submit']))
  {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $edate = $_POST['edate'];
    $price = $_POST['price'];
    $store = $_POST["storage"];
    $i=0;
    $unit = $_POST["unit"];
        
    foreach($store as $i)
    {
        $all_storage = $all_storage." ".$i;
    }
    
    $file_name = $_FILES['photo']['name'];
    $tempname = $_FILES['photo']['tmp_name'];
    $folder = 'uploads/'.$file_name;

    $conn = mysqli_connect("localhost","root","","farmer");

    $q1 = "insert into add_product (pname,category,edate,price,unit,storage,image) values ('$name','$category', '$edate', '$price' ,'$unit','$all_storage', '$file_name')";
    $r1 = mysqli_query($conn,$q1);
    
    move_uploaded_file($tempname,$folder);

    header("Location: add_product.html");
    exit();

    mysqli_close($conn);
  }
 



?>