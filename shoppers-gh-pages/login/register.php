<?php
include('config.php');
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $sql = "INSERT INTO `user`(`username`, `email`, `password`) VALUES (:username, :email, :pass)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':pass', $pass, PDO::PARAM_STR);
    $query->execute();

    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
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

    <h1 style="color: black;">REGISTER FORM</h1>

    <div class="w3layoutscontaineragileits">
        <h2>Register here</h2>
        <form method="post">
            <input type="text" name="username" placeholder="USERNAME" required="">
            <input type="email" name="email" placeholder="EMAIL" required="">
            <input type="password" name="password" placeholder="PASSWORD" required="">
            <div class="aitssendbuttonw3ls">
                <input type="submit" value="LOGIN" name="register" id="register">
                <div class="clear"></div>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
</body>

</html>