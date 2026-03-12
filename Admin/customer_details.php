<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Data</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function confirmDelete(username) {
            var result = confirm("Are you sure you want to remove this customer?");
            if (result) {
                window.location.href = "?action=delete&username=" + encodeURIComponent(username);
            }
        }
    </script>
</head>

<body>
    <header class="header">
        <div class="nav-bar">
            <h1 class="title">The Gallery Cafe</h1>
            <ul class="nav-items">
                <li><a href="http://localhost/Gallerycafe/Admin/food_menu.php">Food Menu</a></li>
                <li><a href="http://localhost/Gallerycafe/Admin/reservation_details.php">Reservations</a></li>
                <li><a href="http://localhost/Gallerycafe/Admin/staff_details.php">Staff</a></li>
                <li><a href="#">Customers</a></li>
                <a href="https://docs.google.com/forms/d/1A67SWiv5Jx5bs_rZ25sMnQ5JIUyj4ZeyuIYag4-MKhI/edit#responses"><li>Feedback</li></a><br>
                <li><a href="http://localhost/Gallerycafe/Homepage.php">Logout</a></li>
            </ul>
        </div>
    </header>

    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Age</th>
                <th>Password</th>
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
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && isset($_GET['username'])) {
                $action = $_GET['action'];
                $username = $_GET['username'];

                if ($action == 'delete') {
                    // Perform the deletion operation based on the username
                    $stmt = $conn->prepare("DELETE FROM users WHERE Username = ?");
                    $stmt->bind_param("s", $username);
                    $stmt->execute();

                    if ($stmt->affected_rows > 0) {
                        echo "<p>Customer deleted successfully.</p>";
                    } else {
                        echo "<p>Error deleting record: " . $conn->error . "</p>";
                    }

                    $stmt->close();
                }
            }

            // Query to select only customers based on user_type
            $sql = "SELECT * FROM users WHERE user_type = 'customer'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row["Username"]) . "</td>
                            <td>" . htmlspecialchars($row["Email"]) . "</td>
                            <td>" . htmlspecialchars($row["Age"]) . "</td>
                            <td>" . htmlspecialchars($row["Password"]) . "</td>
                            <td>
                                <div class='btn2'>
                                    <a href='javascript:confirmDelete(\"" . htmlspecialchars($row["Username"]) . "\")'>Delete</a>
                                </div>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No customers found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <div class="insert">
        <a href="newUser.html">NEW ACCOUNT</a>
    </div>
</body>
</html>
