<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "gallerycafe";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    echo "Failed to connect!";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user details from the form
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $mobile = $_POST["mobile_No"];
    $email = $_POST["Email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate password and confirm password match
    $confirmPassword = $_POST["confirmPassword"];
    if ($password !== $confirmPassword) {
        echo "Password and Confirm Password do not match. Please go back and try again.";
        exit();
    } else {
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile_No']);
        $email = mysqli_real_escape_string($conn, $_POST['Email']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "INSERT INTO staff_details (staff_fName, staff_lName, staffEmail, staffMobile, username, pass)
    VALUES ('$fname', '$lname', '$mobile', '$email', '$username', '$password')";


if (mysqli_query($conn, $sql)) {
    // Display a success message using JavaScript alert
    echo "<script>alert('Account Created Successfully');</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
}

mysqli_close($conn);

// Redirect to the HTML page after processing the form
header("Location: http://localhost/Gallerycafe/Admin/staff_details.php");
exit();
?>