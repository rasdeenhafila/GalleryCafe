<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Menu</title>
    <link rel="stylesheet" href="staffDashboard.css">
    <link rel="stylesheet" href="manage.css">
</head>

<body>
    <header class="header">
        <div class="nav-bar">
          <h1 class="title"><span>The Gallery Cafe</h1>
          <ul class="nav-items">
            <li><a href="#">Menu</a></li>
            <li><a href="http://localhost/Gallerycafe/Staff/reservation_data.php">Reservations</a></li>
            <a href="https://docs.google.com/forms/d/1A67SWiv5Jx5bs_rZ25sMnQ5JIUyj4ZeyuIYag4-MKhI/edit#responses"><li>Feedback</li></a><br>
            <li><a href="http://localhost/Gallerycafe/Homepage.php">Logout</a></li>
          </ul>
        </div>
    </header>

        <table>
        <thead>
            <tr>
                <th>Food Name</th>
                <th>Price</th>
                <th>Image</th>
        
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
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

            }

            $sql = "SELECT * FROM menu_items";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["price"] . "</td>
                        <td>" . $row["image"] . "</td>
                    </tr>";
                }

                echo "</tbody></table>";
            } else {
                echo " ";
            }

            $conn->close();
            ?>
      
</body>
</html>