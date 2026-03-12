<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="header">
        <div class="nav-bar">
            <h1 class="title">The Gallery Cafe</h1>
            <ul class="nav-items">
                <li><a href="http://localhost/Gallerycafe/Admin/food_menu.php">Food Menu</a></li>
                <li><a href="http://localhost/Gallerycafe/Admin/reservation_details.php">Reservations</a></li>
                <li><a href="#">Staff</a></li>
                <li><a href="http://localhost/Gallerycafe/Admin/customer_details.php">Customers</a></li>
                <a href="https://docs.google.com/forms/d/1A67SWiv5Jx5bs_rZ25sMnQ5JIUyj4ZeyuIYag4-MKhI/edit#responses"><li>Feedback</li></a><br>
                <li><a href="http://localhost/Gallerycafe/Homepage.php">Logout</a></li>
            </ul>
        </div>

        <script>
            function confirmDelete(staffId) {
                var result = confirm("Are you sure you want to remove this staff?");
                if (result) {
                    window.location.href = "?action=delete&staff_id=" + staffId;
                }
            }
        </script>
    </header>

    <table>
        <thead>
            <tr>
                <th>Staff ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Username</th>
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
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && isset($_GET['staff_id'])) {
                $action = $_GET['action'];
                $staff_id = $_GET['staff_id'];

                if ($action == 'delete') {
                    // Perform the deletion operation based on the staff_id
                    $deleteSql = "DELETE FROM staff_details WHERE staffID = $staff_id";
                    $result = $conn->query($deleteSql);

                    if ($result) {
                        echo "<p>Staff record deleted successfully.</p>";
                    } else {
                        echo "Error deleting record: " . $conn->error;
                    }
                }
            }

            $sql = "SELECT * FROM staff_details";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row["staffID"]) . "</td>
                            <td>" . htmlspecialchars($row["staff_fName"]) . "</td>
                            <td>" . htmlspecialchars($row["staff_lName"]) . "</td>
                            <td>" . htmlspecialchars($row["staffEmail"]) . "</td>
                            <td>" . htmlspecialchars($row["staffMobile"]) . "</td>
                            <td>" . htmlspecialchars($row["username"]) . "</td>
                            <td>" . htmlspecialchars($row["pass"]) . "</td>
                            <td>
                                <div class='btn2'>
                                    <a href='javascript:confirmDelete(" . $row["staffID"] . ")'>Delete</a>
                                </div>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No staff records found.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <div class="insert">
        <a href="newStaff.html">NEW ACCOUNT</a>
    </div>
</body>
</html>
