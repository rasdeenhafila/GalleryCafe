<?php
// Database configuration
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Create connection
$conn = new mysqli('localhost','root','root','gallerycafe');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $day = $_POST['days'];
    $hour = $_POST['hours'];
    $table_number = $_POST['tables'];
    $full_name = $_POST['full_name'];
    $phone_number = $_POST['phone_number'];
    $num_persons = $_POST['num_persons'];

    // Check for duplicates
    $stmt = $conn->prepare("SELECT * FROM reservation WHERE day = ? AND hour = ? AND table_number = ?");
    $stmt->bind_param("ssi", $day, $hour, $table_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Insert data into database
        $stmt = $conn->prepare("INSERT INTO reservation (day, hour, table_number, full_name, phone_number, num_persons) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssissi", $day, $hour, $table_number, $full_name, $phone_number, $num_persons);
        
        if ($stmt->execute()) {
            echo "Reservation successful!";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "This table is already booked for the selected time.";
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>THE GALLERY CAFE</title>
    <link rel="stylesheet" type="text/css" href="R.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
<section id="Home">
    <section class="banner">
        <h2>BOOK YOUR TABLE NOW</h2>
        <div class="card-container">
            <div class="card-img">
                <!-- image here -->
            </div>
            <div class="card-content">
                <h3>Reservation</h3>
                <form id="reservation-form" method="post" action="Reservation.php">
                    <div class="form-row">
                        <select name="days">
                            <option value="day-select">Select Day</option>
                            <option value="sunday">Sunday</option>
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                            <option value="saturday">Saturday</option>
                        </select>
                        <select name="hours">
                            <option value="hour-select">Select Hour</option>
                            <option value="10">10:00</option>
                            <option value="12">12:00</option>
                            <option value="14">14:00</option>
                            <option value="16">16:00</option>
                            <option value="18">18:00</option>
                            <option value="20">20:00</option>
                            <option value="22">22:00</option>
                        </select>
                        <select name="tables">
                            <option value="table-select">Select Table</option>
                            <option value="1">No.1</option>
                            <option value="2">No.2</option>
                            <option value="3">No.3</option>
                            <option value="4">No.4</option>
                            <option value="5">No.5</option>
                            <option value="6">No.6</option>
                            <option value="7">No.7</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <input type="text" name="full_name" placeholder="Full Name" required>
                        <input type="text" name="phone_number" placeholder="Phone Number" required>
                    </div>
                    <div class="form-row">
                        <input type="number" name="num_persons" placeholder="How Many Persons?" min="1" required>
                        <input type="submit" value="BOOK TABLE">
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>
<!-- Account Check Modal -->
<div id="account-check-modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('account-check-modal')">&times;</span>
        <div class="account-check-form">
            <p>Do you have an account?</p>
            <button onclick="redirectTo('index.php')">Yes</button>
            <button onclick="redirectTo('register.php')">No</button>
        </div>
    </div>
</div>
</body>
<script>
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = "none";
    }

    function redirectTo(page) {
        window.location.href = page;
    }

    // To show the modal (for demonstration)
    window.onload = function() {
        document.getElementById('account-check-modal').style.display = "block";
    };
</script>
</body>
</html>