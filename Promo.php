<?php
include 'bkHomepage.php';

$nameErr = $emailErr = $messageErr = "";
$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate form data
    if (empty($name)) {
        $nameErr = "Name is required";
    }
    if (empty($email)) {
        $emailErr = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }
    if (empty($message)) {
        $messageErr = "Message is required";
    }

    // If no errors, proceed with database insertion
    if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        // Execute the query
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Promotion</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }
        header {
            background: url(./img/BRAVEN-OB-EDM-2019-343.jpg) no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 120px 20px;
            position: relative;
            height: 500px;
            overflow: hidden;
        }
        .header-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }
        .header-content h1 {
            font-size: 4em;
            margin: 0;
            animation: fadeIn 3s ease-in-out;
        }
        .header-content p {
            font-size: 1.8em;
            margin: 20px 0;
            animation: fadeIn 3s ease-in-out;
        }
        .cta-button {
            background-color: #e67e22;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 25px;
            font-size: 1.2em;
            display: inline-block;
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .cta-button:hover {
            background-color: #d35400;
            transform: scale(1.05);
        }
        .section {
            padding: 40px 20px;
            text-align: center;
        }
        .section h2 {
            font-size: 2.8em;
            margin-bottom: 20px;
            color: #e67e22;
            animation: slideIn 1s ease-out;
        }
        .about, .offers {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            margin: 20px auto;
            max-width: 900px;
        }
        .about img, .offers img {
            width: 20%;
            height: auto;
            max-width: 250px;
            border-radius: 10px;
            margin-bottom: 20px;
            animation: fadeIn 2s ease-in-out;
        }
        .offers {
            background: #f9f9f9;
        }
        .contact-form {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            margin: 20px auto;
            max-width: 600px;
        }
        .contact-form input, .contact-form textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .contact-form button {
            background-color: #e67e22;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .contact-form button:hover {
            background-color: #d35400;
            transform: scale(1.05);
        }
        .error { color: #FF0000; }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<header>
    <div class="header-content">
        <h1>Exclusive Weekend Feast!</h1>
        <p>Enjoy a complimentary dessert with every meal. Book your table today!</p>
        <a href="Reservation.php" class="cta-button">Reserve Your Table</a>
    </div>
</header>


    <section class="section about">
        <h2>About Us</h2>
        <img src="./img/1-1.png" alt="Restaurant Interior"> 
        <p>At our restaurant, we pride ourselves on delivering an unforgettable dining experience. Our menu features fresh, locally sourced ingredients prepared with a creative twist.</p>
    </section>

    <section class="section offers">
        <h2>Offer Buy-One-Get-One-Free Deals</h2>
        <img src="./img/buy-1.png" alt="Offer 1"> 
        <p>Buy a coffee and get one of equal or lesser value for free for a friend!</p>
    </section>

    <section class="section contact-form">
        <h2>Contact Us</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <span class="error"><?php echo $nameErr; ?></span>
            <input type="email" name="email" placeholder="Your Email" required>
            <span class="error"><?php echo $emailErr; ?></span>
            <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
            <span class="error"><?php echo $messageErr; ?></span>
            <button type="submit">Send Message</button>
        </form>
    </section>

</body>
</html>