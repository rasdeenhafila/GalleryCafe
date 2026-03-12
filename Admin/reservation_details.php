<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Data</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function confirmDelete(reservationId) {
            var result = confirm("Are you sure you want to delete this reservation?");
            if (result) {
                window.location.href = "?action=delete&reservation_id=" + encodeURIComponent(reservationId);
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
                <li><a href="#">Reservations</a></li>
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
                <th>ID</th>
                <th>Day</th>
                <th>Hour</th>
                <th>Table Number</th>
                <th>Full Name</th>
                <th>Phone Number</th>
                <th>Number of Persons</th>
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
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && isset($_GET['reservation_id'])) {
                $action = $_GET['action'];
                $reservation_id = $_GET['reservation_id'];

                if ($action == 'delete') {
                    // Perform the deletion operation based on the reservation_id
                    $stmt = $conn->prepare("DELETE FROM reservation WHERE id = ?");
                    $stmt->bind_param("i", $reservation_id);
                    $stmt->execute();

                    if ($stmt->affected_rows > 0) {
                        echo "<p>Reservation deleted successfully.</p>";
                    } else {
                        echo "<p>Error deleting record: " . $conn->error . "</p>";
                    }

                    $stmt->close();
                }
            }

            $sql = "SELECT * FROM reservation";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row["id"]) . "</td>
                            <td>" . htmlspecialchars($row["day"]) . "</td>
                            <td>" . htmlspecialchars($row["hour"]) . "</td>
                            <td>" . htmlspecialchars($row["table_number"]) . "</td>
                            <td>" . htmlspecialchars($row["full_name"]) . "</td>
                            <td>" . htmlspecialchars($row["phone_number"]) . "</td>
                            <td>" . htmlspecialchars($row["num_persons"]) . "</td>
                            <td>
                                <div class='btn2'>
                                    <a href='javascript:confirmDelete(" . htmlspecialchars($row["id"]) . ")'>Delete</a>
                                </div>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No reservations found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <div class="insert">
        <a href="http://localhost/Gallerycafe/reservation.php">MAKE RESERVATION</a>
    </div>
</body>
</html>
