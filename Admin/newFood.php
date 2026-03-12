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
    $category = $conn->real_escape_string($_POST["category"]);
    $name = $conn->real_escape_string($_POST["name"]);
    $price = $conn->real_escape_string($_POST["price"]);

    // Handle image upload (store image in a folder and save the path in the database)
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $targetDir = __DIR__ . "/uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Save food details in the database
            $sql = "INSERT INTO menu_items (category, name, price, image) 
                    VALUES ('$category', '$name', '$price', '" . basename($_FILES["image"]["name"]) . "')";

            if ($conn->query($sql) === TRUE) {
                // Redirect to the menu page after adding the food
                header("Location:http://localhost/Gallerycafe/Admin/food_menu.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Failed to move uploaded file.";
        }
    } else {
        echo "No file uploaded or an error occurred during upload.";
    }
}

$conn->close();
?>
