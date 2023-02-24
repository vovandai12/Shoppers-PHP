<?php
session_start();
error_reporting(0);
include('config.php');
if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT `email`, `password` FROM `user` WHERE `email`= :email AND `password`=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $_SESSION['login'] = $_POST['email'];
        echo "<script type='text/javascript'> document.location = '../index.php'; </script>";
    } else {

        echo "<script>alert('Wrong email or password. Maybe you don't have an account yet');</script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="Existing Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
</head>

<body>

    <h1 style="color: black;">EXISTING LOGIN FORM</h1>

    <div class="w3layoutscontaineragileits">
        <h2>Login here</h2>
        <form method="post">
            <input type="email" name="email" placeholder="EMAIL" required="">
            <input type="password" name="password" placeholder="PASSWORD" required="">
            <ul class="agileinfotickwthree">
                <li>
                    <input type="checkbox" id="brand1" value="">
                    <label for="brand1"><span></span>Remember me</label>
                    <a href="#">Forgot password?</a>
                </li>
            </ul>
            <div class="aitssendbuttonw3ls">
                <input type="submit" value="LOGIN" name="signin" id="signin">
                <p> To register new account <span>→</span> <a href="register.php"> Click Here</a></p>
                <div class="clear"></div>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
</body>

</html>