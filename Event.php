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
    <title>Gallery Cafe</title>
<link rel="stylesheet" href="Homepage.css">
    
    <style>

        body {
            font-family: 'Nunito Sans', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-image: url(./img/istockphoto-174815179-612x612.jpg) ;
            
        }

        .logo {
            font-size: 50px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
            color: #60480d;
            bottom: 180px;
        }
        .dashboard {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .dashboard-banner {
            position: relative;
            width: 100%;
            height: 300px;
            overflow: hidden;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .dashboard-banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .banner-promo {
            position: absolute;
            bottom: 80px;
            left: 450px;
            background: rgba(0, 0, 0, 0.5);
            padding: 10px 20px;
            border-radius: 5px;
        }

        .banner-promo h1 {
            color: #f9d77e;
            font-size: 40px;
            margin: 0;
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
            padding: 60px 20px;
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
            padding: 0px;
            border-radius: 80px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            margin: 20px auto;
            max-width: 600px;       
        }
    
        .about img, .offers img {
            width: 50%;
            height: auto;
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

<section id="Home">
         <nav>
        <div class="logo">The Gallery Cafe</div>
        <ul>
            <li><a href="Homepage.php">Home</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="Event.php">Events</a></li>
        </ul>
        <div class="nav-buttons">
            <a href="./reservation.php" class="button">Reservation</a>
            <a href="index.php" class="button login-button"><i class="fa fa-sign-in"></i> Login</a>
        </div>
    </nav>
  
    <h3 class="logo"> The Gallery Cafe </h3>
    <!--main dashboard-->
    <div class="dashboard">
        <div class="dashboard-banner">
            <img src="./img/photo-1495474472287-4d71bcdd2085.avif">
            <div class="banner-promo">
                <h1><span> Gallery Cafe Events </span></h1>
            </div>
        </div>

    <section class="section about">
        <h2>Stand-Up Comedy, Fun Cafe Events</h2>
        <img src="./img/stand-up-comedian.jpg" alt="Restaurant Interior"> 
        <p>Enjoy a night of laughter with local jokesters. Grab a mic,
         sign up, and share your best jokes. Spread the word and bring
         friends for a fun-filled evening. Don’t miss our hilarious beverages and joke-themed snacks!</p>
    </section>

    <section class="section about">
        <h2>Attract Customers with Quirky Eats!</h2>
        <img src="./img/image58-1.jpg" alt="Restaurant Interior"> 
        <p> offering unique food items like Freakshakes and cronuts.
         Experiment with rainbow versions of your menu, flavors like mint or bacon,
         and enhance your drinks with sweets, cakes, and biscuits. These creative options
         are sure to draw in curious customers!</p>
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

    </section>

</body>
</html>
