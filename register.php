<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
                include("php/config.php");

                if(isset($_POST['submit'])){
                    $username = mysqli_real_escape_string($con, $_POST['username']);
                    $email = mysqli_real_escape_string($con, $_POST['email']);
                    $password = mysqli_real_escape_string($con, $_POST['password']);
                    $age = mysqli_real_escape_string($con, $_POST['age']);
                    $user_type = mysqli_real_escape_string($con, $_POST['user_type']);

                    $query = "INSERT INTO users (Username, Email, Password, Age, user_type) VALUES ('$username', '$email', '$password', '$age', '$user_type')";
                    if(mysqli_query($con, $query)){
                        echo "<div class='message'>
                                <p>Registration successful! You can now <a href='index.php'>login</a>.</p>
                              </div>";
                    } else {
                        echo "<div class='message'>
                                <p>Registration failed. Please try again.</p>
                              </div>";
                    }
                } else {
            ?>
            <header>Register</header>
            <form action="register.php" method="post" class="form">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>

                <label for="user_type">Register as</label>
                <select id="user_type" name="user_type" required>
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                    <option value="customer">Customer</option>
                </select>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already have an account? <a href="index.php">Login Here</a>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>
