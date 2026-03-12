<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Data</title>
    <link rel="stylesheet" href="staffDashboard.css">
    <link rel="stylesheet" href="manage.css">
</head>

<body>
    <header class="header">
        <div class="nav-bar">
          <h1 class="title"><span>The Gallery Cafe </h1>
          <ul class="nav-items">
            <li><a href="http://localhost/Gallerycafe/Staff/menu_data.php">Menu</a></li>
            <li><a href="#">Reservations</a></li>
            <a href="https://docs.google.com/forms/d/1A67SWiv5Jx5bs_rZ25sMnQ5JIUyj4ZeyuIYag4-MKhI/edit#responses"><li>Feedback</li></a><br>
            <li><a href="http://localhost/Gallerycafe/Homepage.php">Logout</a></li>
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
            </tr>
        </thead>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "galleryCafe";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (mysqli_connect_errno()) {
            echo "Failed to connect!";
            exit();
        }

        $sql = "SELECT * from reservation";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["day"] . "</td>
                        <td>" . $row["hour"] . "</td>
                        <td>" . $row["table_number"] . "</td>
                        <td>" . $row["full_name"] . "</td>
                        <td>" . $row["phone_number"] . "</td>
                        <td>" . $row["num_persons"] . "</td>
                    </tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "";
        }

        $conn->close();
        ?>

</body>
</html>