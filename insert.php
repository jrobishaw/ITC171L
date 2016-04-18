<?php
// Attempt MySQL server connection.
$dbcon = mysqli_connect("localhost", "root", "jeremy", "sales");

// Check connection
if($dbcon === false)
    {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

// Escape user inputs for security
$first_name = mysqli_real_escape_string($dbcon, $_POST['firstname']);
$last_name = mysqli_real_escape_string($dbcon, $_POST['lastname']);
$email_address = mysqli_real_escape_string($dbcon, $_POST['email']);
$phone_number = mysqli_real_escape_string($dbcon, $_POST['phone']);

// Attempt insert query execution
$sql = "INSERT INTO contact_info (first_name, last_name, email_address, phone_number) VALUES ('$first_name', '$last_name', '$email_address', '$phone_number')";
if(mysqli_query($dbcon, $sql))
    {
        echo "Records added successfully. We will be in contact soon. Thank you!";
    } 
else
    {
        echo "ERROR: Could not excecute $sql. " . mysqli_error($dbcon);
    }

// Close connection
mysqli_close($dbcon);
?>
