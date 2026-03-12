<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "gallerycafe";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Failed to connect: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user details from the form
    $username = $_POST["username"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if ($password !== $confirmPassword) {
        echo "Password and Confirm Password do not match. Please go back and try again.";
        exit();
    } else {
        // Sanitize the input
        $username = mysqli_real_escape_string($conn, $username);
        $email = mysqli_real_escape_string($conn, $email);
        $age = mysqli_real_escape_string($conn, $age);
        $password = mysqli_real_escape_string($conn, $password);

        // Set user type to 'customer'
        $userType = 'customer';

        $sql = "INSERT INTO users (username, Email, Age, password, user_type)
                VALUES ('$username', '$email', '$age', '$password', '$userType')";

        if (mysqli_query($conn, $sql)) {
            // Display a success message using JavaScript alert
            echo "<script>alert('Account Created Successfully');</script>";
            // Redirect to the HTML page after processing the form
            echo "<script>window.location.href = 'http://localhost/Gallerycafe/Admin/customer_details.php';</script>";
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>
