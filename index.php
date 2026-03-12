<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
                include("php/config.php");
                if(isset($_POST['submit'])){
                    $email = mysqli_real_escape_string($con, $_POST['email']);
                    $password = mysqli_real_escape_string($con, $_POST['password']);
                    $user_type = mysqli_real_escape_string($con, $_POST['user_type']);

                    $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email' AND Password='$password' AND user_type='$user_type'") or die("Select Error");
                    $row = mysqli_fetch_assoc($result);

                    if(is_array($row) && !empty($row)){
                        $_SESSION['valid'] = $row['Email'];
                        $_SESSION['username'] = $row['Username'];
                        $_SESSION['age'] = $row['Age'];
                        $_SESSION['id'] = $row['Id'];
                        $_SESSION['user_type'] = $row['user_type'];
                    } else {
                        echo "<div class='message'>
                              <p>Wrong Username or Password</p>
                              </div> <br>";
                        echo "<a href='index.php'><button class='btn'>Go Back</button>";
                    }
                    if(isset($_SESSION['valid'])){
                        if ($_SESSION['user_type'] == 'admin') {
                            header("Location: Admin/Admin.php");
                        } elseif ($_SESSION['user_type'] == 'staff') {
                            header("Location: Staff/Staff.php");
                        } elseif ($_SESSION['user_type'] == 'customer') {
                            header("Location: Homepage.php");
                        }
                    }
                } else {
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <label for="user_type">Login as</label>
                <select id="user_type" name="user_type" required>
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                    <option value="customer">Customer</option>
                </select>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have an account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
