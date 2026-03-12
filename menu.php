<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>Coffee Shop Menu</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="Homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<section id="Home">
        <nav>
        <div class="logo">The Gallery Cafe</div>
        <ul>
            <li><a href="Homepage.php">Home</a></li>
            <li><a href="#About">About</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="Event.php">Events</a></li>
        </ul>
        <div class="nav-buttons">
            <a href="./reservation.php" class="button">Reservation</a>
            <a href="index.php" class="button login-button"><i class="fa fa-sign-in"></i> Login</a>
        </div>
    </nav>
</header> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-PL2Ec6M0qZPlKekx1T6P5RZKmIURy4IoQnMqNfOrtt15rWJKpF2N4SG9sM1joQ5NHMNJ20QLxg4lLE+Lj0U+JQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<h1>Our<span> Menu</span></h1>
<subheader>
    <div class="sub-nav">
        <ul>
            <li><a href="#spacial-items">Special items</a></li>
            <li><a href="#coffee">Coffee</a></li>
            <li><a href="#snacks">Snacks</a></li>
            <li><a href="#dessert">Dessert</a></li>
        </ul>
    </div>
</subheader>

<main>
    <!-- Special Items Section -->
    <section class="Spacial-items" id="spacial-items">
        <h2>Special items</h2>
        <div class="menu" id="Menu">
            <!-- Menu Cards -->
            <div class="menu_box">
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="./m-img/Pasta.jpg" alt="Pasta">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Pesto Pasta</h2>
                        <h3>LKR: 1320.00</h3>
                        <button class="menu_btn" onclick="addToCart('Pasta', 1320)">Order Now</button>
                    </div>
                </div>
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="./m-img/baozi-11.jpg" alt="Baozi Bun">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Baozi Bun</h2>
                        <h3>LKR: 750.00</h3>
                        <button class="menu_btn" onclick="addToCart('Baozi Bun', 750)">Order Now</button>
                    </div>
                </div>
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="./m-img/Rice-Balls.jpg" alt="Rice Balls">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Rice Balls</h2>
                        <h3>LKR: 750.00</h3>
                        <button class="menu_btn" onclick="addToCart('Rice Balls', 750)">Order Now</button>
                    </div>
                </div>
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="./m-img/Fried-Rice.jpg" alt="Fried Rice">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Fried Rice</h2>
                        <h3>LKR: 320.00</h3>
                        <button class="menu_btn" onclick="addToCart('Fried Rice', 320)">Order Now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Coffee Section -->
    <section class="Coffee" id="coffee">
        <h2>Coffee</h2>
        <div class="menu" id="Menu">
            <div class="menu_box">
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="./m-img/Cappuccino.jpg" alt="Cappuccino">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Cappuccino</h2>
                        <h3>LKR: 320.00</h3>
                        <button class="menu_btn" onclick="addToCart('Cappuccino', 320)">Order Now</button>
                    </div>
                </div>
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="./m-img/Cold-Coffee.jpg" alt="Cold Coffee">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Cold Coffee</h2>
                        <h3>LKR: 750.00</h3>
                        <button class="menu_btn" onclick="addToCart('Cold Coffee', 750)">Order Now</button>
                    </div>
                </div>
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="./m-img/Cinnamon.jpg" alt="Cinnamon Coffee">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Cinnamon Coffee</h2>
                        <h3>LKR: 750.00</h3>
                        <button class="menu_btn" onclick="addToCart('Cinnamon Coffee', 750)">Order Now</button>
                    </div>
                </div>
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="./m-img/Espresso.jpeg" alt="Espresso">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Espresso</h2>
                        <h3>LKR: 320.00</h3>
                        <button class="menu_btn" onclick="addToCart('Espresso', 320)">Order Now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Snacks Section -->
    <section class="Snacks" id="snacks">
        <h2>Snacks</h2>
        <div class="menu" id="Menu">
            <div class="menu_box">
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="./m-img/Sandwich.avif" alt="Sandwich">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Sandwich</h2>
                        <h3>LKR: 320.00</h3>
                        <button class="menu_btn" onclick="addToCart('Sandwich', 320)">Order Now</button>
                    </div>
                </div>
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="./m-img/Fries.jpeg" alt="French Fries">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>French Fries</h2>
                        <h3>LKR: 750.00</h3>
                        <button class="menu_btn" onclick="addToCart('French Fries', 750)">Order Now</button>
                    </div>
                </div>
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="./m-img/Pizza.jpg" alt="Pizza">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Pepperoni Pizza</h2>
                        <h3>LKR: 1550.00</h3>
                        <button class="menu_btn" onclick="addToCart('Pizza', 1550)">Order Now</button>
                    </div>
                </div>
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="./m-img/Buger.avif" alt="Burger">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Burger</h2>
                        <h3>LKR: 750.00</h3>
                        <button class="menu_btn" onclick="addToCart('Burger', 750)">Order Now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dessert Section -->
    <section class="Dessert" id="dessert">
        <h2>Dessert</h2>
        <div class="menu" id="Menu">
            <div class="menu_box">
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="./m-img/Donuts.webp" alt="Donut">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Donut</h2>
                        <h3>LKR: 520.00</h3>
                        <button class="menu_btn" onclick="addToCart('Donut', 520)">Order Now</button>
                    </div>
                </div>
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="./m-img/homemade-cannolis-2.jpg" alt="Cannolis">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Cannolis</h2>
                        <h3>LKR: 750.00</h3>
                        <button class="menu_btn" onclick="addToCart('Cannolis', 750)">Order Now</button>
                    </div>
                </div>
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="./m-img/Cupcake.webp" alt="Cup Cake">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Tiramisu Cake</h2>
                        <h3>LKR: 750.00</h3>
                        <button class="menu_btn" onclick="addToCart('Cup Cake', 750)">Order Now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Cart Dashboard -->
<div id="cartDashboard" class="cart_dashboard">
    <div class="close-btn">&times;</div>
    <h2>Cart</h2>
    <div id="cartItems"></div>
    <h3>Total: LKR <span id="cartTotal">0.00</span></h3>
    <div class="payment_options">
        <label><input type="radio" name="payment" value="card" checked> Card</label>
        <label><input type="radio" name="payment" value="cash"> Cash</label>
        <label><input type="radio" name="payment" value="gpay"> Gpay</label>
    </div>
    <button class="checkout_btn">Checkout</button>
</div>

<!-- Popups -->
<div id="popup" class="popup hidden">
    <div class="popup_content">
        <span class="close-popup">&times;</span>
        <p id="popupMessage"></p>
    </div>
</div>


<script src="menu.js"></script>

</body>
</html>
