<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Data</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function confirmDelete(foodId) {
            var result = confirm("Are you sure you want to delete this food?");
            if (result) {
                window.location.href = "?action=delete&food_id=" + encodeURIComponent(foodId);
            }
        }
    </script>
</head>

<body>
    <header class="header">
        <div class="nav-bar">
            <h1 class="title">The Gallery Cafe</h1>
            <ul class="nav-items">
                <li><a href="#">Food Menu</a></li>
                <li><a href="http://localhost/Gallerycafe/Admin/reservation_details.php">Reservations</a></li>
                <li><a href="http://localhost/Gallerycafe/Admin/staff_details.php">Staff</a></li>
                <li><a href="http://localhost/Gallerycafe/Admin/customer_details.php">Customers</a></li>
                <a href="https://docs.google.com/forms/d/1A67SWiv5Jx5bs_rZ25sMnQ5JIUyj4ZeyuIYag4-MKhI/edit#responses"><li>Feedback</li></a><br>
                <li>
                    <a href="http://localhost/Gallerycafe/Homepage.php">Logout</a>
                </li>
            </ul>
        </div>
    </header>

    <table>
        <thead>
            <tr>
                <th>Food Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
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

            // Check if the deletion action is triggered
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && isset($_GET['food_id'])) {
                $action = $_GET['action'];
                $food_id = $_GET['food_id'];

                if ($action == 'delete') {
                    // Perform the deletion operation based on the food_id
                    $stmt = $conn->prepare("DELETE FROM menu_items WHERE id = ?");
                    $stmt->bind_param("i", $food_id);
                    $stmt->execute();

                    if ($stmt->affected_rows > 0) {
                        echo "<p>Item deleted successfully.</p>";
                    } else {
                        echo "<p>Error deleting record: " . $conn->error . "</p>";
                    }

                    $stmt->close();
                }
            }

            $sql = "SELECT * FROM menu_items";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row["name"]) . "</td>
                            <td>LKR " . number_format($row["price"], 2) . "</td>
                            <td><img src='Admin/uploads/" . htmlspecialchars($row["image"]) . "' alt='" . htmlspecialchars($row["name"]) . "' style='width:100px;'></td>
                            <td>
                                <a href='javascript:confirmDelete(" . $row["id"] . ")'>Delete</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No items found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <div class="insert">
        <a href="newFood.html">NEW FOOD</a>
    </div>
</body>
</html>
