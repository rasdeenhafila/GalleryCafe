<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
/* Container styling */
.container {
    width: 100%;
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    border-radius: 15px;
    text-align: center;
    font-family: 'Arial', sans-serif;
}

/* Box styling */
.box {
    list-style: none;
    padding: 15px;
    background: rgba(0, 0, 0, 0.6); 
    backdrop-filter: blur(15px); 
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); 
    border-radius: 12px; 
    color: white;
}

/* List item styling */
.box ul {
    padding: 0;
    margin: 0;
}

.box ul li {
    margin: 15px 0;
    padding: 10px;
    background: rgba(255, 255, 255, 0.1); 
    border-radius: 5px;
    transition: background 0.3s ease, transform 0.3s ease; 
}

/* Anchor tag styling */
.box ul a {
    text-decoration: none;
    color: #fff;
    display: block;
}

.box ul li:hover {
    background: rgba(255, 255, 255, 0.2); 
    transform: scale(1.05); 
}

/* Button styling */
button {
    margin-top: 20px;
    padding: 12px 24px;
    background-color: #a15132;
    border: none;
    border-radius: 5px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transitions */
}

button a {
    color: #fff;
    text-decoration: none;
}

button:hover {
    background-color: #ca7656;
    transform: scale(1.05); /* Slightly scale up on hover */
}

</style>

<body>
    <header class="header">
        <div class="nav-bar">
          <h1 class="title"><span>The Gallery Cafe</h1>
        </div>
    </header>

    <div class="container">
        <div class="box">
            <ul>
                <a href="http://localhost/Gallerycafe/Admin/food_menu.php"><li>FOOD MENU</li></a><br>
                <a href="http://localhost/Gallerycafe/Admin/reservation_details.php"><li>RESERVATIONS</li></a><br>
                <a href="http://localhost/Gallerycafe/Admin/staff_details.php"><li>STAFF</li></a><br>
                <a href="http://localhost/Gallerycafe/Admin/customer_details.php"><li>CUSTOMERS</li></a><br>
                <a href="https://docs.google.com/forms/d/1A67SWiv5Jx5bs_rZ25sMnQ5JIUyj4ZeyuIYag4-MKhI/edit#responses"><li>Feedback</li></a><br>
                <button>
                  <a href="http://localhost/Gallerycafe/Homepage.php">Logout</a>
                </button>
            </ul>
        </div>
    </div>   
</body>
</html>