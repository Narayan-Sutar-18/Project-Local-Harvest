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

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];

   
    $ql = "INSERT INTO feedback_form (name, email, role, rating, feedback) VALUES ('$name', '$email', '$role', '$rating', '$feedback')";
    $r1 = mysqli_query($conn,$q1);

   
    if ($r1) {
        echo "Thank you for your feedback!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the connection
mysqli_close($conn);
?>
