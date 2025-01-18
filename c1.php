<?php
$conn = mysqli_connect("localhost", "root", "", "customer");

// Check connection
if ($conn) 
{
    echo "connected";
}
else
{
    echo "Not connected"."<br>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

   
    $ql = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";
    $r1 = mysqli_query($conn,$q1);
    if ($r1) 
    {
        echo "Thank you for contacting us!";
    } 
    else 
    {
        echo "Error: " . $conn->error;
    }
}

// Close the connection
mysqli_close($conn);
?>
